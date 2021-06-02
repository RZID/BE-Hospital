<?php

use Phalcon\Di\Injectable;
use Phalcon\Http\Response;

// Set as global variables
$response = new Response();

class Responser extends Injectable
{
    function responsers($code, $codeString, $response, $message, $result)
    {
        return $this
            ->response
            ->setStatusCode($code, $codeString)
            ->setJsonContent([
                "status" => [
                    "code" => $code,
                    "response" => $response,
                    "message" => $message
                ],
                "result" => $result
            ]);
    }
    // 200 OK
    function ok($message, $result)
    {
        return $this->responsers(200, 'OK', 'success', $message, $result);
    }

    // 201 Created
    function created($message, $result)
    {
        return $this->responsers(201, 'Created', 'success', $message, $result);
    }

    // 400 Bad Request
    function bad_request($message, $result)
    {
        return $this->responsers(400, 'Bad Request', 'error', $message, $result);
    }
    // 404 Not Found
    function not_found($message, $result)
    {
        return $this->responsers(404, 'Not Found', 'error', $message, $result);
    }
    // 500 Internal Server Error
    function internal_server_error($message, $result)
    {
        return $this->responsers(500, 'Internal Server Error', 'error', $message, $result);
    }

    function preflight()
    {
        $this->response->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, HEAD');
        $this->response->setHeader('Access-Control-Allow-Origin', "*");
        $this->response->setHeader('Access-Control-Allow-Credentials', 'true');
        $this->response->setHeader('Access-Control-Allow-Headers', "origin, x-requested-with, content-type");
        $this->response->setHeader('Access-Control-Max-Age', '86400');
        return true;
    }
}
