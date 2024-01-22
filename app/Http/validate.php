<?php

namespace App\Http;

function validate() {

        // Get the request method
        $method = $_SERVER['REQUEST_METHOD'];

        // Get the request body
        $body = file_get_contents('php://input');

        // Validate the request method
        if ($method !== 'POST') {
            http_response_code(405);
            echo 'Method Not Allowed';
            exit;
        }

        // Validate the request body
        $data = json_decode($body);
        if ($data === null) {
            http_response_code(400);
            echo 'Bad Request';
            exit;
        }

        // Validate the request data
        if (!isset($data->name) || !is_string($data->name)) {
            http_response_code(400);
            echo 'Bad Request';
            exit;
        }

        // If the request is valid, echo a success message
        echo 'Success';
    
    
}