<?php

namespace app\controllers;

use app\helpers\UtilHelper;
use app\models\Post;
use app\Router;

/**
 * Class Post controller
 * @package app\controllers
 */
class HomeController
{

    public static function index()
    {
        // get posts
        $posts = Post::getPosts();

        Router::render('index', $posts);
    }

    public static function show()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $data = Post::getPost($id);

            if ($data) Router::render('post', $data);

            else Router::render('404');
        } else {
            Router::render('404');
        }
    }

    public static function addPage()
    {
        Router::render('add-post');
    }

    public static function add()
    {
        if (isset($_FILES['image'])) {
            $uploaded_image = $_FILES['image'];

            $image = UtilHelper::uploadImage($uploaded_image);

            $title = $_POST['title'];
            $content = $_POST['content'];
            $author_id = $_POST['author_id'];
            $category_id = $_POST['category_id'];

            $data = Post::addPost($title, $image, $content, $author_id, $category_id);


            if ($data) {
                Router::redirect('/dashboard');
            }
        }
    }

    public static function editPage()
    {
        if (isset($_GET['id'])) {
            $postData = Post::getPostByID($_GET['id']);

            // UtilHelper::log($postData);

            Router::render('edit-post', $postData);
        }
    }

    public static function edit()
    {

        // if (isset($_FILES['image'])) {
        //     $uploaded_image = $_FILES['image'];

        //     $image = UtilHelper::uploadImage($uploaded_image);
        // }

        $postID = $_POST['postID'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];

        $data = Post::editPost(
            $postID,
            $title,
            $content,
            $category_id
        );

        if ($data) {
            Router::redirect('/dashboard');
        }

        // if ($data) Router::render('post', $data);

        // else Router::render('404');
    }

    public static function delete()
    {
        if (isset($_POST['postID'])) {
            $id = $_POST['postID'];

            $isDelete = Post::deletePost($id);

            if ($isDelete) {
                Router::redirect('/dashboard');
            }
        } else {
            Router::render('404');
        }
    }
}
