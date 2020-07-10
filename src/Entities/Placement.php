<?php

namespace GerasimovS\Bitrix24\Entities;

use GerasimovS\Bitrix24\Rest;

/**
 * Class Placement
 *
 * @link https://dev.1c-bitrix.ru/rest_help/application_embedding/metods/index.php
 */
class Placement
{
    public $methodGroup = 'placement';

    /**
     * @param $id
     * @param string $type
     * @param array $order
     * @param null $group
     *
     * @return array|null
     * @throws \Exception
     */
    public function get($id, $type = 'lists', $order = [], $group = null)
    {
        $method = sprintf('%s.get', $this->methodGroup);

        return Rest::getInstance()->request($method, [
            'iblock_type_id' => $type,
            'socnet_group_id' => $group,
            'iblock_order' => $order,
            self::getIdKey($id) => $id,
        ]);
    }

    /**
     * @param $id
     *
     * @return string
     */
    public static function getIdKey($id)
    {
        if ((int)$id == $id) {
            return 'iblock_id';
        }

        return 'iblock_code';
    }

    /**
     * @param string $scope
     *
     * @return array|null
     * @throws \Exception
     */
    public function list($scope = '')
    {
        $method = sprintf('%s.list', $this->methodGroup);

        return Rest::getInstance()->request($method, [
            'scope' => $scope,
        ]);
    }
}
