<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function myAccount()
    {
        $user = auth()->user();
        $properties = $user->favorite_properties;
        $title = " - Mon profil";

        return view('my_account')
            ->with('user', $user)
            ->with('properties', $properties->all())
            ->with('title', $title);
    }
}
