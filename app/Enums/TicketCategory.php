<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TicketCategory extends Enum
{
    const Payment =   0;
    const Tech =   1;
    const Mid = 2;
    const Other = 3;
}
