<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(['name' => Role::SUPER_ADMIN]);
        Role::updateOrCreate(['name' => Role::ADMIN]);
        Role::updateOrCreate(['name' => Role::SUPER_PUBLISHER]);
        Role::updateOrCreate(['name' => Role::PUBLISHER]);
        Role::updateOrCreate(['name' => Role::EDITOR]);
        Role::updateOrCreate(['name' => Role::OWNER]);
        Role::updateOrCreate(['name' => Role::SIMPLE_USER]);
    }
}
