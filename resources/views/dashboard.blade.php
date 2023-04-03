<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <section id="main" class="text-white mx-10 ">
        <div class="myCard flex-column">
            <h1 class="text-2xl">Restaurants:</h1>
            <br>
            <div class="" id="restaurants"></div>
            <br>
            {{-- paginacija --}}
            <div class="mt-auto">
                <nav class="" aria-label="Page navigation example">
                    <ul id="pagination" class="pagination flex gap-5 ">
                    </ul>
                </nav>
            </div>
        </div>
        <div class="myCard ">
            <h1 class="text-2xl">Items:</h1>
            <br>
            <div id="items" class="flex gap-5"></div>
        </div>
    </section>
    <section id="temp" class="myCard mx-10 mt-10 text-white"></section>
    <p></p>
</x-app-layout>
