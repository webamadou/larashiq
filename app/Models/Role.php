<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    // defining default roles
    public const SUPER_ADMIN = 'Super admin';
    public const ADMIN = 'Administrateur';
    public const SUPER_PUBLISHER = 'Super Annonceur'; // ==
    public const PUBLISHER = 'Annonceur';
    public const EDITOR = 'Rédacteur';
    public const OWNER = 'Propriétaire';
    public const SIMPLE_USER = 'Utilisateur';
}
