<x-guest-layout>
    <div class="my-4">
        <h2 class="text-center font-bold text-2xl text-neutral-900 tracking-tight">
            Login to your account
        </h2>
    </div>

    <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.input-text
                name="email"
                id="email"
                value="{{ old('email') }}"
            />
            <x-forms.input-error :field="__('email')" />
        </div>
        <div class="flex justify-between items-center">
            <div class="flex-1">
                <x-forms.input-label for="password" :value="__('Password')" />
                <x-forms.input-text
                    type="password"
                    name="password"
                    id="password"
                />
                <x-forms.input-error :field="__('password')" />
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div>
                <input
                    type="checkbox"
                    name="remember"
                    id="remember"
                    class="w-4 h-4 text-blue-200 border border-gray-200 focus:ring-2 focus:ring-blue-600 focus:ring-offset-1">
                <label for="remember" class="text-neutral-800 text-[0.938rem]">{{ __('Remember Me') }}</label>
            </div>
            <div>
                <a href="{{ route('password.request') }}" class="text-[0.938rem] text-neutral-800 hover:text-neutral-700 underline transition">
                    {{ __('Forgot Password') }}
                </a>
            </div>
        </div>
        <div class="flex justify-end items-center space-x-3">
            <a href="{{ route('register') }}" class="text-sm underline hover:text-neutral-700 transition">
                {{ __('Don\'t have an account?') }}
            </a>
            <x-forms.primary-button>
                {{ __('Login') }}
            </x-forms.primary-button>
        </div>
    </form>
</x-guest-layout>
