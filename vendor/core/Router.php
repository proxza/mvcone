<?php

namespace vendor\core;

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
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCaseCamel($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Перенаправляет URL по корректному маршруту
     *
     * @param string $url входящий URL
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['controller'];
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::lowerCaseCamel(self::$route['action']) . 'Action';
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                } else {
                    echo "Метод <b>$controller::$action</b> не найден!";
                }
            } else {
                echo "Контроллер <b>$controller</b> не найден!";
            }
        } else {
            http_response_code(404);
            include "404.html";
        }
    }

    /**
     *
     *
     * @param $name
     * @return mixed
     */
    protected static function upperCaseCamel($name)
    {
        $name = str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
        return $name;
    }

    /**
     *
     *
     * @param $name
     * @return mixed
     */
    protected static function lowerCaseCamel($name)
    {
        return lcfirst(self::upperCaseCamel($name));
    }

    /**
     *
     *
     * @param $url
     */
    protected static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }
}