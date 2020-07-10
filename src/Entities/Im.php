<?php

namespace GerasimovS\Bitrix24\Entities;

use GerasimovS\Bitrix24\Rest;
use GerasimovS\Bitrix24\Traits\Getting;

/**
 * Class Im
 *
 * @link https://dev.1c-bitrix.ru/rest_help/im/index.php
 */
class Im
{
    public $methodGroup = 'im';

    /**
     * @param $fields
     *
     * @return array|null
     * @throws \Exception
     *
     * @link https://dev.1c-bitrix.ru/rest_help/im/im_notify.php
     */
    public function notify($fields)
    {
        $method = sprintf('%s.notify', $this->methodGroup);
        return Rest::getInstance()->request($method, $fields);
    }
}
