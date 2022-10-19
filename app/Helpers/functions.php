<?php

if (!function_exists('formatting')) {
    /**
     * @param mixed $number
     * @param int   $decimals
     *
     * @return string
     */
    function formatting(mixed $number, int $decimals = 0): string
    {
        return number_format((float)$number, $decimals, ',', ' ');
    }
}

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

if (!function_exists('make_tree')) {
    /**
     * Построить дерево
     *
     * @param array $data
     *
     * @return array
     */
    function make_tree(array &$data): array
    {
        $tree = [];

        foreach ($data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
                continue;
            }
            $data[$node['parent_id']]['children'][$node['id']] = &$node;
        }

        unset($node);

        return $tree;
    }
}