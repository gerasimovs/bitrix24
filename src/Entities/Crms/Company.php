<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Entity;
use GerasimovS\Bitrix24\Traits\Getting;
use GerasimovS\Bitrix24\Traits\Resource;

/**
 * Class Company
 *
 * @link https://dev.1c-bitrix.ru/rest_help/crm/company/index.php
 */
class Company extends Entity
{
    use Resource;
    use Getting;

    public $methodGroup = 'crm.company';
}
