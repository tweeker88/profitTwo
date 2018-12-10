<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct(Config $config)
    {
        $this->dbh = new \PDO(
            'mysql:host=' . $config::$DbHost . ';dbname=' . $config::$DbName,
            $config::$DbUser,
            $config::$DbPass
        );
    }

    public function query($sql, $data = [], $class)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($query, $data = [])
    {
        $stmt = $this->dbh->prepare($query);

        return $stmt->execute($data);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}