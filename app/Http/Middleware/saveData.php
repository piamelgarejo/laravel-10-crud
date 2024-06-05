<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Middleware\Auth;

class saveData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $action): Response
    {
        $user = Auth()->user()->id;
        
        $browser = $request->header('sec-ch-ua');
        
        DB::table('loggings')->insert([
            'user' => $user,
            'ip'=> $request->ip(),
            'action'=> $action,
            'browser'=> $browser,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        return $next($request);
    }
}
