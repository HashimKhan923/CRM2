<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        
        if ($request->product_key != null) {
            // Store tenant_id in session
            session(['tenant_id' => $request->product_key]);
        }

            // Retrieve the tenant_id from the session
    $tenantId = session('tenant_id');


    // Find the tenant in the database
    $Tenant = Tenant::where('tenant_id', $tenantId)->first();

        if($Tenant)
        {
            $databaseName = 'database_' . $tenantId;
            // $username = 'user_' . $tenantId;
            // $password = 'password_' . $tenantId;
    
            config(['database.connections.tenant.database' => $databaseName]);
            // config(['database.connections.tenant.username' => $username]);
            // config(['database.connections.tenant.password' => $password]);
    
            DB::purge('tenant');
            DB::reconnect('tenant');
            DB::setDefaultConnection('tenant');
            
            return $next($request);
        }
        else
        {
            return response()->json(['message'=>'product key not found',404]);
        }

    }
}
