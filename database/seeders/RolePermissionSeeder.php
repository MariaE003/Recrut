<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //les permission
        Permission::create(['name'=>'create offre']);
        Permission::create(['name'=>'postuler']);
        //les roles
        $recruteur=Role::create(['name'=>'recruteur']);
        $chercheur=Role::create(['name'=>'chercheur']);
        // donne permission a un role
        $recruteur->givePermissionTo(['create offre']);
        $chercheur->givePermissionTo(['postuler']);
    }
}
