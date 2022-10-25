<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
        </div>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <div class="flex flex-col lg:flex-row container mx-auto space-y-6 lg:space-y-0 lg:space-x-4 my-6">
        <div class="lg:basis-3/4">
            <div class="flex flex-col space-y-3">
                <div class="p-3 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <x-jet-input
                        class="w-full text-lg font-semibold"
                        type="text"
                        name="title"
                        :value="$post->title"
                        placeholder="Enter title here"
                        required
                        autofocus
                        disabled
                    />
                </div>

                <div class="p-3 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 mx-auto bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                        <div id="editorjs"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:basis-1/4">
            <div class="p-4 sm:p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 space-y-5">

                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Category</label>
                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                        <option value="1" selected>{{ $post->postCategory->name }}</option>
                    </select>
                </div>

                <a href="{{ route('posts.edit', $post->id) }}" class="block w-full text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Edit Post</a>
            </div>
        </div>
    </div>

    <script>
        const docData = '{{ $post->body }}';
        // Decode base64 string
        const decodedData = atob(docData);

        document.addEventListener('DOMContentLoaded', function(event) {
            const editor = new EditorJS({
                minHeight: 0,
                placeholder: "Begin your story...",
                readOnly: true,
                tools: {
                    header: {
                        class: window.EditorJS.Header,
                        config: {
                            placeholder: 'Enter a header',
                            levels: [3],
                            defaultLevel: 3,
                        }
                    }
                },
                data: JSON.parse(decodedData),
            });
        })
    </script>
</x-app-layout>
