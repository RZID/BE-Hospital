<?php

use Phalcon\Mvc\Micro\Collection as MicroCollection;

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

/**
 * Add your routes here
 */

//  Adding CORS before running router
$app->before(
    function () use ($app) {

        $origin = $app->request->getHeader("ORIGIN") ? $app->request->getHeader("ORIGIN") : '*';

        $app->response->setHeader("Access-Control-Allow-Origin", $origin)
            ->setHeader("Access-Control-Allow-Methods", 'GET,PUT,POST,DELETE,OPTIONS')
            ->setHeader("Access-Control-Allow-Headers", 'Origin, X-Requested-With, Content-Range, Content-Disposition, Content-Type, Authorization')
            ->setHeader("Access-Control-Allow-Credentials", true);

        $app->response->sendHeaders();
        return true;
    }
);

// Router controlling begin
$controllers = new MicroCollection();

$controllers->setHandler(new PasienController());

// Set a common prefix for all routes
$controllers->setPrefix('/api/pasien');

// List Pasien
$controllers->get('/', 'list');

// Detail Pasien
$controllers->get('/{id}', 'detail');

// Add Pasien
$controllers->post('/', 'add');

// Update Pasien
$controllers->put('/{id}', 'update');

// Delete Pasien
$controllers->delete('/{id}', 'delete');

// Preflight CORS purposes
$controllers->options('/', 'optionsBase');
$controllers->options('/{id}', 'optionsBase');


// Mount the collections
$app->mount($controllers);

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
});
