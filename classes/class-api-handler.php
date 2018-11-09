<?php

class API_Handler {

    protected $apiToken;
    protected $clientId;

    public function __construct($apiToken, $clientId) {
        $this->clientId = $clientId;
        $this->apiToken = $apiToken;
    }
}
