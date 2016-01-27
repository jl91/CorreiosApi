<?php

namespace App\Model\Connection;

/**
 * Description of ConnectionFactory
 *
 * @author john-vostro
 */
use App\Model\Connection\ConnectionInterface;

class ConnectionFactory implements ConnectionInterface
{
    private $username = 'apicorreios';
    private $database = 'cep.gpbe.17.01.2014';
    private $password = 'root';
    private $host     = 'localhost';
    private $driver   = 'mysql';
    private $options  = [
         \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
    ];
    private $dsn      = null;

    public function __construct()
    {
        $this->dsn     = sprintf("%s:host=%s;dbname=%s", $this->driver, $this->host,
            $this->database);
    }

    /**
     *
     * @return \PDO
     */
    public function getConnection()
    {
        try {
            $connection = new \PDO($this->dsn, $this->username, $this->password,
                $this->options);
            $connection->setAttribute(\PDO::ATTR_ERRMODE,
                \PDO::ERRMODE_EXCEPTION);

            return $connection;
        } catch (\PDOException $exc) {
            var_dump($exc->getMessage(), $exc->getTrace());
        }
    }
}
