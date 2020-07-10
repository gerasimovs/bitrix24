<?php

namespace GerasimovS\Bitrix24\Traits;

use GerasimovS\Bitrix24\Rest;

trait Resource
{
    /**
     * @param array $fields
     *
     * @return array
     * @throws \Exception
     */
    public function list($fields = [])
    {
        $method = sprintf('%s.list', $this->methodGroup);

        return Rest::getInstance()->request($method, $fields);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function fields()
    {
        $method = sprintf('%s.fields', $this->methodGroup);

        return Rest::getInstance()->request($method);
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws \Exception
     */
    public function add($fields)
    {
        $method = sprintf('%s.add', $this->methodGroup);

        return Rest::getInstance()->request($method, [
            'fields' => $fields,
        ]);
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws \Exception
     */
    public function get($id)
    {
        $method = sprintf('%s.get', $this->methodGroup);

        return Rest::getInstance()->request($method, [
            'id' => $id,
        ]);
    }

    /**
     * @param int $id
     * @param array $fields
     *
     * @return array
     * @throws \Exception
     */
    public function update($id, $fields)
    {
        $method = sprintf('%s.update', $this->methodGroup);

        return Rest::getInstance()->request($method, [
            'id' => $id,
            'fields' => $fields,
        ]);
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws \Exception
     */
    public function delete($id)
    {
        $method = sprintf('%s.delete', $this->methodGroup);

        return Rest::getInstance()->request($method, [
            'id' => $id,
        ]);
    }
}
