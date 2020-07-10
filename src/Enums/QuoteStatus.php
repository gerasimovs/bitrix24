<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class QuoteStatus
 *
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class QuoteStatus
{
    /** @var string Новое */
    public const DRAFT = 'DRAFT';

    /** @var string Отправлено клиенту */
    public const SENT = 'SENT';

    /** @var string Принято */
    public const APPROVED = 'APPROVED';

    /** @var string Отклонено */
    public const DECLINED = 'DECLAINED';

    /** @var string Анализ причины отклонения */
    public const APOLOGY = 'APOLOGY';
}
