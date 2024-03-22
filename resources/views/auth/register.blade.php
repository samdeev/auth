<x-guest-layout>
    <div class="my-4">
        <h2 class="text-center font-bold text-2xl text-neutral-900 tracking-tight">
            Create an account
        </h2>
    </div>

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <x-forms.input-label for="name" :value="__('Name')" />
            <x-forms.input-text
                name="name"
                id="name"
                value="{{ old('name') }}"
            />
            <x-forms.input-error :field="__('name')" />
        </div>
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.input-text
                name="email"
                id="email"
                value="{{ old('email') }}"
            />
            <x-forms.input-error :field="__('email')" />
        </div>
        <div>
            <x-forms.input-label for="password" :value="__('Password')" />
            <x-forms.input-text
                type="password"
                name="password"
                id="password"
            />
            <x-forms.input-error :field="__('password')" />
        </div>
        <div>
            <x-forms.input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-forms.input-text
                type="password"
                name="password_confirmation"
                id="password_confirmation"
            />
        </div>
        <div class="flex justify-end items-center space-x-3">
            <a href="{{ route('login') }}" class="text-sm underline hover:text-neutral-700 transition">
                {{ __('Already have an account?') }}
            </a>
            <x-forms.primary-button>
                {{ __('Register') }}
            </x-forms.primary-button>
        </div>
    </form>
</x-guest-layout>
