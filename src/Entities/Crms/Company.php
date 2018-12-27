<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Entity;
use GerasimovS\Bitrix24\Traits\Getting;
use GerasimovS\Bitrix24\Traits\Resource;

class Company extends Entity
{
    public $methodGroup = 'crm.company';
    use Resource;
    use Getting;
}
