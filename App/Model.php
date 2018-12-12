<?php

namespace App;

/**
 * Class Model
 * @package App
 */
abstract class Model
{

    /**
     * @var string TABLE
     * @var int $id
     */
    public const TABLE = '';

    public $id;

    /**
     * @param bool $assoc
     * @return array
     */
    public static function findAll(bool $assoc = false)
    {
        $db = new Db(Config::getInstance());

        $sql = 'SELECT * FROM ' . static::TABLE;

        $sql .= ($assoc) ? ' ORDER BY id DESC ' : '';

        return $db->query(
            $sql,
            [],
            static::class
        );
    }


    public static function findById(int $id)
    {
        $db = new Db(Config::getInstance());
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query(
            $sql,
            [':id' => $id],
            static::class
        );
        return $data ? $data[0] : null;

    }

    public function insert()
    {
        $db = new Db(Config::getInstance());

        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' === $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE .
            '(' . implode(',', $cols) . ')' .
            ' VALUES ' .
            '(' . implode(',', array_keys($data)) . ')';

        $db->execute($sql, $data);

        $this->id = $db->getLastId();

        return true;
    }

    public function update()
    {
        $db = new Db(Config::getInstance());

        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' === $name) {
                continue;
            }
            $cols[] = $name . '=:' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $cols) . ' WHERE id=' . $this->id;

        return $db->execute($sql, $data);
    }

    public function save()
    {
        $article = static::findById($this->id);

        return isset($article) ? $this->update() : $this->insert();

    }
}