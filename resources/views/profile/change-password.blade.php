<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-900 leading-tight">
            {{ __('Change Password') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <section>
                        <header>
                            <h2 class="text-lg" font-medium text-gray-900>
                                {{ __('Update Password') }}
                            </h2>

                            <p class="mt-1 text-sm text-neutral-600">
                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                            </p>
                        </header>

                        {{-- Start of update form --}}
                        <form action="{{ route('password.change') }}" method="POST" class="mt-4">
                            @csrf
                            @method('PATCH')

                            <div>
                                <x-forms.input-label for="current_password" :value="__('Current Password')" />
                                <x-forms.input-text
                                    type="password"
                                    name="current_password"
                                    id="current_password"
                                />
                                <x-forms.input-error :field="__('current_password')" />
                            </div>

                            <div class="mt-4">
                                <x-forms.input-label for="password" :value="__('New Password')" />
                                <x-forms.input-text
                                    type="password"
                                    name="password"
                                    id="password"
                                />
                                <x-forms.input-error :field="__('password')" />
                            </div>

                            <div class="mt-4">
                                <x-forms.input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-forms.input-text
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                />
                                <x-forms.input-error :field="__('password_confirmation')" />
                            </div>

                            <div class="mt-4 flex items-center gap-4">
                                <x-forms.primary-button>
                                    {{ __('Save') }}
                                </x-forms.primary-button>

                                @if(session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 5000)"
                                        class="text-sm text-green-600"
                                    >
                                        {{ __('Saved.') }}
                                    </p>
                                @endif
                            </div>

                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
