<?php
/**
 * @since     Mar 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */

namespace Cohere\Endpoints;

use Cohere\Response;

class DetectLanguage extends AbstractEndpoint
{
    public function __invoke(array $texts): Response
    {
        return $this->client->execute('POST', '/detect-language', ['texts' => $texts]);
    }
}