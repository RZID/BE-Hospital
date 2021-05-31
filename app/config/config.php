<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter'    => 'Mysql',
        'host'       => 'localhost',
        'username'   => 'phalcon',
        'password'   => 'password',
        'dbname'     => 'hospital_db',
        'charset'    => 'utf8',
    ],

    'application' => [
        'modelsDir'         => APP_PATH . '/models/',
        'migrationsDir'     => APP_PATH . '/migrations/',
        'controllersDir'    => APP_PATH . '/controllers/',
        'helpersDir'        => APP_PATH . '/helpers/',
        'viewsDir'          => APP_PATH . '/views/',
        'baseUri'           => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),
    ]
]);
