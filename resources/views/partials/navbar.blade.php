<nav class="fixed top-4 left-0 right-0 max-w-7xl mx-auto bg-white shadow-lg rounded-2xl px-6 py-3 flex justify-between items-center z-50">
    <!-- Logo -->
    <div class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 rounded-full">
        <span class="ml-3 text-xl font-semibold">|   MyToDO</span>
    </div>

    <!-- Navigasi -->
    <ul class="flex space-x-6 ml-auto mr-4">
        <li><a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-500">Beranda</a></li>
        <li><a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500">Signup</a></li>
    </ul>

    <!-- Tombol Login -->
    <a href="{{ route('loginemail') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
        Login
    </a>
</nav>
