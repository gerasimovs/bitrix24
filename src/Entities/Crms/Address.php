<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Entities\Crm;
use GerasimovS\Bitrix24\Traits\Resource;

class Address extends Crm
{
    public $methodGroup = 'crm.address';
    use Resource;
}
