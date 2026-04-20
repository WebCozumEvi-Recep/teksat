<?php

namespace App\Services\Domain;

use App\Models\Domain;

class DomainResolverService
{
    public function resolveByHost(string $host): ?array
    {
        $domain = Domain::query()
            ->where('domain', $host)
            ->where('is_active', true)
            ->with(['product', 'template', 'config'])
            ->first();

        if (!$domain) {
            return null;
        }

        return [
            'domain' => $domain,
            'product' => $domain->product,
            'template' => $domain->template,
            'config' => $domain->config,
        ];
    }
}
