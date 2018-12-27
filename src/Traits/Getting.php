<?php

namespace GerasimovS\Bitrix24\Traits;

use GerasimovS\Helpers\Inflect;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;

trait Getting
{
    /**
     * @param $method
     * @return mixed
     * @throws ReflectionException
     */
    public function __get($method)
    {
        static $methods;
        $class = new ReflectionClass(static::class);
        $namespace = $class->getNamespaceName();
        $shortName = Str::plural($class->getShortName());

        if (!isset($methods[$method])) {
            $call = $namespace . '\\' . $shortName . '\\' . ucfirst($method);
            $methods[$method] = new $call();
        }

        return $methods[$method];
    }
}
