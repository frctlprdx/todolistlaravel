<nav x-data="{ open: false }" class="fixed top-4 left-0 right-0 w-5/6 sm:max-w-7xl mx-auto bg-white shadow-lg rounded-2xl px-6 py-3 flex items-center z-50">
    <!-- Logo -->
    <div class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 rounded-full">
        <span class="ml-3 sm:text-xl font-semibold">| MyToDO</span>
    </div>

    <!-- Burger Button (Mobile) -->
    <button @click="open = !open" class="sm:hidden ml-auto text-gray-700 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <!-- Menu Desktop -->
    <ul class="hidden sm:flex space-x-6 ml-auto mr-4">
        <li><a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-500">Beranda</a></li>
        <li><a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500">Signup</a></li>
        <li>
            <a href="{{ route('loginemail') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Login
            </a>
        </li>
    </ul>

    <!-- Menu Mobile -->
    <div x-show="open" x-transition class="absolute top-full left-0 w-full mt-2 rounded-xl bg-white shadow-md sm:hidden p-4 z-40">
        <a href="{{ route('dashboard') }}" class="block text-gray-700 hover:text-blue-500 mb-2">Beranda</a>
        <a href="{{ route('register') }}" class="block text-gray-700 hover:text-blue-500 mb-2">Signup</a>
        <a href="{{ route('loginemail') }}" class="block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 text-center">Login</a>
    </div>
</nav>
