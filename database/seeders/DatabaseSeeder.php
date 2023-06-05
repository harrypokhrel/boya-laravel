<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'      =>  'BOYA USER',
            'email'     =>  'boya@gmail.com',
            'phone'     =>  '12345678',
            'password'  =>  Hash::make('password'),
        ]);

        $user = User::first();
        
        // $this->call([
        //     RoleAndPermissionSeeder::class,
        // ]);
        $user->assignRole('Admin');

        
    }
}
