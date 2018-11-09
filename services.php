<?php

use Dhii\Data\Container\ContainerInterface;

return function(string $root_path, string $base_url) {
    return [
        'base_url' => $base_url,
        'root_path' => $root_path,
        'version' => '0.1',
        'text_domain' => 'clarke_twitter'
    ];
};
