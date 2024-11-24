<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="">
                        <form method="post" action="{{ route('category.store')}}">
                            @method('post')
                            @csrf
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                                Category
                            </label>
                            <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-80" id="name" type="text" name="name" required="required" autofocus="autofocus" autocomplete="username">
                            <div class="mt-3 pt-3 space-x-1">
                                <button type="submit" class="btn bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ">Submit</button>
                                <a class="btn bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded " href="{{ route('category.index')}}" >Back</a>
                            </div>  
                        </form>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>