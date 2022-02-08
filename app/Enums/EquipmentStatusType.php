<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class EquipmentStatusType extends Enum
{
    const IN_WORK =   1;
    const IN_REPAIR =   2;
    const LIQUIDATION = 3;
    const FREE = 4;
}
