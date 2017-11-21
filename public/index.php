<?php

use vendor\core\Router;

// Получаем строку запрсоа (URL)
$query = rtrim($_SERVER['QUERY_STRING'], '/'); // rtrim - обрезаем слэш в конце

// Константы
define("WWW", __DIR__); // Public директория
define("CORE", dirname(__DIR__) . '/vendor/core'); // Папка с ядром
define("ROOT", dirname(__DIR__)); // Корневая директория
define("LIBS", dirname(__DIR__) . '/vendor/libs'); // Libs
define("APP", dirname(__DIR__) . '/app'); // Папка с контроллерами, моделями и вьювами
define("LAYOUT", 'default');

// Подключаем роутер
require "../vendor/libs/functions.php";

// Автозагрузка классов
spl_autoload_register(function($class) {
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});

// Правила контроллеров
Router::addRoutes('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::addRoutes('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);
Router::addRoutes('^$', ['controller' => 'Main', 'action' => 'index']); // Пустая строка
Router::addRoutes('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$'); // Разрешаем использовать латиницу, знак тире и один или более символов

// Вывод
Router::dispatch($query);