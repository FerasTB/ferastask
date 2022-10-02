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
    const New =   1;
    const ViewedByPatient =   2;
    const FileUploaded = 3;
    const ViewedByDoctor = 4;
}
