<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Payment extends Enum
{
    const SyriatelCash =   0;
    const MtnCash =   1;
    const Islame = 2;
}
