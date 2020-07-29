<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Traits\Getting;
use GerasimovS\Bitrix24\Traits\Resource;

/**
 * Class Lead
 *
 * @link https://dev.1c-bitrix.ru/rest_help/crm/leads/index.php
 * @property Leads\Userfield $userfield
 */
class Lead
{
    use Getting;
    use Resource;

    public $methodGroup = 'crm.lead';
}
