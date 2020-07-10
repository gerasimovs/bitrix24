<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class Source
 *
 * Идентификатор источника
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class Source
{
    /** @var string Звонок */
    public const CALL = 'CALL';

    /** @var string Электронная почта */
    public const EMAIL = 'EMAIL';

    /** @var string Веб-сайт */
    public const WEB = 'WEB';

    /** @var string Реклама */
    public const ADVERTISING = 'ADVERTISING';

    /** @var string Существующий клиент */
    public const PARTNER = 'PARTNER';

    /** @var string По рекомендации */
    public const RECOMMENDATION = 'RECOMMENDATION';

    /** @var string Выставка */
    public const TRADE_SHOW = 'TRADE_SHOW';

    /** @var string CRM-форма */
    public const WEB_FORM = 'WEBFORM';

    /** @var string Обратный звонок */
    public const CALLBACK = 'CALLBACK';

    /** @var string Генератор продаж */
    public const RC_GENERATOR = 'RC_GENERATOR';

    /** @var string Интернет-магазин */
    public const STORE = 'STORE';

    /** @var string Другое */
    public const OTHER = 'OTHER';
}
