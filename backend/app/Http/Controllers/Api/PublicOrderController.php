<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PublicOrderStoreRequest;
use App\Services\DomainResolverService;
use App\Services\OrderCreationService;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class PublicOrderController
{
    public function __construct(
        private readonly OrderCreationService $orderCreationService,
        private readonly DomainResolverService $domainResolverService,
    ) {
    }

    public function store(PublicOrderStoreRequest $request)
    {
        $order = $this->orderCreationService->create(
            payload: $request->validated(),
            ipAddress: $request->ip(),
            userAgent: (string) $request->userAgent(),
        );

        return ApiResponse::success(['order' => $order], 'Order created', 201);
    }

    public function siteConfig(Request $request)
    {
        $domain = $this->domainResolverService->resolve($request->getHost());

        return ApiResponse::success(['site_config' => $domain->siteConfig]);
    }

    public function product(Request $request)
    {
        $domain = $this->domainResolverService->resolve($request->getHost());

        return ApiResponse::success(['product' => $domain->product]);
    }
}
