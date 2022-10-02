<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Marital extends Enum
{
    const single =   0;
    const married =   1;
    const divorced = 2;
}
