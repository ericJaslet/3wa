<?php

return [
    '/'     => ['controller' => 'App\\Controller\\HomeController', 'action' => 'home'],
    '/test'     => ['controller' => 'App\\Controller\\HomeController', 'action' => 'pageTest'],
    '/test/post/:id'     => [
        'controller' => 'App\\Controller\\HomeController',
        'action' => 'find',
        'pattern' => '#\/test\/post\/(?P<id>[1-9][0-9]*)#'
    ],
];
