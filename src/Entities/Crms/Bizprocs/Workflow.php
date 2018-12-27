<?php

namespace GerasimovS\Bitrix24\Entities\Crms\Bizprocs;

use GerasimovS\Bitrix24\Entity;
use GerasimovS\Bitrix24\Traits\Getting;

class Workflow extends Entity
{
    use Getting;
    public $methodGroup = 'bizproc.workflow';

    public function start($templateId, $documentId, $parameters = null)
    {
        $method = sprintf('%s.start', $this->methodGroup);
        $result = $this->rest->request(
            $method,
            [
                'TEMPLATE_ID'  => $templateId,
                'DOCUMENT_ID' => $documentId,
                'PARAMETERS' => $parameters,
            ]
        );

        return $result;
    }

}
