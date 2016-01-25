<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\DAO;

/**
 * Description of AddressDAO
 *
 * @author john-vostro
 */
class AddressDAO
{
    private $connection = null;
    private $table      = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function create($data)
    {

    }

    public function findOneBy(array $whereStatement)
    {
        $sql = "
        SELECT
            log_logradouro.log_tipo_logradouro,
            log_logradouro.log_no as logradouro,
            log_bairro.bai_no as bairro,
            log_localidade.loc_no as cidade,
            log_localidade.ufe_sg as uf,
            log_logradouro.cep
        FROM
           `log_logradouro`,`log_localidade`,`log_bairro`
        WHERE
           log_logradouro.loc_nu_sequencial = log_localidade.loc_nu_sequencial
        AND
           log_logradouro.bai_nu_sequencial_ini = log_bairro.bai_nu_sequencial
        AND
           log_logradouro.cep = :cep ";

        $resultSet = [];
        $stmt      = $this->connection->prepare($sql);

        $this->execute($stmt, ['cep' => $whereStatement['cep']]);

        if ($stmt->rowCount() > 0) {
            $resultSet = $stmt->fetch();
        }

        return $resultSet;
    }

    public function findBy(array $whereStatement, $limit, $offset)
    {
        
    }

    public function update($data)
    {

    }

    public function delete($data)
    {

    }

    private function execute(\PDOStatement $stmt, array $params = [])
    {
        $this->connection->beginTransaction();
        try {
            $stmt->execute($params);
            $this->connection->commit();
        } catch (\PDOException $exc) {
            $this->connection->rollBack();
            var_dump($exc->getMessage(), $exc->getTraceAsString());
            echo $exc->getTraceAsString();
        }
    }
}