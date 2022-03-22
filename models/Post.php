<?php

namespace app\models;

use app\Database;
use app\helpers\UtilHelper;

/**
 * Post
 * @package app\models
 */
class Post extends Models
{
    public function create($title, $content, $image)
    {
        return self::table("users")->insert([
            "title" => $title,
            "content" => $content,
            "image" => $image
        ])->run();
    }

    public static function getPosts()
    {
        return  self::table("posts")
            ->select(
                "posts.postsID",
                "posts.title",
                "posts.image",
                "posts.content",
                "categories.name  AS category"
            )
            ->innerJoin("categories", [
                "posts.category_id", "categories.categoriesID"
            ])
            ->where('posts.is_active', '1')
            ->getAll();
    }

    public static function getPost($id)
    {
        return self::table("posts")
            ->select(
                "posts.postsID",
                "posts.title",
                "posts.image",
                "posts.content",
                "categories.name  AS category"
            )->innerJoin("categories", [
                "posts.postsID", "categories.categoriesID"
            ])->where("posts.postsID", $id)->get();
    }

    public static function addPost(
        string $title,
        string $image,
        string $content,
        string $author_id,
        string $category_id
    ) {
        return self::table("posts")->insert([
            "title" => $title,
            "image" => $image,
            "content" => $content,
            "author_id" => $author_id,
            "category_id" => $category_id
        ])->run();
    }

    public static function deletePost($id)
    {
        return self::table("posts")->update([
            "is_active" => "0"
        ])->where("postsID", $id)->run();
    }
}
