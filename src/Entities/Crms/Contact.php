<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Entity;
use GerasimovS\Bitrix24\Traits\Resource;

/**
 * Class Contact
 *
 * @link https://dev.1c-bitrix.ru/rest_help/crm/contacts/index.php
 */
class Contact extends Entity
{
    use Resource;

    public $methodGroup = 'crm.contact';
}
