<?php

namespace GerasimovS\Bitrix24\Entities;

use GerasimovS\Bitrix24\Rest;
use Exception;

class User
{
    public $methodGroup = 'user';

    /**
     * @param array $filter
     * @param string $sort
     * @param string $order
     * @param bool $adminKey
     * @return array
     * @throws Exception
     */
    public function get($filter = array(), $sort = '', $order = '', $adminKey = '')
    {
        $method = sprintf('%s.get', $this->methodGroup);
        return Rest::getInstance()->request(
            $method,
            array(
                'sort' => $sort,
                'order' => $order,
                'FILTER' => $filter,
                'ADMIN_MODE' => $adminKey,
            )
        );
    }

    public function current()
    {
        $method = sprintf('%s.current', $this->methodGroup);
        return Rest::getInstance()->request($method);
    }

}
