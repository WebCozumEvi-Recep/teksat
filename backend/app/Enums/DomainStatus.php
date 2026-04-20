<?php

namespace App\Enums;

enum DomainStatus: string
{
    case ACTIVE = 'active';
    case TESTING = 'testing';
    case PASSIVE = 'passive';
    case BANNED = 'banned';
    case LOW_PERFORMANCE = 'low_performance';
}
