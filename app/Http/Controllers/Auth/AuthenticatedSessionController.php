<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login page.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle incoming login request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            toastr()->closeButton()->addSuccess('Login successfully');
        } catch (\Exception $e) {
            toastr()->closeButton()->addError($e->getMessage());
        }

        return redirect('/');
    }

    public function destroy(Request $request): RedirectResponse
    {
        try {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            toastr()->closeButton()->addSuccess('Logout successfully');
        } catch (\Exception $e) {
            toastr()->closeButton()->addError($e->getMessage());
        }

        return redirect()->route('login');
    }
}
