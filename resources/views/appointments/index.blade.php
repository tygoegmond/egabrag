<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Appointments') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Appointments
                {{-- @can('create', Spatie\Permission\Models\Appointment::class) --}}
                <a href="{{ route('appointments.create') }}" class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
            {{-- @endcan --}}
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Title 
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Date-Time 
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Location
                    </th>
                  
                    <th scope="col" class="py-3 px-6">
                        Duration
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Travel time
                    </th>
                  
                    <th scope="col" class="py-3 px-6">
                        Coach
                    </th>
                  

                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                
            </thead>
            <tbody>
                @foreach ($appointments as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->title }}
                        </th>
                     
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->datetime }}
                        </th>
                     
                        <td class="py-4 px-6">
                            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                                {{ $post->location  }}
                            </span>
                        </td>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->duration }} minutes
                        </th>
                     
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->travel_time }} minutes
                        </th>
                     
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('posts.show', $post->id) }}">
                            {{ $post->coach_id == -1 ? 'No coach' : $post->coach_id}} 
                            </a>
                        </th>

                        <td class="py-4 px-6 text-right">
                            @can('update', $post)
                                <a href="{{ route('posts.edit', $post->id) }}" class="mx-1 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            @endcan

                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mx-1 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  

</x-app-layout>
