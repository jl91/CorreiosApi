<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use App\Model\DAO\AddressDAO;

class CepAction
{
    private $router;
    private $dao;

    public function __construct(Router\RouterInterface $router, AddressDAO $dao)
    {
        $this->router = $router;
        $this->dao    = $dao;
    }

    public function __invoke(ServerRequestInterface $request,
                             ResponseInterface $response, callable $next = null)
    {
        $cep = $request->getAttribute('cep', null);

        $result = $this->dao->findOneBy(['cep' => $cep]);

        return new JsonResponse($result);
    }
}