<?php


use langdonglei\Annotation;
use PHPUnit\Framework\TestCase;

class AnnotationTest extends TestCase
{

    public function testDoc()
    {
        Annotation::doc('../src');
    }
}
