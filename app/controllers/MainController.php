<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
    //public $layout = 'main';

    public function indexAction()
    {
        $model = new Main;
        $posts = $model->findAll();
        //$post = $model->findOne(1);
        $post = $model->findLike("rt", "content");

        debug($post);

        $title = 'MainPage Title';
        $this->set(compact('title', 'posts'));
    }
}