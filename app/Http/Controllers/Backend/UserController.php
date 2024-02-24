<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class UserController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware(['role:'.Role::SUPER_ADMIN]);
    }

    public function index()
    {
        return view('bo.users.index');
    }

    public function create(User $user): Factory|View|Application
    {
        $roles = Role::whereNot('name', Role::SUPER_ADMIN)
            ->whereNot('name', 'user')
            ->pluck('name', 'id')
            ->toArray();
        return view('bo.users.create', compact('user', 'roles'));
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'service_id' => $request->service,
            'profile_type' => $request->user_type,
            'password' => User::PASSWORD_TO_EDIT,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'birth_place' => $request->birth_place,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
        ]);
        if ($user) {
            $user->email_verified_at = Carbon::now();
            $user->save();
            // On envoie un mail pour initialiser son mot de passe
            $expiresAt = now()->addDay();
            $user->sendWelcomeNotification($expiresAt);
            // On assigne les roles selectionnes au profil
            collect($request->roles)->map(fn ($role) => $user->assignRole($role));
        }

        return redirect()
            ->route('bo.users.index')
            ->with('success', 'Compte enregistré');
    }

    public function edit(User $user): Factory|View|Application
    {
        $roles = Role::whereNotIn('name', [Role::SUPER_ADMIN, Role::SIMPLE_USER])
            ->pluck('name', 'name')
            ->toArray();
        return view('bo.users.edit', compact('user', 'roles'));
    }

    public function show(User $user): Factory|View|Application
    {
        return view('bo.users.show', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'service_id' => $request->service,
            'profile_type' => $request->user_type,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'birth_place' => $request->birth_place,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
        ]);
        if ($user) {
            // d'abord nous allons remove tous les roles du user
            $user->roles()->detach();
            // On assigne les roles selectionnes au profil
            collect($request->roles)->map(fn ($role) => $user->assignRole($role));
        }

        return redirect()
            ->back()
            ->with('success', __('users.message_updated', ['name' => $user->name, 'id' => $user->id]));
    }

    public function destroy(User $user)
    {
        if ($user->hasRole(Role::SUPER_ADMIN)) {
            return redirect()
                ->route('bo.users.index');
        }

        if ($user->delete()) {
            return redirect()
                ->route('bo.users.index')
                ->with('success', __(
                    'users.message_confirm_deleted',
                    [
                        'name' => $user->name,
                        'id' => $user->id
                    ]
                ));
        }
    }
}
