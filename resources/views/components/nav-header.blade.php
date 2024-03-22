<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
            </a>
        </div>
        @guest
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">
                {{ __('Login') }}
            </a>
        </div>
        @endguest

{{--        @auth--}}
{{--            <div class="hidden lg:flex lg:flex-1 lg:justify-end">--}}
{{--                <form action="{{ route('logout') }}" method="POST">--}}
{{--                    @csrf--}}

{{--                    <x-forms.primary-button class="bg-red-500 hover:bg-red-400">--}}
{{--                        {{ __('Logout') }}--}}
{{--                    </x-forms.primary-button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        @endauth--}}

        @auth
            <div class="hidden lg:flex" x-data="{ show: false }" @click.outside="show = false">
                <div class="relative">
                    <button
                        @click="show = !show"
                        type="button"
                        class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                        aria-expanded="false"
                    >
                        {{ auth()->user()->name }}
                        <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div
                        x-show="show"
                        x-transition.duration.200ms
                        class="absolute right-0 top-full z-10 max-w-xl w-60 overflow-hidden rounded-md bg-white shadow-lg
                        ring-1 ring-neutral-900/5">
                        <div class="p-4 divide-y divide-neutral-200">
                            <a href="{{ route('profile.edit') }}" class="group relative flex items-center gap-x-3 p-3 text-sm leading-6 hover:bg-neutral-100">
                                <div class="flex h-9 w-9 flex-none items-center justify-center rounded-lg bg-neutral-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <p class="block font-semibold text-neutral-900">Profile</p>
                                </div>
                            </a>

                            <a href="{{ route('password.edit') }}" class="group relative flex items-center gap-x-3 p-3 text-sm leading-6 hover:bg-neutral-100">
                                <div class="flex h-9 w-9 flex-none items-center justify-center rounded-lg bg-neutral-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <p class="block font-semibold text-neutral-900">Change Password</p>
                                </div>
                            </a>

                            <a href="{{ route('setting.index') }}" class="group relative flex items-center gap-x-3 p-3 text-sm leading-6 hover:bg-neutral-100">
                                <div class="flex h-9 w-9 flex-none items-center justify-center rounded-lg bg-neutral-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <p class="block font-semibold text-neutral-900">Account Settings</p>
                                </div>
                            </a>

                            <div class="group relative cursor-pointer flex items-center gap-x-3 p-3 text-sm leading-6 hover:bg-neutral-100">
                                <div class="flex h-9 w-9 flex-none items-center justify-center rounded-lg bg-neutral-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="block font-semibold text-red-500">
                                            {{ __('Sign Out') }}
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </nav>
</header>
