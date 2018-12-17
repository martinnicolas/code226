<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


define('FECHA_VALIDA','/^\d{1,2}\/\d{1,2}\/\d{4}$/');

/**
 * datetime_to_php_date()
 * Convierte un datetime mysql a date español
 */
if ( ! function_exists('datetime_to_php_date'))
{
    function datetime_to_php_date($datetime_mysql)
    {
        $partes = preg_split('/\D+/', $datetime_mysql, 6, PREG_SPLIT_NO_EMPTY);

        if (!in_array(count($partes), array(3, 6))) return '';

        return $partes[2] . '/' . $partes[1] . '/' . $partes[0];
    }
}

/**
 * datetime_to_php()
 * Convierte un datetime mysql a datetime español
 */
if ( ! function_exists('datetime_to_php'))
{
    function datetime_to_php($datetime_mysql)
    {
        $partes = preg_split('/\D+/', $datetime_mysql, 6, PREG_SPLIT_NO_EMPTY);

        if (count($partes) != 6) return '';

        return $partes[2] . '/' . $partes[1] . '/' . $partes[0] . ' ' .$partes[3] . ':' . $partes[4] . ':' . $partes[5];
    }
}


/**
 * php datetime to mysql()
 * Convierte un datetime mysql a datetime español
 */
if ( ! function_exists('php_datetime_to_mysql'))
{
    function php_datetime_to_mysql($datetime_php)
    {
        $partes = preg_split('/\D+/', $datetime_php, 6, PREG_SPLIT_NO_EMPTY);

        if (!in_array(count($partes), array(3, 6))) return '';

        return $partes[2] . '-' . $partes[1] . '-' . $partes[0];
    }
}

