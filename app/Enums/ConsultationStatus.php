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
    const Paid =   2;
    const WaitForDoctor = 3;
    const NeedInfo = 3;
    const Done = 3;
}
