<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class ContactType
 *
 * Идентификатор типа
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class ContactType
{
    /** @var string Клиенты */
    public const CLIENT = 'CLIENT';

    /** @var string Поставщики */
    public const SUPPLIER = 'SUPPLIER';

    /** @var string Партнеры */
    public const PARTNER = 'PARTNER';

    /** @var string Другое */
    public const OTHER = 'OTHER';
}
