<?php

namespace GerasimovS\Bitrix24\Traits;

use Illuminate\Support\Str;

trait Getting
{
    /**
     * @param string $method
     *
     * @return mixed
     */
    public function __get($method)
    {
        static $methods;

        if (!isset($methods[$method])) {
            $class = new \ReflectionClass(static::class);
            $namespace = $class->getNamespaceName();
            $shortName = Str::plural($class->getShortName());

            $call = $namespace . '\\' . $shortName . '\\' . ucfirst($method);
            $methods[$method] = new $call();
        }

        return $methods[$method];
    }
}
