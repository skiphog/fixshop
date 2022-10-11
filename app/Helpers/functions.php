<?php

if (!function_exists('time_to_read')) {
    /**
     * Время на прочтение текста
     *
     * @param string $string
     *
     * @return int
     */
    function time_to_read(string $string): int
    {
        $string = preg_replace('/[^A-zА-яё\d]/ui', '', strip_tags($string));
        $count = mb_strlen($string);

        return (int)ceil($count / 1500);
    }
}