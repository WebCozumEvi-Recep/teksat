<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreDomainRequest;
use App\Models\Domain;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class DomainController
{
    public function index(Request $request)
    {
        $domains = Domain::with('product')->paginate($request->integer('per_page', 15));

        return ApiResponse::success(['domains' => $domains]);
    }

    public function store(StoreDomainRequest $request)
    {
        $domain = Domain::create($request->validated());

        return ApiResponse::success(['domain' => $domain], 'Domain created', 201);
    }

    public function show(Domain $domain)
    {
        return ApiResponse::success(['domain' => $domain->load(['product', 'siteConfig'])]);
    }

    public function update(StoreDomainRequest $request, Domain $domain)
    {
        $domain->update($request->validated());

        return ApiResponse::success(['domain' => $domain->refresh()], 'Domain updated');
    }
}
