<?php

namespace GerasimovS\Bitrix24\Entities\Tasks;

use GerasimovS\Bitrix24\Entity;

/**
 * Class Item
 *
 * @link https://dev.1c-bitrix.ru/rest_help/tasks/task/item/index.php
 */
class Item extends Entity
{
    /**
     * Добавить новую задачу
     *
     * @link https://dev.1c-bitrix.ru/rest_help/tasks/task/item/add.php
     * @param array $data
     *
     * @return array
     */
    public function add($data = [])
    {
        return $this->rest->call('task.item.add', [$data]);
    }
}
