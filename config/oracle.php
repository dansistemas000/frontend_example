<?php

return [
    /*'oracle' => [
        'driver'         => 'oracle',
        'tns'            => env('DB_TNS', ''),
        'host'           => env('DB_HOST', ''),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', ''),
        'username'       => env('DB_USERNAME', ''),
        'password'       => env('DB_PASSWORD', ''),
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'edition'        => env('DB_EDITION', 'ora$base'),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
    ],*/

    'oracle' => [
        'driver' => 'oracle',
        'host' => '192.168.2.22',
        'port' => '1521',
        'database' => 'bddcore1',
        'service_name' => 'bddcore1',
        'username' => 'eappfisa_cma_prod',
        'password' => 'eappfisa_cma_prod',
        'charset' => 'utf8',
        'prefix' => '',
    ],
];
