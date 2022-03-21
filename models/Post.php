<?php

namespace app\models;

use app\Database;
use app\helpers\UtilHelper;

/**
 * Post
 * @package app\models
 */
class Post
{
    private Database $db;
    public function __construct()
    {
        $db = new Database();
        $this->db = $db->table('posts');
    }

    public function create($title, $content, $image)
    {
        return $this
            ->db->insert([
                "title" => $title,
                "content" => $content,
                "image" => $image
            ])->run();
    }
}
