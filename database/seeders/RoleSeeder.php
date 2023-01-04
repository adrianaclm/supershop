<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; 
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'cliente']);
    
        Permission::create(['name' => 'admin.configuracion.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.configuracion.update'])->assignRole($role1);


        Permission::create(['name' => 'admin.categoria.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.categoria.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.categoria.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.categoria.destroy'])->assignRole($role1);

        Permission::create(['name' => 'admin.producto.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.producto.create'])->assignRole($role1);

        Permission::create(['name' => 'admin.producto.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.producto.destroy'])->assignRole($role1);

        Permission::create(['name' => 'admin.empresa.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.empresa.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.empresa.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.empresa.destroy'])->assignRole($role1);

    }
}
