<?php

namespace App;

abstract class Model
{

    public const TABLE = '';

    public $id;

    public static function findAll($order = null)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE;

        $sql .= isset($order) ? ' ORDER BY id ASC   ' : '';

        return $db->query(
            $sql,
            [],
            static::class
        );
    }

    public static function insert($columns = [])
    {
        $db = new Db();

        $sql = 'INSERT INTO ' . static::TABLE;

        $placeholder = array_flip($columns);

        $sql .= ' (' . implode(',', $placeholder) . ')';

        $placeholder = implode(',', substr_replace($placeholder, ':', 0, 0));

        $sql .= ' VALUES (' . $placeholder . ')';

        return $db->execute($sql, $columns);
    }

    public static function findById($id)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = ' . $id;
        return $db->query($sql, [], static::class);

    }

}