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
        $this->info("\n======================================");
        $this->info("Running migrations for tenant: {$tenant->name}");
        $this->info("Database: {$tenant->database_name}");
        $this->info("======================================");

        try {
            // Configure tenant database connection
            Config::set('database.connections.tenant.database', $tenant->database_name);
            Config::set('database.connections.tenant.username', config('database.connections.mysql.username'));
            Config::set('database.connections.tenant.password', config('database.connections.mysql.password'));

            DB::purge('tenant');
            DB::reconnect('tenant');

            // Test DB connection before migrating
            DB::connection('tenant')->getPdo();

            // Run migrations
            $this->info("→ Migrating...");
            Artisan::call('migrate', [
                '--database' => 'tenant',
                '--path' => 'database/migrations/tenant',
                '--force' => true,
            ]);

            $migrationOutput = Artisan::output();
            $this->line($migrationOutput);

            // Run seeders
            $this->info("→ Seeding...");
            Artisan::call('db:seed', [
                '--class' => 'DesignationsTableSeeder',
                '--database' => 'tenant',
                '--force' => true,
            ]);

            $seedOutput = Artisan::output();
            $this->line($seedOutput);

            $this->info("✅ Migrations completed successfully for tenant: {$tenant->name}");
        } catch (\Exception $e) {
            $this->error("❌ Error migrating tenant: {$tenant->name}");
            $this->error("Message: " . $e->getMessage());
            $this->error("File: " . $e->getFile());
            $this->error("Line: " . $e->getLine());
        }
    }

    $this->info("\nAll tenant migrations attempted.");
}

}
