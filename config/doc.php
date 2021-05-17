<?php

use langdonglei\annotation\Annotation;

include '../vendor/autoload.php';

$classes = include 'config.php';
foreach ($classes as $class) {
    (new Annotation())($class);
}
