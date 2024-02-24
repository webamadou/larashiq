<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify(Request $request): RedirectResponse
    {
        $id = $request->id ?? 0;
        $hash = $request->hash ?? '';
        $user = User::find($id);

        // make sure we have a user with given id
        if (! $user) {
            return redirect()->route('home_page');
        }

        // we make sure the hash is correct
        if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return redirect()->route('home_page');
        }

        // If user is already verified we simply return to verified page
        if ($user->email_verified_at) {
            return redirect()->route('verified');
        }
        // Check the email then send verify the user
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect()->route('verified');
    }
}
