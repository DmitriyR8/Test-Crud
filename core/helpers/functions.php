<?php

/**
 * @param $arr
 * @param bool $die
 */
function dd($arr, $die = false)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if ($die) die;
}

/**
 * @param bool $http
 */
function redirect($http = false)
{
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }

    header("Location: $redirect");
    exit;
}
