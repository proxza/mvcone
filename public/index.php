<?php
/**
 * Created by PhpStorm.
 * User: n00b.DetecteD
 * Date: 14.11.2017
 * Time: 9:57
 */

// Получаем строку запрсоа (URL)
$query = rtrim($_SERVER['QUERY_STRING'], '/'); // rtrim - обрезаем слэш в конце

// Подключаем роутер
require "../vendor/core/Router.php";
require "../vendor/libs/functions.php";

// Контроллеры
Router::addRoutes('posts/add', ['controller' => 'Posts', 'action' => 'add']);
Router::addRoutes('posts', ['controller' => 'Posts', 'action' => 'index']);
Router::addRoutes('', ['controller' => 'Main', 'action' => 'index']);


// Вывод
if (Router::matchRoute($query))
{
    debug(Router::getRoute());
} else {
    echo "Нет такого маршрута";
    exit;
}