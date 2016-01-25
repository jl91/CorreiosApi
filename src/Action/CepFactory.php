<?php

namespace App\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use App\Action\CepAction;
use App\Model\DAO\AddressDAO;

class CepFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $router     = $container->get(RouterInterface::class);
        $addressDAO = $container->get(AddressDAO::class);
        return new CepAction($router, $addressDAO);
    }
}