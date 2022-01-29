<?php

namespace App\Enums\HttpCode;

use BenSampo\Enum\Enum;

final class HttpCode extends Enum
{
    const STORE = 600;
    const UPDATE = 601;
    const DESTROY = 602;
    const RESTORE = 603;
}
