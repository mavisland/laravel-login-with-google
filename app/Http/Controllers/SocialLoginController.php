<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider(string $provider): RedirectResponse
    {
        if (!in_array($provider, config('auth.socialite.drivers'), true)) {
            abort(404, 'Social Provider is not supported');
        }

        return Socialite::driver($provider)->redirect();
    }
}
