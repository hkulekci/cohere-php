<?php
/**
 * @since     Mar 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */

namespace Cohere\Endpoints;

use Cohere\Response;

class Embed extends AbstractEndpoint
{
    public function __invoke(array $texts, string $model = null): Response
    {
        $body = ['texts' => $texts];
        if ($model) {
            $body['model'] = $model;
        }

        return $this->client->execute('POST', '/embed', $body);
    }
}