<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TicketStatus extends Enum
{
    const Open =   0;
    const Close =   1;
    const Rejected = 2;
}
