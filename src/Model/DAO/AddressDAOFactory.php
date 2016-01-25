<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\DAO;

/**
 * Description of DAOFactory
 *
 * @author john-vostro
 */
use App\Model\DAO\AddressDAO;
use App\Model\Connection\ConnectionFactory;

class AddressDAOFactory
{

    public function __invoke()
    {
        $connection = new ConnectionFactory();
        $dao        = new AddressDAO($connection->getConnection());
        return $dao;
    }
}