<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Experiences extends Enum
{
    const OneYear = '1 Year' ;
    const LessThanOneYear = 'Less Than 1 year';
    const OverOneYear = 'Over 1 year';
    const ZeroToThree = '0 - 3 year';
    const FourToTen = '4 - 10 year';
    const SevenToTen = '7 - 10 year';
}
