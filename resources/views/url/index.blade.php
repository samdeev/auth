<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
                <div class="text-center font-bold text-2xl text-neutral-700">
                    Paste the URL to be shortened
                </div>

                <div>
                    <form action="{{ route('url.store') }}" method="POST">
                        @csrf
                        <div class="flex justify-between items-start">
                            <div class="flex-1 block">
                                <input
                                    type="text"
                                    name="original_url"
                                    class="border w-full p-4 text-lg rounded-md border-neutral-300 shadow-sm focus:outline-none
                                           focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2"
                                />
                                <x-forms.input-error :field="__('original_url')" />
                            </div>
                            <div>
                                <x-forms.primary-button class="py-4">
                                    {{ __('Shorten URL') }}
                                </x-forms.primary-button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="text-center">
                    ShortURL is a free tool to shorten URLs and generate short links
                    URL shortener allows to create a shortened link making it easy to share
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
