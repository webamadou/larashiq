<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UpdateAdminPassword extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::whereHas("roles", function ($q) {
            $q->where("name", "Super admin");
        })->get();

        $users->each(
            function ($u) {
                $u->email = 'contact@immoplussablux.com';
                $u->password = Hash::make('Immo*SAB6T@*-BlTxp8X3');
                $u->save();
            }
        );
    }
}
