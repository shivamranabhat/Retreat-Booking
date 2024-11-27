<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
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
        $visit->increment('hit_count');

        return $next($request);
    }
}