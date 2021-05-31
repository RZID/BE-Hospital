<?php

use Phalcon\Di\Injectable;
use Phalcon\Http\Response;

// Set as global variables
$response = new Response();

class Responser extends Injectable
{
    // 200 OK
    function ok($message, $result)
    {
        return $this->response->setStatusCode(200, 'OK')->setJsonContent([
            "status" => [
                "code" => 200,
                "response" => "success",
                "message" => $message
            ],
            "result" => $result
        ]);
    }

    // 201 Created
    function created($message, $result)
    {
        return $this->response->setStatusCode(201, 'Created')->setJsonContent([
            "status" => [
                "code" => 201,
                "response" => "success",
                "message" => $message
            ],
            "result" => $result
        ]);
    }

    // 400 Bad Request
    function bad_request($message, $result)
    {
        return $this->response->setStatusCode(400, 'Bad Request')->setJsonContent([
            "status" => [
                "code" => 400,
                "response" => "error",
                "message" => $message
            ],
            "result" => $result
        ]);
    }
    // 404 Not Found
    function not_found($message, $result)
    {
        return $this->response->setStatusCode(404, 'Not Found')->setJsonContent([
            "status" => [
                "code" => 404,
                "response" => "error",
                "message" => $message
            ],
            "result" => $result
        ]);
    }
    // 500 Internal Server Error
    function internal_server_error($message, $result)
    {
        return $this->response->setStatusCode(500, 'Internal Server Error')->setJsonContent([
            "status" => [
                "code" => 500,
                "response" => "error",
                "message" => $message
            ],
            "result" => $result
        ]);
    }
}
