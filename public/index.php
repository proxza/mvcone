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

// Правила контроллеров
Router::addRoutes('^$', ['controller' => 'Main', 'action' => 'index']); // Пустая строка
Router::addRoutes('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$'); // Разрешаем использовать латиницу, знак тире и один или более символов

// Вывод
Router::dispatch($query);