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
use Stripe\Stripe;
use Stripe\Checkout\Session;

class TenantController extends Controller
{

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns|unique:tenants,email',
        ]);
        
        $tenantId = explode('@', $request->email)[0];
        $database_name = 'database_' . $tenantId;

        $imagePath = '';
        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            if ($file->isValid()) {
                $folder = public_path('CompanyLogo');
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($folder, $fileName);
                $imagePath = 'CompanyLogo/' . $fileName;
            }
        }

       $user = Tenant::create([
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'database_name' => $database_name,
            'phone_number' => $request->phone_number,
            'company_name' => $request->company_name,
            'company_logo' => $imagePath,
            'website_url' => $request->website_url,
            'tenant_id' => $tenantId
        ]);

        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            

            $session = Session::create([
                'mode' => 'subscription',
                'line_items' => [
                    ['price' => $request->priceId, 'quantity' => 1],
                ],
                'customer_email' => $user->email,
                'success_url' => config('app.url') . '/billing/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => config('app.url') . '/billing/cancel',
                'metadata' => [
                    'user_id' => $user->id,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Stripe session creation failed: ' . $e->getMessage()], 500);
        }

        // Only runs if Stripe session was created successfully


        DB::statement("CREATE DATABASE `$database_name`");    

        config(['database.connections.tenant.database' => $database_name]);
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
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'hr manager']);
        Role::create(['name' => 'accountant']);
        Role::create(['name' => 'receptionist']);
        Role::create(['name' => 'project manager']);
        Role::create(['name' => 'team lead']);

        User::create([
            'email' => $request->email,
            'password' => bcrypt('admin123'),
            'tenant_id' => $tenantId,
            'role_id' => $admin->id
        ]);

        return response()->json(['message'=>'Registered Successfully!','url' => $session->url],200);
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

    public function product_key(Request $request)
    {
        return response()->json(['message'=>'connected successfully',200]);
    }
}
