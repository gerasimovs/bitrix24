<?php

namespace GerasimovS\Bitrix24\Entities\Crms;

use GerasimovS\Bitrix24\Rest;

/**
 * Class Userfield
 *
 * @link https://dev.1c-bitrix.ru/rest_help/crm/userfields/index.php
 */
class Userfield
{
    public $methodGroup = 'crm.userfield';

    /**
     * @return array
     * @throws \Exception
     */
    public function fields()
    {
        $method = sprintf('%s.fields', $this->methodGroup);

        return Rest::getInstance()->request($method);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function types()
    {
        $method = sprintf('%s.types', $this->methodGroup);

        return Rest::getInstance()->request($method);
    }
}
