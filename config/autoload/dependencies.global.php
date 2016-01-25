<?php
return [
    'dependencies' => [
        'invokables' => [
            App\Action\CepFilterAction::class => App\Action\CepFilterAction::class,
        ],
        'factories' => [
            App\Action\CepAction::class => App\Action\CepFactory::class,
            App\Model\DAO\AddressDAO::class => App\Model\DAO\AddressDAOFactory::class,
            Zend\Expressive\Application::class => Zend\Expressive\Container\ApplicationFactory::class,
        ]
    ]
];
