<?php

$loader = new \Phalcon\Loader();

/**
 * Registering an autoloader
 */

$loader->registerDirs(
    [
        $config->application->modelsDir,
        $config->application->helpersDir,
        $config->application->controllersDir,
    ]
)->register();


/**
 * Registering namespaces
 */
$loader->registerNamespaces(
    [
        'app\models'    =>  $config->application->modelsDir,
    ]
)->register();
