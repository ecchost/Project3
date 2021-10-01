<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static UNPAID()
 * @method static static CANCELLED()
 * @method static static PAID()
 * @method static static ACCEPTED()

 */
final class OrderStatusEnum extends Enum
{
    const UNPAID = 'UNPAID';
    const CANCELLED = 'CANCELLED';
    const PAID = 'PAID';
    const ACCEPTED = 'ACCEPTED';

}
