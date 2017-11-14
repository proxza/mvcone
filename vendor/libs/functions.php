<?php
/**
 * Created by PhpStorm.
 * User: n00b.DetecteD
 * Date: 14.11.2017
 * Time: 14:48
 */

// Функция дэбага (вывод принта удобнее чем по дефолту)
function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}