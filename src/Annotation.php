<?php

namespace langdonglei\annotation;

use Doctrine\Common\Annotations\AnnotationReader;
use langdonglei\Doc;
use ReflectionClass;
use ReflectionException;

class Annotation
{
    /**
     * @throws ReflectionException
     */
    public function __construct(string $class)
    {
        $class  = new ReflectionClass($class);
        $reader = new AnnotationReader();
        foreach ($class->getMethods() as $method) {
            $eol = '<br>';
            echo $eol;
            $obj = $reader->getMethodAnnotation($method, Doc::class);
            echo '接口描述 : ' . ($obj->des ?? 'null') . $eol;
            echo '请求地址 : ' . ($obj->url ?? 'null') . $eol;
            echo '请求方法 : ' . ($obj->method ?? 'null') . $eol;
        }
    }
}