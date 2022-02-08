<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RepairStatus extends Enum
{
    const NOT_YET =   1;
    const DONE =   2;
}
