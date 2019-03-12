<?php

namespace GerasimovS\Bitrix24;

use Exception;
use ReflectionClass;

/**
 * Class WebHook Класс для работы с методами REST в Bitrix24 с использованием веб-хука
 * @package GerasimovS\Rest
 */
class WebHook
{
    /**
     * @throws Exception
     */
    public function __construct(Rest $rest)
    {
        $rest->setAccessHook(config('bitrix24.webhook'));
    }

    /**
     * @param $method
     * @return mixed
     */
    public function __get($method)
    {
        static $entity;

        if (empty($entity)) {
            $entity = new Entity;
        }

        return $entity->{$method};
    }
}
