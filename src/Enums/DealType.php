<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class DealType
 *
 * Тип сделки. Используется только для привязки к внешнему источнику
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class DealType
{
    /** @var string Продажа */
    public const SALE = 'SALE';

    /** @var string Комплексная продажа */
    public const COMPLEX = 'COMPLEX';

    /** @var string Продажа товара */
    public const GOODS = 'GOODS';

    /** @var string Продажа услуги */
    public const SERVICES = 'SERVICES';

    /** @var string Сервисное обслуживание */
    public const SERVICE = 'SERVICE';
}
