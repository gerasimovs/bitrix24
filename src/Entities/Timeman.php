<?php

namespace GerasimovS\Bitrix24\Entities;

use GerasimovS\Bitrix24\Rest;
use GerasimovS\Bitrix24\Traits\Getting;

/**
 * Class Timeman
 *
 * @link https://dev.1c-bitrix.ru/rest_help/timeman/index.php
 */
class Timeman
{
    public $methodGroup = 'timeman';

    /**
     * @param $fields
     *
     * @return array|null
     * @throws \Exception
     */
    public function settings($fields)
    {
        $method = sprintf('%s.settings', $this->methodGroup);

        return Rest::getInstance()->request($method, $fields);
    }
}
