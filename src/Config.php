<?php
/**
 * @since     Mar 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */

namespace Cohere;

class Config
{
    protected string $host;
    protected string $apiKey;
    protected string $version;

    public function __construct($apiKey, $version = '2022-12-06')
    {
        $this->host = 'https://api.cohere.ai/v1/';
        $this->apiKey = $apiKey;
        $this->version = $version;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}