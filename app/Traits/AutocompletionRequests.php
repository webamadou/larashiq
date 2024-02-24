<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\User;

trait AutocompletionRequests
{
    public function ownersList($searchTerms)
    {
        return User::query()
            ->when($searchTerms, function ($query, $name) {
                return $query
                    ->where('first_name', 'LIKE', '%' . $name . '%')
                    ->orWhere('name', 'LIKE', '%' . $name . '%');
            })
            /*->role(Role::OWNER)*/
            ->orderBy('name')
            ->get();
    }
}
