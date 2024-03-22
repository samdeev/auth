@php use Illuminate\Contracts\Auth\MustVerifyEmail; @endphp
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-900 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <section>
                        <header>
                            <h2 class="text-lg" font-medium text-gray-900>
                                {{ __('Profile Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-neutral-600">
                                {{ __('Update your account\'s profile information.') }}
                            </p>
                        </header>

                        {{-- Send email verification link --}}
                        <form action="{{ route('verification.send') }}" method="POST" id="verification-send">
                            @csrf
                        </form>

                        {{-- Start of update form --}}
                        <form action="{{ route('profile.update') }}" method="POST" class="mt-4">
                            @csrf
                            @method('PATCH')

                            <div>
                                <x-forms.input-label for="name" :value="__('Name')" />
                                <x-forms.input-text
                                    name="name"
                                    id="name"
                                    value="{{ old('name', request()->user()->name) }}"
                                />
                                <x-forms.input-error :field="__('name')" />
                            </div>
                            <div class="mt-4">
                                <x-forms.input-label for="email" :value="__('Email')" />
                                <x-forms.input-text
                                    name="email"
                                    id="email"
                                    value="{{ old('email', request()->user()->email) }}"
                                />
                                <x-forms.input-error :field="__('email')" />
                            </div>

                            @if(request()->user() instanceof MustVerifyEmail && ! request()->user()->hasVerifiedEmail())
                                <p class="mt-2">
                                    {{ __('Your email address is not verified.') }}

                                    <button
                                        form="verification-send"
                                        class="underline text-sm text-neutral-600 hover:text-neutral-900 transition"
                                    >
                                        {{ __('Click here to re-send verification email.') }}
                                    </button>
                                </p>

                                @if(session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            @endif

                            <div class="mt-4 flex items-center gap-4">
                                <x-forms.primary-button>
                                    {{ __('Save') }}
                                </x-forms.primary-button>
                            </div>

                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
