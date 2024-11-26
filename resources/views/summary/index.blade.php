<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Summary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="">

                        {{-- @foreach ($expensesByCategory as $category => $expenses)
                            <h3 class="text-xl font-semibold text-white">{{ $category }}</h3>
                            <ul>
                                @foreach ($expenses as $expense)
                                    <li class="text-white">
                                        {{ $expense->date_time }} - RM{{ number_format($expense->amount, 2) }}
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach --}}

                        @if ($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg border border-red-400">
                                <strong class="font-medium">Please fix the following errors:</strong>
                                <ul class="mt-2 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="">

                            {{-- Select bar --}}
                            <div class="mb-2 pb-2">
                                <form class=" flex flex-row  space-x-4" action="{{ route('summary.index') }}"
                                    method="get">


                                    <label class="mt-3" for="month">Select Month:</label>
                                    <select name="month" id="month"
                                        class=" border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                                     dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm
                                     block mt-1 w-35">
                                        <option value="">All</option>
                                        @foreach (range(1, 12) as $month)
                                            <option value="{{ $month }}"
                                                {{ request('month') == $month ? 'selected' : '' }}>
                                                {{-- {{ date('F', mktime(0, 0, 0, $month, 1)) }} --}}
                                                {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label class="mt-3" for="year">Select Year:</label>
                                    <select name="year" id="year"
                                        class=" border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                                     dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm
                                     block mt-1 w-35">
                                        <option value="">All</option>
                                        @for($year = 2018; $year <= now()->year; $year++)
                                        <option value="{{ $year }}"
                                            {{ request('year') == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                        @endfor
                                        {{-- @foreach(array_reverse(range(2010, 2024)) as $year)
                                            <option value="{{ $year }}"
                                                {{ request('year') == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endforeach --}}
                                    </select>

                                    <label for="min">Minimum Expense (RM):</label>
                                    <input type="number" name="min" id="min" value="{{ request('min') }}"
                                        class=" border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                                    dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm
                                    block mt-1 w-35">

                                    <label for="max">Maximum Expense (RM):</label>
                                    <input type="number" name="max" id="max" value="{{ request('max') }}"
                                        class=" border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                                    dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm
                                    block mt-1 w-35">

                                    <button
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded "
                                        type="submit">Filter</button>
                                </form>
                            </div>
                        </div>

                        <div class=" overflow-x-auto mb-2">
                            <div class="mb-2 pb-2 place-items-center">
                                <table
                                    class="w-3/4 text_center border border-gray-600 rounded-lg border-collapse bg-gray-900 text-white divide-y divide-gray-700">
                                    <thead class="  bg-gray-800 text-white uppercase text-sm font-semibold">
                                        <tr class="px-4 py-3 text-center">
                                            <td>#</td>
                                            <td>Category</td>
                                            <td>Expenses</td>
                                            <td>date & time</td>

                                        </tr>
                                    </thead>

                                    <tbody class="px-4 py-3 text-center">
                                        @forelse ($expenses as $expense)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $expense->category->name }}</td>
                                                <td>{{ number_format($expense->amount) }}</td>
                                                <td>{{ $expense->date_time->format('d/m/Y') }}</td>
                                            </tr>

                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class=" overflow-x-auto mb-2">
                                <div class="mb-2 pb-2 place-items-center">
                                    <label class="text-lg">Expenses Catagory</label>
                                    <table
                                        class="w-3/4 text_center border border-gray-600 rounded-lg border-collapse bg-gray-900 text-white divide-y divide-gray-700">
                                        <thead class="  bg-gray-800 text-white uppercase text-sm font-semibold">
                                            <tr class="px-4 py-3 text-center">
                                                <td>#</td>
                                                <td>Category</td>
                                                <td>Total Expenses (RM)</td>

                                            </tr>
                                        </thead>

                                        <tbody class="px-4 py-3 text-center">
                                            @forelse ($expensesByCategory as $category => $totalAmount)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $category }}</td>
                                                    <td>{{ number_format($totalAmount, 2) }}</td>
                                                </tr>

                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="ml-2 pl-2  dark:bg-gray-900 rounded-lg border w-2/6">
                                <div class="">
                                    Total income: RM{{ number_format($income, 2) }}
                                </div>
                                <div class="">
                                    Total expense: RM{{ number_format($expenses->sum('amount'), 2) }}
                                </div>
                                <div class="">
                                    Total income aftr expense: RM
                                    {{ number_format($income - $expenses->sum('amount'), 2) }}
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
