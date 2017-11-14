<?php

/**
 * Created by PhpStorm.
 * User: n00b.DetecteD
 * Date: 14.11.2017
 * Time: 14:04
 */
class Router
{
    protected static $routes = []; // Таблица маршрутов
    protected static $route = []; // Action (конкретный маршрут)

    // Добавления маршрута
    public static function addRoutes($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    // Отображение созданных маршрутов
    public static function getRoutes()
    {
        return self::$routes;
    }

    // Отображение текущего маршрута
    public static function getRoute()
    {
        return self::$route;
    }

    // Разбиваем наш маршрут введеный в URL
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if ($url == $pattern)
            {
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
}