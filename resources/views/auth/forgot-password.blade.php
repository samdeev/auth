<x-guest-layout>
    <div class="mb-4 text-sm text-gray-500">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password
reset link that will allow you to create a new one.') }}
    </div>

    {{-- Session Status --}}
    <x-forms.auth-session :status="session('status')" />

    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.input-text name="email" id="email" />
            <x-forms.input-error :field="__('email')" />
        </div>

        <div class="flex justify-end mt-4">
            <x-forms.primary-button>
                {{ __('Send Password Reset Link') }}
            </x-forms.primary-button>
        </div>
    </form>
</x-guest-layout>
