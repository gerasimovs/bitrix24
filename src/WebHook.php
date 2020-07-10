<?php

namespace GerasimovS\Bitrix24;

use GerasimovS\Bitrix24\Entities\Crm;

/**
 * Class WebHook Класс для работы с методами REST в Bitrix24 с использованием веб-хука
 *
 * @property Crm $crm
 */
class WebHook
{
    /**
     * @param Rest $rest
     *
     * @throws \Exception
     */
    public function __construct(Rest $rest)
    {
        $rest->setAccessHook(config('bitrix24.webhook'));
    }

    /**
     * @param string $method
     *
     * @return mixed
     */
    public function __get($method)
    {
        static $entity;

        if (!($entity instanceof Entity)) {
            $entity = new Entity;
        }

        return $entity->{$method};
    }
}
