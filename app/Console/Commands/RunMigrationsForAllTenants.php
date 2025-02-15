<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RunMigrationsForAllTenants extends Command
{
    protected $signature = 'tenants:migrate';
    protected $description = 'Run migrations for all tenant databases';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get all tenants
        $tenants = DB::table('tenants')->get();

        foreach ($tenants as $tenant) {
            $this->info("Running migrations for tenant: {$tenant->name}");

            // Configure tenant database connection
            Config::set('database.connections.tenant.database', $tenant->database_name);
            Config::set('database.connections.tenant.username', env('DB_USERNAME'));
            Config::set('database.connections.tenant.password', env('DB_PASSWORD'));

            DB::purge('tenant');
            DB::reconnect('tenant');

            // Run migrations for the tenant
            Artisan::call('migrate', [
                '--database' => 'tenant',
                '--path' => 'database/migrations/tenant',
            ]);

            Artisan::call('db:seed', [
                '--class' => 'DesignationsTableSeeder',
                '--database' => 'tenant',
            ]);

            $this->info("Migrations completed for tenant: {$tenant->name}");
        }

        $this->info('All tenant migrations have been run successfully.');
    }
}
