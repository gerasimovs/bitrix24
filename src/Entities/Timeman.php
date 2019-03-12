<?php

namespace GerasimovS\Bitrix24\Entities;

use GerasimovS\Bitrix24\Rest;
use GerasimovS\Bitrix24\Traits\Getting;

class Timeman
{
    public $methodGroup = 'timeman';

    public function settings($fields)
    {
        $method = sprintf('%s.settings', $this->methodGroup);
        return Rest::getInstance()->request($method, $fields);
    }
}
