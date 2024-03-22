<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Mockery\Exception;
use function toastr;

class PasswordController extends Controller
{
    public function edit(): View
    {
        return view('profile.change-password');
    }

    public function update(Request $request): RedirectResponse
    {
        try {
            $attributes = $request->validate([
               'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::min(6), 'confirmed']
            ]);

            $updated = $request->user()->update([
               'password' => Hash::make($attributes['password'])
            ]);

            if ($updated) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }

            toastr()
                ->preventDuplicates()
                ->closeButton()
                ->addSuccess('Password has been updated. Please try logging in again.');
        } catch (Exception $e) {
            toastr()
                ->preventDuplicates()
                ->closeButton()
                ->addError($e->getMessage());
        }

        return redirect()->route('login');
    }
}
