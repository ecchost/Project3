<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PROMO()
 * @method static static NORMAL()
 */
final class ProductSellStatus extends Enum
{
    const PROMO =   'PROMO';
    const NORMAL =   'NORMAL';
}
