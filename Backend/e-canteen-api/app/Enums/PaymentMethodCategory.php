<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BANK_ACCOUNT()
 * @method static static VIRTUAL_ACCOUNT()
 * @method static static COD()
 */
final class PaymentMethodCategory extends Enum
{
    const BANK_ACCOUNT =   'BANK_ACCOUNT';
    const VIRTUAL_ACCOUNT =   'VIRTUAL_ACCOUNT';
    const COD = 'COD';
}
