<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Call the custom Artisan command
        Artisan::call('assign:permissions');

        // Using line() instead of info() to print messages
        $this->command->line('Permissions assigned through seeder!');
    }
}
