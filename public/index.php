<?php
/**
 * Created by PhpStorm.
 * User: n00b.DetecteD
 * Date: 14.11.2017
 * Time: 9:57
 */

// Получаем строку запрсоа (URL)
$query = rtrim($_SERVER['QUERY_STRING'], '/'); // rtrim - обрезаем слэш в конце

// Константы
define("WWW", __DIR__); // Public директория
define("CORE", dirname(__DIR__) . '/vendor/core'); // Папка с ядром
define("ROOT", dirname(__DIR__)); // Корневая директория
define("APP", dirname(__DIR__) . '/app'); // Папка с контроллерами, моделями и вьювами

// Подключаем роутер
require "../vendor/core/Router.php";
require "../vendor/libs/functions.php";

// Автозагрузка классов
spl_autoload_register(function($class) {
    $file = APP . "/controllers/$class.php";
    if (is_file($file)) {
        require_once $file;
    }
});

// Правила контроллеров
Router::addRoutes('^$', ['controller' => 'Main', 'action' => 'index']); // Пустая строка
Router::addRoutes('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$'); // Разрешаем использовать латиницу, знак тире и один или более символов

// Вывод
Router::dispatch($query);