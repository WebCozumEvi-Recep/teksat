<?php

namespace App\Enums;

enum OrderStatus: string
{
    case NEW = 'new';
    case CALLED = 'called';
    case CONFIRMED = 'confirmed';
    case REJECTED = 'rejected';
    case UNREACHABLE = 'unreachable';
    case PREPARED = 'prepared';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case RETURNED = 'returned';
    case CANCELLED = 'cancelled';
    case COD_PENDING = 'cod_pending';
    case COD_COLLECTED = 'cod_collected';
    case COMPLETED = 'completed';
}
