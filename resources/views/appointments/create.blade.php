<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Appointments') }}
            </h2>
        </div>
    </x-slot>



    <div
        class="p-4 w-full max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 my-6 mx-auto">
        <x-jet-validation-errors class="mb-4" />

        <form class="space-y-6" method="POST" action="{{ route('appointments.create') }}">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Create a new Appointment</h5>
            @csrf

            <div>
                <label for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white lowercase"
                    placeholder="example: birthdate party" >
                @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="datetime " class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date:</label>
                
                <input type="datetime-local" name="datetime" id="datetime" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white lowercase">
               
            </div>
            <div>
                <label for="location"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Location</label>
                <input type="text" name="location" id="location"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white lowercase"
                    placeholder="Almere" >
                @error('location')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    for="sel1">Coach:</label>
                <select name="coach_id"
                    class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white lowercase"
                    id="sel1">
                    <option value=-1>no coach</option>
                    @foreach ($coaches as $coach)
                        <option value="{{ $coach['id'] }}">{{ $coach['name'] }}</option>
                    @endforeach

                </select>
                @error('coach')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="sel1">Travel
                    time:</label>
                <select
                    class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white lowercase"
                    name="travel_time" id="sel1">
                    <option value="0" default>none</option>
                    <option value="5">5 minutes</option>
                    <option value="15">15 minutes</option>
                    <option value="30">30 minutes</option>
                    <option value="60">60 minutes</option>
                    <option value="120">120 minutes</option>
                    
                </select>
                @error('travel_time')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    for="sel1">Duration:</label>
                <select
                    class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white lowercase"
                    name="duration" id="sel1">

                    <option value="30">30 minutes</option>
                    <option value="45">45 minutes</option>
                    <option value="60">60 minutes</option>
                    <option value="90">90 minutes</option>
                    <option value="120">120 minutes</option>
                    <option value="-1">All day</option>
                </select>
                @error('duration')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="sel1">Notify
                    me:</label>
                <select
                    class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white lowercase"
                    name="alert" id="sel1">
                    <option value="1">Don't notify me</option>
                    <option value="1">5 minutes before</option>
                    <option value="1">15 minutes before</option>
                    <option value="1">30 minutes before</option>
                    <option value="1">60 minutes before</option>
                    <option value="1">120 minutes before</option>
                </select>
                @error('notify')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            {{-- <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Permissions</label>
                @foreach ($permissions as $permission)
                    <div class="flex items-start my-1">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                        </div>
                        <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 ">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div> --}}

            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                Appointment</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
</x-app-layout>
