<?php

namespace GerasimovS\Bitrix24\Entities\Tasks;

use GerasimovS\Bitrix24\Entity;

class Item extends Entity
{
    /**
     * Добавить новую задачу
     * @link https://dev.1c-bitrix.ru/rest_help/tasks/task/item/add.php
     * @param array $data
     * @return array
     */
    public function add($data = array())
    {
        $fullResult = $this->rest->call(
            'task.item.add',
            array($data)
        );
        return $fullResult;
    }
}
