<?php

namespace GerasimovS\Bitrix24\Entities\Calendars;

use GerasimovS\Bitrix24\Rest;

class Event
{
    public $methodGroup = 'calendar.event';

    public function get($fields)
    {
    	$method = sprintf('%s.get', $this->methodGroup);
    	return Rest::getInstance()->request(
    		$method,
    		$fields
    	);
    }
}
