<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RequestType extends Enum
{
    const BORROW =   1; // muownj
    const RETURN =   2; // tra lai
    const REPAIR = 3;
    const LIQUIDATIOn = 4;
    const LOST = 5; // maat
}
