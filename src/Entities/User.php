<?php

namespace GerasimovS\Bitrix24\Entities;

use GerasimovS\Bitrix24\Rest;

/**
 * Class User
 *
 * @link https://dev.1c-bitrix.ru/rest_help/users/index.php
 */
class User
{
    public $methodGroup = 'user';

    /**
     * @link https://dev.1c-bitrix.ru/rest_help/users/user_get.php
     * @param array $filter
     * @param string $sort
     * @param string $order
     * @param bool $adminKey
     *
     * @return array
     * @throws \Exception
     */
    public function get($filter = [], $sort = '', $order = '', $adminKey = '')
    {
        $method = sprintf('%s.get', $this->methodGroup);

        return Rest::getInstance()->request($method, [
            'sort' => $sort,
            'order' => $order,
            'FILTER' => $filter,
            'ADMIN_MODE' => $adminKey,
        ]);
    }

    /**
     * @link https://dev.1c-bitrix.ru/rest_help/users/user_current.php
     *
     * @return array|null
     * @throws \Exception
     */
    public function current()
    {
        $method = sprintf('%s.current', $this->methodGroup);

        return Rest::getInstance()->request($method);
    }
}
