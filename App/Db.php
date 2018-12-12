<?php

namespace App;

/**
 * Class Db
 * @package App
 */
class Db
{
    /**
     * @var \PDO $dbh
     */
    protected $dbh;

    public function __construct(Config $config)
    {
        $this->dbh = new \PDO(
            'mysql:host=' . $config::$DbHost . ';dbname=' . $config::$DbName,
            $config::$DbUser,
            $config::$DbPass
        );
    }

    public function query(string $sql,array $data = [],string $class)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $query,array $data = [])
    {
        $stmt = $this->dbh->prepare($query);

        return $stmt->execute($data);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}