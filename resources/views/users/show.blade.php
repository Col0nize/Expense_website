<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="">
                        <form>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                                Name
                            </label>
                            <input readonly value="{{ old('name',$user->name) }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-80" id="name" type="text" name="name" required="required" autofocus="autofocus" autocomplete="username">
                            <label class="mt-3 pt-3 block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                                Email
                            </label>
                            <input readonly value="{{ old('email',$user->email) }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-80" id="email" type="email" name="email" required="required" autofocus="autofocus" autocomplete="username">
                            <div class="mt-3 pt-3">
                                <a class="btn bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded " href="{{ route('users.index')}}" >Back</a>
                            </div>  
                        </form>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
