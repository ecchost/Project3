<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static admin()
 * @method static static user()
 * @method static static merchant()
 */
final class UserRoleEnum extends Enum
{
    const admin = 'admin';
    const user =  'user';
    const merchant = 'merchant';
}
