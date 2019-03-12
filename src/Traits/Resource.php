<?php

namespace GerasimovS\Bitrix24\Traits;

use Exception;
use GerasimovS\Bitrix24\Rest;

trait Resource
{
    /**
     * @param array $fields
     * @return array
     * @throws Exception
     */
    public function list($fields = [])
    {
        $method = sprintf('%s.list', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            $fields
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
    public function add($fields)
    {
        $method = sprintf('%s.add', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            compact('fields')
        );

        return $result;
    }

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function get($id)
    {
        $method = sprintf('%s.get', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            compact('id')
        );

        return $result;
    }

    /**
     * @param int $id
     * @param array $fields
     * @return array
     * @throws Exception
     */
    public function update($id, $fields)
    {
        $method = sprintf('%s.update', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            compact('id', 'fields')
        );

        return $result;
    }

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function delete($id)
    {
        $method = sprintf('%s.delete', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            compact('id')
        );

        return $result;
    }

}
