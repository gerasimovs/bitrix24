<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Traits\Getting;
use GerasimovS\Bitrix24\Traits\Resource;

class Invoice
{
    public $methodGroup = 'crm.invoice';
    use Getting;
    use Resource;
}
