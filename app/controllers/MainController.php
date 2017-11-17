<?php

namespace app\controllers;


class MainController extends AppController
{
    public $layout = 'main';
    public function indexAction()
    {
        $name = 'Vasya';
        $this->set(['name' => $name]);
    }
}