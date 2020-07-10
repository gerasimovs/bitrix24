<?php

namespace GerasimovS\Bitrix24\Entities\Crms\Deals;

use GerasimovS\Bitrix24\Rest;

/**
 * Class Productrows
 */
class Productrows
{
    public $methodGroup = 'crm.deal.productrows';

    /**
     * @link https://dev.1c-bitrix.ru/rest_help/crm/cdeals/crm_deal_productrows_get.php
     * @param int $id
     *
     * @return array|null
     * @throws \Exception
     */
    public function get($id)
    {
    	$method = sprintf('%s.get', $this->methodGroup);

    	return Rest::getInstance()->request($method, [
    		'id' => $id,
    	]);
    }

    /**
     * @link https://dev.1c-bitrix.ru/rest_help/crm/cdeals/crm_deal_productrows_set.php
     * @param $id
     * @param $rows
     *
     * @return array|null
     * @throws \Exception
     */
    public function set($id, $rows)
    {
    	$method = sprintf('%s.set', $this->methodGroup);

    	return Rest::getInstance()->request($method, [
    		'id' => $id,
            'rows' => $rows,
    	]);
    }
}
