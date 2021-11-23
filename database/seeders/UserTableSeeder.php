<?php

namespace Database\Seeders;

use App\Models\Profile;
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
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456789')
        ]);
        $profile = Profile::create([
        	'user_id' => $user->id, 
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);


        $user = User::create([
        	'name' => 'User', 
        	'email' => 'user@gmail.com',
        	'password' => bcrypt('123456789')
        ]);
        $profile = Profile::create([
        	'user_id' => $user->id, 
        ]);
        $role = Role::create(['name' => 'User']);
        $permissions = [
            "profile-create" => 2,
            "profile-delete" => 4,
            "profile-edit" => 3,
            "profile-list" => 1,
        ];
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        

        
    }
}
