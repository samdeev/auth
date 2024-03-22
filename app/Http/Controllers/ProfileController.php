<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use function toastr;

class ProfileController extends Controller
{
    /**
     * Display the edit profile form.
     */
    public function edit(): View
    {
        return view('profile.edit');
    }

    /**
     * Update the users profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email', 'lowercase',
                    Rule::unique(User::class)->ignore($request->user()->id)]
                ]);

            // Populate the user model with an array of attributes.
            $request->user()->fill($request->only('name', 'email'));

            // Check if the user email have been changed since the model was retrieved.
            // If true set the email_verified_at to null.
            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            $request->user()->save();

            toastr()
                ->preventDuplicates()
                ->closeButton()
                ->addSuccess('Profile updated successfully.');
        } catch (\Exception $e) {
            toastr()
                ->preventDuplicates()
                ->closeButton()
                ->addError($e->getMessage());
        }

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }
}
