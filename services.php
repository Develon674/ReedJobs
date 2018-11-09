<?php

use Dhii\Data\Container\ContainerInterface;
use Develon674\ReedJobs\API_Handler;

return function(string $root_path, string $base_url) {
    return [
        'api_handler_factory' => function(ContainerInterface $c) {
            $apiToken = $this->c->get('api_token');
            $clientId = $this->c->get('client_id');
            return function($data) use ($apiToken, $clientId) {
                $apiHandler = new API_Handler($apiToken, $clientId);
                return $apiHandler->apiRequest($data);
            };
        },
        'base_url' => $base_url,
        'root_path' => $root_path,
        'version' => '0.1',
        'text_domain' => 'clarke_twitter',
        'api_token' => 'cd230636-ad34-42f2-8e97-07a1f469160b',
        'client_id' => ''
    ];
};
