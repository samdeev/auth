<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-900 leading-tight">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-red-500">
                                {{ __('Delete Account') }}
                            </h2>

                            <p class="mt-1 text-sm text-neutral-600">
                                {{ __('Once your account is deleted, all its resources and data will be permanently deleted.
                                Before deleting your account, please download any data or information that you wish to retain.') }}
                            </p>
                        </header>

                        {{-- Start of update form --}}
                        <form action="{{ route('setting.destroy') }}" method="POST" class="mt-4">
                            @csrf
                            @method('DELETE')

                            <div>
                                <x-forms.input-label for="current_password" :value="__('Password')" />
                                <x-forms.input-text
                                    type="password"
                                    name="current_password"
                                    id="current_password"
                                />
                                <x-forms.input-error :field="__('current_password')" />
                            </div>

                            <div class="mt-4 flex items-center gap-4">
                                <x-forms.danger-button>
                                    {{ __('Delete') }}
                                </x-forms.danger-button>

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
