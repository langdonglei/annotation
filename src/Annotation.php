<?php

namespace langdonglei;

use Doctrine\Common\Annotations\AnnotationReader;
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
            $obj = $reader->getMethodAnnotation($method, Doc::class);
            if (isset($obj->des) && isset($obj->url) && isset($obj->method)) {
                $eol = '<br>';
                echo $eol;
                echo '接口描述 : ' . $obj->des . $eol;
                echo '请求地址 : ' . $obj->url . $eol;
                echo '请求方法 : ' . $obj->method . $eol;
            }
        }
    }
}