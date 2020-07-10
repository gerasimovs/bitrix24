<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class Industry
 *
 * Сфера деятельности
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class Industry
{
    /** @var string Информационные технологии */
    public const IT = 'IT';

    /** @var string Телекоммуникации и связь */
    public const TELECOM = 'TELECOM';

    /** @var string Производство */
    public const MANUFACTURING = 'MANUFACTURING';

    /** @var string Банковские услуги */
    public const BANKING = 'BANKING';

    /** @var string Консалтинг */
    public const CONSULTING = 'CONSULTING';

    /** @var string Финансы */
    public const FINANCE = 'FINANCE';

    /** @var string Правительство */
    public const GOVERNMENT = 'GOVERNMENT';

    /** @var string Доставка */
    public const DELIVERY = 'DELIVERY';

    /** @var string Развлечения */
    public const ENTERTAINMENT = 'ENTERTAINMENT';

    /** @var string Не для получения прибыли */
    public const NOT_PROFIT = 'NOTPROFIT';

    /** @var string Другое */
    public const OTHER = 'OTHER';
}
