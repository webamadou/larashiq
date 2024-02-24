<?php

namespace App\Models;

use App\Http\Controllers\Auth\WelcomeNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Spatie\WelcomeNotification\ReceivesWelcomeNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use ReceivesWelcomeNotification;
    use LogsActivity;

    public const PASSWORD_TO_EDIT = 'EMPTY_PASSWORD';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'email',
        'password',
        'gender',
        'address',
        'birth_date',
        'birth_place',
        'phone_number',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->name}";
    }

    public function getMemberSinceAttribute(): string
    {
        $created_at = Carbon::make($this->created_at);
        return Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->diffForHumans();
    }

    public function getLastUpdateAttribute(): string
    {
        $updated_at = Carbon::make($this->updated_at);
        return Carbon::createFromFormat('Y-m-d H:i:s', $updated_at)->diffForHumans();
    }

    public function getDisplayGenderAttribute(): string
    {
        if ($this->gender == null) {
            return '<span class="text-immogray2">non défini</span>';
        }

        return $this->gender === 1 ? 'Homme' : 'Femme';
    }

    public static function boot()
    {
        parent::boot();

        // A chaque qu'on cree un user on lui attribut un role par defaut.
        // L'admin pourra le changer par la suite si necessaire
        static::created(fn ($user) => $user->assignRole(Role::SIMPLE_USER));
    }

    // cette methode est utilise pour customizer le message envoye a profil creer par l'admin
    public function sendWelcomeNotification(Carbon $validUntil)
    {
        $this->notify(new WelcomeNotification($validUntil));
    }

    /**
     * Retourne les roles attribues a un user en array ou en collection
     *
     * @param $field le nom du champ dans la table role
     * @param bool $toArray si egal a true, on retourne un array sinon on rtourn une collection
     * @return array|Collection
     */
    public function getRoles($field, $toArray = true): array|Collection
    {
        $roles = $this->roles()->pluck($field);
        return $toArray ? $roles->toArray() : $roles;
    }

    public static function formYearRange()
    {
        $currentYear = intVal(Carbon::now()->format('Y'));
        return $currentYear - 75 .':'. $currentYear - 15;
    }

    public static function getOwners(): Collection
    {
        return self::role([Role::OWNER])->get();
    }

    public function estimations(): HasMany
    {
        return $this->hasMany(Estimation::class);
    }

    public function alerts(): HasMany
    {
        return $this->hasMany(Alert::class);
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class)->withPivot('is_favorite', 'is_wishlist');
    }

    public function favoriteProperties(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $this
            ->properties
            ->filter(fn ($prop) => $prop->pivot->is_favorite == 1)
        );
    }
}
