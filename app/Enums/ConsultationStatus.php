<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ConsultationStatus extends Enum
{
    const New =   1;
    const InfoRequested =   2;
    const OptionThree = 3;
}
