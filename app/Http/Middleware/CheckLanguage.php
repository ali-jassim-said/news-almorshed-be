<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        $lang = $request->route('lang');
        $supportedLanguages = ['ar', 'en'];
        if (!in_array($lang, $supportedLanguages))
            return redirect("$supportedLanguages[0]");
        return $next($request);
    }
}
