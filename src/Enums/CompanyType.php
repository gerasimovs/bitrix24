<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class CompanyType
 *
 * Тип компании
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class CompanyType
{
    /** @var string Клиент */
    public const CUSTOMER = 'CUSTOMER';

    /** @var string Поставщик */
    public const SUPPLIER = 'SUPPLIER';

    /** @var string Конкурент */
    public const COMPETITOR = 'COMPETITOR';

    /** @var string Партнер */
    public const PARTNER = 'PARTNER';

    /** @var string Другое */
    public const OTHER = 'OTHER';
}
