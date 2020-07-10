<?php

namespace GerasimovS\Bitrix24\Enums;

/**
 * Class Employees
 *
 * Количество сотрудников
 * @see https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/crm_status_list.php
 */
class Employees
{
    /** @var string менее 50 */
    public const LESS_50 = 'EMPLOYEES_1';

    /** @var string 50-250 */
    public const BETWEEN_50_250 = 'EMPLOYEES_2';

    /** @var string 250-500 */
    public const BETWEEN_250_500 = 'EMPLOYEES_3';

    /** @var string более 500 */
    public const OVER_500 = 'EMPLOYEES_4';
}
