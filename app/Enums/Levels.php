<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Levels extends Enum
{
    const Internship = 'Internship';
    const Fresher = 'Fresher Developer';
    const Junior = 'Junior Developer';
    const Senior = 'Senior Developer';
    const MidLevelManager = 'Mid-level Manager';
}
