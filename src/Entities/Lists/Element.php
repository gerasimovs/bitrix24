<?php

namespace GerasimovS\Bitrix24\Entities\Lists;

use GerasimovS\Bitrix24\Entities\Lists;
use GerasimovS\Bitrix24\Rest;

class Element
{
    public $methodGroup = 'lists.element';

    /**
     * @param array $order
     * @param array $filter
     * @return array
     * @throws \Exception
     */
    public function getList($filter = [], $order = [], $start = 0)
    {
        if (isset($filter['iblock_id'])) {
            $listId = $filter['iblock_id'];
            unset($filter['iblock_id']);
        } elseif (isset($filter['iblock_type'])) {
            $listId = $filter['iblock_type'];
            unset($filter['iblock_type']);
        } else {
            throw new \Exception('Required parameters are missing');
        }

        if (isset($filter['element_id'])) {
            $elementId = $filter['element_id'];
            unset($filter['element_id']);
        } elseif (isset($filter['element_code'])) {
            $elementId = $filter['element_code'];
            unset($filter['element_code']);
        } else {
            $elementId = null;
        }

        if (isset($filter['iblock_type_id'])) {
            $listType = $filter['iblock_type_id'];
        } else {
            $listType = 'lists';
        }

        return $this->get($listId, $elementId, $filter, $listType, $order, $start);
    }

    /**
     * @param string|int $listId
     * @param null|string|int $elementId
     * @param array $filter
     * @param string $listType
     * @param array $order
     *
     * @return array
     * @throws \Exception
     */
    private function get($listId, $elementId = null, $filter = [], $listType = 'lists', $order = [], $start = 0)
    {
        $method = sprintf('%s.get', $this->methodGroup);

        return Rest::getInstance()->request($method, [
            'iblock_type_id' => $listType,
            'element_order' => $order,
            'filter' => $filter,
            Lists::getIdKey($listId) => $listId,
            self::getIdKey($elementId) => $elementId,
            'start' => $start,
        ]);
    }

    public function add($fields)
    {
        if (isset($fields['iblock_id'])) {
            $listId = $fields['iblock_id'];
            unset($fields['iblock_id']);
        } elseif (isset($filter['iblock_type'])) {
            $listId = $fields['iblock_type'];
            unset($fields['iblock_type']);
        } else {
            throw new \Exception('Required parameters are missing');
        }

        if (isset($fields['element_code'])) {
            $elementCode = $fields['element_code'];
            unset($fields['element_code']);
        } else {
            throw new \Exception('Required parameters are missing');
        }

        if (isset($filter['iblock_type_id'])) {
            $listType = $fields['iblock_type_id'];
        } else {
            $listType = 'lists';
        }

        $method = sprintf('%s.add', $this->methodGroup);

        return Rest::getInstance()->request($method, [
            'iblock_type_id' => $listType,
            Lists::getIdKey($listId) => $listId,
            'element_code' => $elementCode,
            'fields' => $fields,
        ]);
    }

    /**
     * @param string|int $id
     * @return string
     */
    public static function getIdKey($id)
    {
        if (intval($id) == $id) {
            return'element_id';
        }

        return 'element_code';
    }
}
