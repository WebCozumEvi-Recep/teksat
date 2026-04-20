<?php

namespace App\Http\Middleware;

use App\Services\Domain\DomainResolverService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResolveDomainContext
{
    public function __construct(private readonly DomainResolverService $resolver)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        $context = $this->resolver->resolveByHost($request->getHost());

        if ($context === null) {
            abort(404, 'Domain configuration not found');
        }

        app()->instance('domain.context', $context);

        return $next($request);
    }
}
