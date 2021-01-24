<?php

namespace GerasimovS\Bitrix24\Entities;

use GerasimovS\Bitrix24\Traits\Getting;

/**
 * Class Crm
 *
 * @property Crms\Address $address
 * @property Crms\Bizproc $bizproc
 * @property Crms\Company $company
 * @property Crms\Contact $contact
 * @property Crms\Deal $deal
 * @property Crms\Invoice $invoice
 * @property Crms\Lead $lead
 * @property Crms\Product $product
 * @property Crms\ProductSection $productSection
 * @property Crms\Requisite $requisite
 *
 * @link https://dev.1c-bitrix.ru/rest_help/crm/index.php
 */
class Crm
{
    use Getting;
}
