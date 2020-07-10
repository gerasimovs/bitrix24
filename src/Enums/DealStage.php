<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class DealStage
 *
 * Идентификатор стадии
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class DealStage
{
    /** @var string Новая */
    public const NEW = 'NEW';

    /** @var string Подготовка документов */
    public const PREPARATION = 'PREPARATION';

    /** @var string Счет на предоплату */
    public const PREPAYMENT_INVOICE = 'PREPAYMENT_INVOICE';

    /** @var string В работе */
    public const EXECUTING = 'EXECUTING';

    /** @var string Финальный счёт */
    public const FINAL_INVOICE = 'FINAL_INVOICE';

    /** @var string Сделка успешна */
    public const WON = 'WON';

    /** @var string Сделка провалена */
    public const LOSE = 'LOSE';

    /** @var string Анализ причины провала */
    public const APOLOGY = 'APOLOGY';
}
