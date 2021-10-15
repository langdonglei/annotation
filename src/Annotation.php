<?php

namespace langdonglei;


class Annotation
{
    /**
     * 地址 http://test.com
     * 描述 这是一个测试
     */
    public static function doc($dir)
    {
        $items = glob($dir . DIRECTORY_SEPARATOR . '*');
        foreach ($items as $item) {
            if (is_dir($item)) {
                static::doc($item);
            }
            $class = substr($item, strrpos($item, DIRECTORY_SEPARATOR) + 1);
            if (!preg_match('|^[A-Z].*\.php|', $class)) {
                continue;
            }
            $contents = file_get_contents($item);
            preg_match('|^\s*\*\s?(地址\s?(.*))$|m', $contents, $matches_url);
            $url_str = trim($matches_url[1]) ?? '';
            $url_uri = trim($matches_url[2]) ?? '';
            preg_match('|^\s*\*\s?(描述\s?.*)$|m', $contents, $matches_des);
            $des = trim($matches_des[1]) ?? '';
            if ($url_str && $url_uri && $des) {
                echo '<pre/>';
                echo '<div><a target="_blank" href="' . $url_uri . '">' . $url_str . '</a></div>';
                echo '<div>' . $des . '</div>';
            }
        }
    }
}