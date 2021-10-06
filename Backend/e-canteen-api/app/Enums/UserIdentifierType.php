<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static NIM()
 * @method static static NIDN()
 * @method static static NIP()
 * @method static static KTP()
 */
final class UserIdentifierType extends Enum
{
    const NIM = 'NIM';
    const NIDN = 'NIDN';
    const NIP = 'NIP';
    const KTP = 'KTP';

}
