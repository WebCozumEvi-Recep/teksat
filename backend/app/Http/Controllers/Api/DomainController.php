<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        return Domain::with(['product', 'template'])->latest()->paginate();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'domain' => ['required', 'string', 'max:255', 'unique:domains,domain'],
            'product_id' => ['required', 'exists:products,id'],
            'site_template_id' => ['required', 'exists:site_templates,id'],
            'is_active' => ['boolean'],
        ]);

        return Domain::create($data);
    }

    public function show(Domain $domain)
    {
        return $domain->load(['product', 'template', 'config']);
    }

    public function update(Request $request, Domain $domain)
    {
        $domain->update($request->validate([
            'product_id' => ['sometimes', 'exists:products,id'],
            'site_template_id' => ['sometimes', 'exists:site_templates,id'],
            'is_active' => ['sometimes', 'boolean'],
        ]));

        return $domain->refresh();
    }

    public function destroy(Domain $domain)
    {
        $domain->delete();

        return response()->noContent();
    }
}
