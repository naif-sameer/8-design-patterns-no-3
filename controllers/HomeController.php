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

    public function index(Router $router)
    {
        // get posts
        $posts = Post::getPosts();

        $router->render('index', $posts);
    }

    public function show(Router $router)
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $data = Post::getPost($id);

            if ($data) $router->render('post', $data);

            else $router->render('404');
        } else {
            $router->render('404');
        }
    }

    public function addPage(Router $router)
    {
        $router->render('add-post');
    }

    public function add(Router $router)
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

        // if ($data) $router->render('post', $data);

        // else $router->render('404');
    }

    public function delete(Router $router)
    {
        if (isset($_POST['postID'])) {
            $id = $_POST['postID'];

            $isDelete = Post::deletePost($id);

            if ($isDelete) {
                Router::redirect('/dashboard');
            }
        } else {
            $router->render('404');
        }
    }
}
