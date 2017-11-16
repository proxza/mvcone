<?php

// Функция дэбага (вывод принта удобнее чем по дефолту)
function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}