<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CepFilterAction
{

    public function __invoke(ServerRequestInterface $request,
                             ResponseInterface $response, callable $next = null)
    {
        $cep = $request->getAttribute('cep', null);
        vaR_dump(get_class_methods($request));
        return $next($request, $response);
    }
}