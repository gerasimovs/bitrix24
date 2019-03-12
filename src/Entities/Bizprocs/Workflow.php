<?php

namespace GerasimovS\Bitrix24\Entities\Bizprocs;

use GerasimovS\Bitrix24\Entity;
use GerasimovS\Bitrix24\Rest;
use GerasimovS\Bitrix24\Traits\Getting;

class Workflow extends Entity
{
    use Getting;
    public $methodGroup = 'bizproc.workflow';

    public function start($fields)
    {
        $method = sprintf('%s.start', $this->methodGroup);
        $result = Rest::getInstance()->request(
            $method,
            $fields
        );

        return $result;
    }

}
