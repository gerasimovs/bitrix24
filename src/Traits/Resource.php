<?php

namespace GerasimovS\Bitrix24\Traits;

use Exception;
use GerasimovS\Bitrix24\Rest;

trait Resource
{
    /**
     * @param array $order
     * @param array $filter
     * @param array $select
     * @param int $start
     * @return array
     * @throws Exception
     */
    public function getList($order = array(), $filter = array(), $select = array(), $start = 0)
    {
        $method = sprintf('%s.list', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            [
                'order'  => $order,
                'filter' => $filter,
                'select' => $select,
                'start'  => $start
            ]
        );

        return $result;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function fields()
    {
        $method = sprintf('%s.fields', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method
        );

        return $result;
    }

    /**
     * @param array $fields
     * @return array
     * @throws Exception
     */
    public function add($fields = [])
    {
        $method = sprintf('%s.add', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            ['fields' => $fields]
        );

        return $result;
    }

    /**
     * @param $id
     * @return array
     * @throws Exception
     */
    public function get($id)
    {
        $method = sprintf('%s.get', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            ['id' => $id]
        );

        return $result;
    }

    /**
     * @param $id
     * @param $fields
     * @return array
     * @throws Exception
     */
    public function update($id, $fields)
    {
        $method = sprintf('%s.update', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            [
                'id' => $id,
                'fields' => $fields
            ]
        );

        return $result;
    }

    /**
     * @param $id
     * @return array
     * @throws Exception
     */
    public function delete($id)
    {
        $method = sprintf('%s.delete', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            ['id' => $id]
        );

        return $result;
    }

}
