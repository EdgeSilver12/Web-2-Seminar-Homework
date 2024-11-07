<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex">
        <!-- Sidebar for Menu -->
        <aside class="w-1/4 p-4 rounded shadow-lg bg-white dark:bg-gray-800">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Navigation Menu</h3>
            <ul class="space-y-2">
                @foreach($menuItems as $menuItem)
                    <li>
                        <!-- Main menu item -->
                        <a href="{{ $menuItem->url }}" class="text-blue-500 dark:text-blue-400 flex items-center justify-between py-2 px-4 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
                            {{ $menuItem->name }}
                        </a>

                        <!-- Sub-menu items, if any -->
                        @if($menuItem->children->isNotEmpty())
                            <ul class="ml-6 space-y-1"> <!-- Adds left margin for indentation -->
                                @foreach($menuItem->children as $child)
                                    <li>
                                        <a href="{{ $child->url }}" class="text-blue-400 dark:text-blue-300 flex items-center justify-between py-2 px-4 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
                                            - {{ $child->name }} <!-- Optional: "-" to indicate hierarchy -->
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </aside>

        <!-- Main Content Area -->
        <main class="w-3/4 bg-white dark:bg-gray-800 p-6 rounded shadow-lg ml-4">
            <div class="text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>

            <!-- Button to view daily exchange rate -->

        </main>
    </div>
</x-app-layout>
