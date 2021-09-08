<?php

namespace langdonglei;


class Annotation
{
    public static function doc($dir)
    {
        $items = glob($dir . DIRECTORY_SEPARATOR . '*');
        foreach ($items as $item) {
            if (is_dir($item)) {
                static::doc($item);
            }
            $class = substr($item, strrpos($item, '/') + 1);
            if (!preg_match('|^[A-Z].*\.php|', $class)) {
                continue;
            }
            $contents = file_get_contents($item);
            preg_match('|^ \* 地址.*$|m', $contents, $url);
            preg_match('|^ \* 描述.*$|m', $contents, $des);
            if (isset($url[0]) && isset($des[0])) {
                echo '<pre>*</pre>';
                echo '<pre>' . $url[0] . '</pre>';
                echo '<pre>' . $des[0] . '</pre>';
            }
        }
    }
}