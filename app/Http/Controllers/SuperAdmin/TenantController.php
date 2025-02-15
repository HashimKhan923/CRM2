<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Tenant;
use App\Models\Role;
use App\Models\User;

class TenantController extends Controller
{



    public function registerAdmin(Request $request)
    {

        $request->validate([
            'email' => 'required|email:rfc,dns|unique:tenants,email',
        ]);
        
        $tenantId = explode('@', $request->email)[0];
    
        $database_name = 'database_' . $tenantId;
        // $database_username = 'user_' . $tenantId;
        // $database_password = 'password_' . $tenantId;
    
        Tenant::create([
            'name' => $request->name,
            'email' => $request->email,
            'database_name' => $database_name,
            // 'database_username' => $database_username,
            // 'database_password' => $database_password,
            'tenant_id' => $tenantId
        ]);
    
        // try {
            // Create database
            DB::statement("CREATE DATABASE `$database_name`");    
            // Create user and grant privileges
            // DB::statement("CREATE USER '$database_username'@'%' IDENTIFIED BY '$database_password'");
            // DB::statement("GRANT ALL PRIVILEGES ON $database_name.* TO '$database_username'@'%'");

        // } catch (\Exception $e) {
        //     // Log the error
        //     \Log::error('Error creating database or user: ' . $e->getMessage());
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    
        // Update the tenant connection configuration
        config(['database.connections.tenant.database' => $database_name]);
        // config(['database.connections.tenant.username' => $database_username]);
        // config(['database.connections.tenant.password' => $database_password]);
        
        // DB::statement("GRANT ALL PRIVILEGES ON `$database_name`.* TO 'srv6_crm2user'@'localhost' WITH GRANT OPTION");
        // DB::statement("FLUSH PRIVILEGES");
    
        DB::purge('tenant');
        DB::reconnect('tenant');
        DB::setDefaultConnection('tenant');
    
        // Run migrations for the tenant
        Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path' => 'database/migrations/tenant',
        ]);

        Artisan::call('db:seed', [
            '--class' => 'DesignationsTableSeeder',
            '--database' => 'tenant',
        ]);
    
        $admin = Role::create([
            'name' => 'admin'
        ]);
    
        $user = Role::create([
            'name' => 'user'
        ]);
    
        User::create([
            'email' => $request->email,
            'password' => bcrypt('admin123'),
            'tenant_id' => $tenantId,
            'role_id' => $admin->id
        ]);
    
        return redirect()->back();
    }
    




    public function createTenantDatabase($tenantId)
    {
        $databaseName = 'database_' . $tenantId;
        $username = 'user_' . $tenantId;
        $password = 'password_' . $tenantId;

        Tenant::create([
            'name' => $databaseName,
            'database_name' => $databaseName,
            'username' => $username,
            'password' => $password,
        ]);

        // Create database
        DB::statement("CREATE DATABASE $databaseName");

        // Create user and grant privileges
        DB::statement("CREATE USER '$username'@'%' IDENTIFIED BY '$password'");
        DB::statement("GRANT ALL PRIVILEGES ON $databaseName.* TO '$username'@'%'");

        // Update the tenant connection configuration
        config(['database.connections.tenant.database' => $databaseName]);
        config(['database.connections.tenant.username' => $username]);
        config(['database.connections.tenant.password' => $password]);

        DB::purge('tenant');
        DB::reconnect('tenant');
        DB::setDefaultConnection('tenant');

        // Run migrations for the tenant
        Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path' => 'database/migrations/tenant',
        ]);
    }
}
