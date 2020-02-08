<?php

namespace Db;

use Db\Connection;

class Db
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getConnection()->pdo;
    }

    public function query($sql, $params = [], $class)
    {
        $result = $this->pdo->prepare($sql);
        $result->execute($params);

        return $result->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function getLastInsertId()
    {
        return (int) $this->pdo->lastInsertId();
    }
}