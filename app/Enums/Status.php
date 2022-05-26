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
    const SendResult = '4';
    const Offer = '5';
    const Onboard = '6';
    const Reject = '7';
    const working = '8';
}
