<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TrackVisits
{
    public function handle(Request $request, Closure $next)
    {
        
        // Increment visit count
        $visit = Visit::firstOrCreate(
            ['url' => $request->url()],
            ['hit_count' => 0]
        );
        Log::info('Request Details:', [
            'IP Address' => $request->ip(),
            'URL' => $request->url(),
        ]);
        $visit->increment('hit_count');

        return $next($request);
    }
}