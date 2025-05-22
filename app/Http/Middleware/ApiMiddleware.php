<?php
namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (! $user->status) {
            return response()->json([
                'data'    => null,
                'success' => true,
                'message' => 'Your account is blocked,if it is happend wrong contact admin or parrent',
            ], 400);

        }
        return $next($request);
    }
}
