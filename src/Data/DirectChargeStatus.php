<?php

declare(strict_types=1);

namespace Alluvamz\PayChanguMobile\Data;

enum DirectChargeStatus: string
{
    case PENDING = 'pending';
    case SUCCESS = 'success';
    case FAILED = 'failed';
}
