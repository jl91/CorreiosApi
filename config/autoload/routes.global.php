<?php
return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
        ],
    ],
    'routes' => [
        [
            'name' => 'api',
            'path' => '/api[/cep/:cep][/]',
            'middleware' => App\Action\CepAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
