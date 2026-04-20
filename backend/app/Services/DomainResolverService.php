<?php

namespace App\Services;

use App\Enums\DomainStatus;
use App\Models\Domain;

class DomainResolverService
{
    public function resolve(string $host): Domain
    {
        return Domain::with(['product', 'siteConfig'])
            ->where('domain', $host)
            ->where('status', DomainStatus::ACTIVE)
            ->firstOrFail();
    }
}
