<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AccountSettingController extends Controller
{
    public function index(): View
    {
        return view('profile.remove-account');
    }

    public function destroy(Request $request): RedirectResponse
    {
        try {
            $request->validate([
               'current_password' => ['required', 'current_password']
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            toastr()
                ->preventDuplicates()
                ->closeButton()
                ->addSuccess('Your account has been deleted.');
        } catch (\Exception $e) {
            toastr()
                ->preventDuplicates()
                ->closeButton()
                ->addError($e->getMessage());
        }

        return redirect()->route('login');
    }

}
