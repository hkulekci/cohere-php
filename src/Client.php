<?php
/**
 * @since     Mar 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace Cohere;

use Cohere\Endpoints\Embed;
use Cohere\Endpoints\Generate;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Cohere\Exception\InvalidArgumentException;
use Cohere\Exception\ServerException;
use JsonException;

class Client implements ClientInterface
{
    protected Config $config;
    protected \GuzzleHttp\Client $client;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->config->getHost()
        ]);
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     * @throws ServerException|InvalidArgumentException
     */
    public function execute(string $method, string $path, array $options = []): Response
    {
        $data = [
            'headers' => [
                'content-type' => 'application/json',
                'accept' => 'application/json',
                'authorization' => 'Bearer ' . $this->config->getApiKey(),
                'Cohere-Version' => $this->config->getVersion(),
            ]
        ];
        if (($method === 'POST' || $method === 'PUT' || $method === 'PATCH') && $options) {
            $data['json'] = $options;
        }

        try {
            $res = $this->client->request($method, $path, $data);
        } catch (ClientException $e) {
            $statusCode = $e->getResponse()->getStatusCode();
            if ($statusCode >= 400 && $statusCode < 500) {
                throw new InvalidArgumentException($e->getMessage());
            } elseif ($statusCode >= 500) {
                throw new ServerException($e->getMessage());
            }
        }


        return Response::buildFromHttpResponse($res);
    }

    public function generate(array $prompt): Response
    {
        return (new Generate($this))($prompt);
    }

    /**
     * @param mixed ...$args
     * @return Response
     */
    public function embed(...$args): Response
    {
        return (new Embed($this))(...$args);
    }
}