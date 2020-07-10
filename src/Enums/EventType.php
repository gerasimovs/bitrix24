<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class EventType
 *
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class EventType
{
    /** @var string Информация */
    public const INFO = 'INFO';

    /** @var string Телефонный звонок */
    public const PHONE = 'PHONE';

    /** @var string Отправлен email */
    public const MESSAGE = 'MESSAGE';
}
