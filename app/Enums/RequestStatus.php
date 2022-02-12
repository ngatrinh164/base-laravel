<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RequestStatus extends Enum
{
    const WAITING = 1;
    const APPROVE = 2;
    const REJECT = 3;
}
