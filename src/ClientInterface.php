<?php
/**
 * @since     Mar 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */

namespace Cohere;

interface ClientInterface
{
    public function execute(string $method, string $path, array $options = []): Response;
}