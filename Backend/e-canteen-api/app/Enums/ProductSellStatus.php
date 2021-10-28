<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static pending()
 * @method static static approved()
 * @method static static rejected()
 */
final class ProductSellStatus extends Enum
{
    const pending =   'pending';
    const approved =   'approved';
    const rejected =  'rejected';
}
