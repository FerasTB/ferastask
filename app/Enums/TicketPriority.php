<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TicketPriority extends Enum
{
    const Heigh =   0;
    const Low =   1;
    const Medium = 2;
}
