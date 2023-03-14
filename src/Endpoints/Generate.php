<?php
/**
 * @since     Mar 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */

namespace Cohere\Endpoints;

use Cohere\Response;

class Generate extends AbstractEndpoint
{
    public function __invoke(string $prompt): Response
    {
        return $this->client->execute('POST', '/generate', ['prompt' => $prompt]);
    }
}