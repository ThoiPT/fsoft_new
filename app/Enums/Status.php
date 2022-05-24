<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Status extends Enum
{
    const On = '1';
    const Off = '0';

    const New = '2';
    const Interview = '3';
    const Offer = '4';
    const Onboard = '5';
    const Reject = '6';
}
