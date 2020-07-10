<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class Status
 *
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class Status
{
    /** @var string Не обработан */
    public const NEW = 'NEW';

    /** @var string В работе */
    public const IN_PROCESS = 'IN_PROCESS';

    /** @var string Обработан */
    public const PROCESSED = 'PROCESSED';

    /** @var string Качественный лид */
    public const CONVERTED = 'CONVERTED';

    /** @var string Некачественный лид */
    public const JUNK = 'JUNK';
}
