<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class InvoiceStatus
 *
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class InvoiceStatus
{
    /** @var string Новый */
    public const NEW = 'N';

    /** @var string Отправлен клиенту */
    public const SENT = 'S';

    /** @var string Оплачен */
    public const PAID = 'P';

    /** @var string Не оплачен */
    public const NOT_PAID = 'D';
}
