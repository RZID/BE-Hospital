<?php

use Phalcon\Mvc\Micro\Collection as MicroCollection;

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

/**
 * Add your routes here
 */

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
$controllers->patch('/{id}', 'update');

// Delete Pasien
$controllers->delete('/{id}', 'delete');

// Mount the collections
$app->mount($controllers);

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
});
