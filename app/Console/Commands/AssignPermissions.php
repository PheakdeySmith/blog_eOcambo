<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign permissions to roles';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Assign permissions to admin
        $admin = Role::where('name', 'admin')->first();
        $editor = Role::where('name', 'editor')->first();
        $viewer = Role::where('name', 'viewer')->first();

        // Check if admin exists and assign permissions
        if ($admin) {
            $admin->syncPermissions(['create article', 'edit article', 'delete article', 'publish article', 'view article']);
            $this->info('Admin permissions assigned!');
        } else {
            $this->error('Admin role not found!');
        }

        // Check if editor exists and assign permissions
        if ($editor) {
            $editor->syncPermissions(['create article', 'edit article', 'publish article']);
            $this->info('Editor permissions assigned!');
        } else {
            $this->error('Editor role not found!');
        }

        // Check if viewer exists and assign permissions
        if ($viewer) {
            $viewer->syncPermissions(['view article']);
            $this->info('Viewer permissions assigned!');
        } else {
            $this->error('Viewer role not found!');
        }

        // Return a success message
        $this->info('Permissions assigned successfully!');
    }
}
