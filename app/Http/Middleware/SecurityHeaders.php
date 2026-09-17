<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // Headers de sécurité (toutes les pages)
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        
        // HSTS (force HTTPS) - uniquement en production
        if (app()->environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }
        
        // Cache navigateur pour assets statiques (sauf admin)
        if (!$request->is('admin/*') && !$request->is('admin')) {
            // Cache de 1 an pour images/CSS/JS
            if ($request->is('storage/*') || $request->is('build/*') || $request->is('images/*')) {
                $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
            }
        }
        
        return $response;
    }
}