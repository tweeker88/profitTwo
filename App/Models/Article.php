<?php

namespace App\Models;

use App\Model;

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{

    /**
     * @var string TABLE
     * @var string $title
     * @var string $content
     * @var int $author_id
     */
    public const TABLE = 'news';

    public $title;
    public $content;
    public $author_id;

    /**
     * @param string $name
     * @return null
     */
    public function __get(string $name)
    {
        switch ($name) {
            case 'author' :
                return Authors::findById($this->author_id);
                break;
            default :
                return null;
                break;
        }
    }

    /**
     * @param string $key
     * @return bool
     */
    public function __isset(string $key)
    {
        switch ($key) {
            case 'author' :
                return !empty($this->author_id);
                break;
            default :
                return false;
                break;
        }
    }

}