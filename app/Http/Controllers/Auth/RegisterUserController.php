<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterUserController extends Controller
{
    /**
     * Display the register page.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        $user = User::create($attributes);

        event(new Registered($user));

        Auth::login($user);


        toastr()->addSuccess('Account created successfully.');

        return redirect('/');
    }
}
