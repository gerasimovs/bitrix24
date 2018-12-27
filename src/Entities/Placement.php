<?php

namespace GerasimovS\Bitrix24\Entities;

use GerasimovS\Bitrix24\Rest;

class Placement
{

    public $methodGroup = 'placement';

    public function get($id, $type = 'lists', $order = array(), $group = null)
    {
        $method = sprintf('%s.get', $this->methodGroup);
        return Rest::getInstance()->request(
            $method,
            array(
                'iblock_type_id' => $type,
                'socnet_group_id' => $group,
                'iblock_order' => $order,
                self::getIdKey($id) => $id,
            )
        );
    }

    public static function getIdKey($id)
    {
        if (intval($id) == $id) {
            return'iblock_id';
        }

        return 'iblock_code';
    }

    public function list($scope = '')
    {
        $method = sprintf('%s.list', $this->methodGroup);
        dd(Rest::getInstance());
        return Rest::getInstance()->request(
            $method,
            array(
                'scope' => $scope,
            )
        );
    }
}
