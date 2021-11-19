<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
        	'name' => 'Bhargav Raviya', 
        	'email' => 'admin@rajtechnologies.com',
        	'password' => bcrypt('123456789')
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
