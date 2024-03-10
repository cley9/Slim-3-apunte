<?php
// setting database toko
return [
    'settings' => [
        // 'displayErrorDetails' => true, // set to false in production
        // 'addContentLengthHeader' => false, // Allow the web server to send the content-length header

    'db' => [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'dbname' => 'tech',
        // 'driver' => 'mysql'
    ],
    'jwt' => [
        'secret' => 'supersecretkeyyoushouldnotcommittogithub'
    ]
    ],
];
