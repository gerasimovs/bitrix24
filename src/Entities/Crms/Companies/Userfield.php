<?php

namespace GerasimovS\Bitrix24\Entities\Crms\Companies;

use GerasimovS\Bitrix24\Entity;
use GerasimovS\Bitrix24\Traits\Resource;

/**
 * Class Userfield
 *
 * @see https://dev.1c-bitrix.ru/rest_help/crm/userfields/index.php
 */
class Userfield extends Entity
{
    use Resource;

    public $methodGroup = 'crm.company.userfield';
}
