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

        var_dump($posts);
        $title = 'MainPage Title';
        $this->set(compact('title'));
    }
}