<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
            <div class="text-neutral-700">
                <h2 class="text-2xl font-bold">Your shortened URL</h2>
                <p>Copy the short link and share it in messages, texts, posts, websites and other locations.</p>
            </div>
                <div>
                    <div class="flex justify-between items-start">
                        <div class="flex-1 block">
                            <input
                                type="text"
                                name="original_url"
                                value="{{ $key }}"
                                id="original_url"
                                disabled
                                class="border w-full p-4 text-lg rounded-md border-neutral-300 shadow-sm focus:outline-none
                                       focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2"
                            />
                        </div>
                        <div>
                            <x-forms.primary-button id="copy-url" type="button" class="py-4">
                                {{ __('Copy URL') }}
                            </x-forms.primary-button>
                        </div>
                        </div>
                </div>

                <div>
                    <p>Long URL: <a href="{{ $original_url }}" class="text-green-600 font-medium">{{ $original_url }}</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        value = document.querySelector('#original_url').value
        btn = document.querySelector('#copy-url');
        btn.addEventListener('click', function () {
            navigator.clipboard.writeText(value)
                .then(alert('Copied to clipboard'))
        })
    </script>
</x-app-layout>
