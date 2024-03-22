<x-guest-layout>
    <div class="mb-4 text-neutral-700">
        {{ __('Thanks for signing up!, Before getting started, could you verify your email address by clicking on the
link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') === 'verification-link-sent')
        <div class="mb-4 font-medium text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during the registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-forms.primary-button>
                    {{ __('Resend Verification Email') }}
                </x-forms.primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
