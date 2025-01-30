<?php

namespace Piyush\LaravelLayouts\Database\Seeders;

use Piyush\LaravelLayouts\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::upsert([
            [
                'name' => 'Developer Admin',
                'email' => 'developer@example.com',
                'password' => Hash::make('developer@example'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin@example'),
            ]
        ], ['email'], ['name', 'password']);
    }
}
