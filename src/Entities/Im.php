<?php

namespace GerasimovS\Bitrix24\Entities;

use GerasimovS\Bitrix24\Rest;
use GerasimovS\Bitrix24\Traits\Getting;

class Im
{
    public $methodGroup = 'im';

    public function notify($fields)
    {
        $method = sprintf('%s.notify', $this->methodGroup);
        return Rest::getInstance()->request($method, $fields);
    }
}
