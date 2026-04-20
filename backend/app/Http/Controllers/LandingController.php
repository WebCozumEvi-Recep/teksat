<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function show(Request $request)
    {
        $domainContext = app('domain.context');

        return view('landing.index', [
            'domain' => $domainContext['domain'],
            'product' => $domainContext['product'],
            'template' => $domainContext['template'],
            'config' => $domainContext['config'],
        ]);
    }
}
