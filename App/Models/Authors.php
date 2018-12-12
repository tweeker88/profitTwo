<?php

namespace App\Models;


use App\Model;

/**
 * Class Authors
 * @package App\Models
 */
class Authors extends Model
{

    /**
     * @var string $name
     * @var string TABLE
     */
    public const TABLE = 'authors';

    public $name;

    /**
     * @param $id
     * @return null
     */
    public static function findById(int $id)
    {
        return parent::findById($id);
    }
}