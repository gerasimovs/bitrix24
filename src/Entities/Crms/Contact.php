<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Entity;
use GerasimovS\Bitrix24\Traits\Resource;

class Contact extends Entity
{
    public $methodGroup = 'crm.contact';
    use Resource;
}
