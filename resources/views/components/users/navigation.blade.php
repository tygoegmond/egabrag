<div class="w-full bg-white rounded-none border dark:bg-gray-800 dark:border-gray-700">
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select tab</label>
        <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 sm:text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Statistics</option>
            <option>Services</option>
            <option>FAQ</option>
        </select>
    </div>
    <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg divide-x divide-gray-200 sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab">
        <x-users.navigation-button href="{{ route('users.user.index') }}" :active="request()->routeIs('users.user.*')">
            Users
        </x-users.navigation-button>
        <x-users.navigation-button href="{{ route('users.role.index') }}" :active="request()->routeIs('users.role.*')">
            Roles
        </x-users.navigation-button>
    </ul>
</div>
