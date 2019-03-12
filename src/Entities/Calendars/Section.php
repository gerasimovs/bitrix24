<?php

namespace GerasimovS\Bitrix24\Entities\Calendars;

use GerasimovS\Bitrix24\Rest;

class Section
{
    public $methodGroup = 'calendar.section';

    public function get($fields)
    {
    	$method = sprintf('%s.get', $this->methodGroup);
    	return Rest::getInstance()->request(
    		$method,
    		$fields
    	);
    }

    public function add($fields)
    {
    	$method = sprintf('%s.add', $this->methodGroup);
    	return Rest::getInstance()->request(
    		$method,
    		$fields
    	);
    }
}
