<?php

class API_Handler {

    protected $apiToken;
    protected $clientId;

    public function __construct($apiToken, $clientId) {
        $this->clientId = $clientId;
        $this->apiToken = $apiToken;
    }

    protected function apiRequest($data = []) {
        $user_agent = 'ReedAgent';
        $api_token = $this->apiToken;
        $client_id = $this->clientId;
        $url = 'https://www.reed.co.uk/recruiter/api/1.0/jobs';
        $http_method = 'POST';

        $dt = new DateTime('now', new DateTimeZone('UTC'));
        $timestamp = $dt->format('Y-m-d\TH:i:s') . '+00:00';

// Calculate signature
        $string_to_sign = $http_method . $user_agent . urldecode($url) . parse_url($url, PHP_URL_HOST) . $timestamp;
        $hmac_sha1_hash = hash_hmac('sha1', $string_to_sign, $api_token, true);
        $api_signature = base64_encode($hmac_sha1_hash);

// Add required headers
        $headers = array();
        $headers[] = 'ContentType: application/x-www-form-urlencoded';
        $headers[] = 'Method: ' . $http_method;
        $headers[] = 'User-Agent: ' . $user_agent;
        $headers[] = 'X-ApiSignature: ' . $api_signature;
        $headers[] = 'X-ApiClientId: ' . $client_id;
        $headers[] = 'X-TimeStamp: ' . $timestamp;
        

// Build request using cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_URL, $url);

        if ($http_method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

// Make API call
        $response = curl_exec($ch);
        curl_close($ch);
    }

}
