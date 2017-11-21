<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
    //public $layout = 'main';

    public function indexAction()
    {
        $model = new Main;
        $posts = \R::findAll('posts');
        $menu = $this->menu;
        //$title = 'MainPage Title';
        $this->setMeta('Главная страница', 'Описание страницы', 'Ключевые слова');
        $meta = $this->meta;
        $this->set(compact('meta', 'posts', 'menu'));
    }
}