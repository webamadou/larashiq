<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default super admin
        $user = User::firstOrCreate(
            ['email' => "suadmin@immoplus.com"],
            ['name' => 'Admin',
            'first_name' => 'Super',
            'email_verified_at' => Carbon::now(),
            'password' => App::Environment('local')
                ? Hash::make('password')
                : Hash::make('password')
                ]
        );
        $user->assignRole(Role::SUPER_ADMIN);

        // Default admin
        $user = User::firstOrCreate(
            ['email' => "admin@immoplus.com"],
            ['name' => 'Admin',
            'first_name' => 'Admin',
            'email_verified_at' => Carbon::now(),
            'password' => App::Environment('local')
                ? Hash::make('password')
                : Hash::make('password')
                ]
        );
        $user->assignRole(Role::ADMIN);

        // Default owners
        $user = User::firstOrCreate(
            ['email' => "first_owner@immoplus.com"],
            [
                'name' => 'Propriétaire',
                'first_name' => 'Premier',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ]
        );
        $user->assignRole(Role::OWNER);
        $user = User::firstOrCreate(
            ['email' => "second_owner@immoplus.com"],
            [
                'name' => 'Propriétaire',
                'first_name' => 'Second',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ]
        );
        $user->assignRole(Role::OWNER);

        // Default chef super annonceur
        $user = User::firstOrCreate(
            ['email' => "super_annonceur@immoplus.com"],
            ['name' => 'Commercial',
                'first_name' => 'Chef',
                'email_verified_at' => Carbon::now(),
                'password' => App::Environment('local')
                    ? Hash::make('password')
                    : Hash::make('password')
                    ]
        );
        $user->assignRole(Role::SUPER_PUBLISHER);

        // Default annonceur
        $user = User::firstOrCreate(
            ['email' => "annonceur@immoplus.com"],
            ['name' => 'Commercial',
                'first_name' => 'Commercial',
                'email_verified_at' => Carbon::now(),
                'password' => App::Environment('local')
                    ? Hash::make('password')
                    : Hash::make('password')
                    ]
        );
        $user->assignRole(Role::PUBLISHER);

        // Default annonceur
        $user = User::firstOrCreate(
            ['email' => "redacteur@immoplus.com"],
            ['name' => 'Rédacteur',
                'first_name' => 'Rédacteur',
                'email_verified_at' => Carbon::now(),
                'password' => App::Environment('local')
                    ? Hash::make('password')
                    : Hash::make('password')
                    ]
        );
        $user->assignRole(Role::EDITOR);
    }
}
