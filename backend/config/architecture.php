<?php

return [
    'modules' => [
        'dashboard',
        'domains',
        'products',
        'orders',
        'logistics',
        'reports',
        'fraud',
        'settings',
    ],
    'queues' => [
        'default' => 'redis',
        'fraud_scoring' => 'fraud',
        'shipment_updates' => 'shipments',
    ],
];
