<?php

namespace GerasimovS\Bitrix24\Entities\Crms\Deals;

use GerasimovS\Bitrix24\Rest;
use GerasimovS\Bitrix24\Traits\Resource;

class Productrows
{
    public $methodGroup = 'crm.deal.productrows';

    public function get()
    {
    	$method = sprintf('%s.get', $this->methodGroup);
    	return Rest::getInstance()->request(
    		$method,
    		compact('id')
    	);
    }

    public function set($id, $rows)
    {
    	$method = sprintf('%s.set', $this->methodGroup);
    	return Rest::getInstance()->request(
    		$method,
    		compact('id', 'rows')
    	);
    }
}
