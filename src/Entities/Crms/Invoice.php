<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Traits\Getting;
use GerasimovS\Bitrix24\Traits\Resource;

/**
 * Class Invoice
 *
 * @link https://dev.1c-bitrix.ru/rest_help/crm/invoice/index.php
 */
class Invoice
{
    use Getting;
    use Resource;

    public $methodGroup = 'crm.invoice';
}
