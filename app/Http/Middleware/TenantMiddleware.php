<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\User;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $productKey = $request->header('product_key');
    
        if (!$productKey) {
            return response()->json(['message' => 'Product key not found'], 400);
        }
    
        $tenant = Tenant::where('tenant_id', $productKey)->first();
    
        if (!$tenant) {
            return response()->json(['message' => 'Invalid product key'], 404);
        }
    
        $databaseName = 'database_' . $productKey;
    
        config(['database.connections.tenant.database' => $databaseName]);
    
        DB::purge('tenant');
        DB::reconnect('tenant');
        DB::setDefaultConnection('tenant');

        
        


    
        return $next($request);
    }
}
