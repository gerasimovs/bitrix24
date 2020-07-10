<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Entities\Crm;
use GerasimovS\Bitrix24\Traits\Resource;

/**
 * Class Address
 *
 * @see https://dev.1c-bitrix.ru/rest_help/crm/requisite/methods/index.php
 */
class Address extends Crm
{
    use Resource;

    public $methodGroup = 'crm.address';
}
