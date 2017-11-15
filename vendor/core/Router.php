<?php

/**
 * Created by PhpStorm.
 * User: n00b.DetecteD
 * Date: 14.11.2017
 * Time: 14:04
 */
class Router
{
    /**
     * Таблица маршрутов
     *
     * @var array
     */
    protected static $routes = [];

    /**
     * Текущий маршрут
     *
     * @var array
     */
    protected static $route = [];

    /**
     * Добавляет маршрут в таблицу маршрутов
     *
     * @param string $regexp регуляргле выражение маршрута
     * @param array $route маршрут ([controller, action, params])
     */
    public static function addRoutes($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Возвращает таблицу маршрутов
     *
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * Возвращает текущий маршрут (controller, action, [params])
     *
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * Ищет URL в таблице маршрутов
     *
     * @param string $url входящий URL
     * @return bool
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if (preg_match("#$pattern#i", $url, $matches))
            {
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            echo "OK";
        }else{
            http_response_code(404);
            include "404.html";
        }
    }
}