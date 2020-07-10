<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Traits\Getting;
use GerasimovS\Bitrix24\Traits\Resource;

/**
 * Class Deal
 *
 * @link https://dev.1c-bitrix.ru/rest_help/crm/cdeals/index.php
 * @property Deals\Productrows $productrows
 */
class Deal
{
    use Getting;
    use Resource;

    public $methodGroup = 'crm.deal';
}
