<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class CallList
 *
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class CallList
{
    /** @var string В работе */
    public const IN_WORK = 'IN_WORK';

    /** @var string Успешно */
    public const SUCCESS = 'SUCCESS';

    /** @var string Неверный номер */
    public const WRONG_NUMBER = 'WRONG_NUMBER';

    /** @var string Больше не звонить */
    public const STOP_CALLING = 'STOP_CALLING';
}
