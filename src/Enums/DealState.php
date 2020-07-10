<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class DealState
 */
class DealState
{
    /** @var string В планах */
    public const PLANNED = 'PLANNED';

    /** @var string В работе */
    public const PROCESS = 'PROCESS';

    /** @var string Выполнена */
    public const COMPLETE = 'COMPLETE';

    /** @var string Отменена */
    public const CANCELED = 'CANCELED';
}
