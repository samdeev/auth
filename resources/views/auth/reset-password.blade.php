<x-guest-layout>
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}" />
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.input-text name="email" id="email" value="{{ old('email') }}" />
            <x-forms.input-error :field="__('email')" />
        </div>

        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('Password')" />
            <x-forms.input-text type="password" name="password" id="password" />
            <x-forms.input-error :field="__('password')" />
        </div>

        <div class="mt-4">
            <x-forms.input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-forms.input-text type="password" name="password_confirmation" id="password_confirmation" />
        </div>

        <div class="flex justify-end mt-4">
            <x-forms.primary-button>
                {{ __('Reset Password') }}
            </x-forms.primary-button>
        </div>
    </form>
</x-guest-layout>
