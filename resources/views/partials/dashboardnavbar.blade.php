<nav class="fixed w-full bg-blue-500 shadow-md p-4 flex items-center justify-between ">
    <!-- Kiri: Logo dan MyTodo -->
    <div class="flex items-center space-x-2">
        <img src="/logo.png" alt="Logo" class="w-8 h-8"> <!-- Ganti dengan path logo -->
        <span class="text-xl font-bold text-white">|  MyTodo</span>
    </div>
    
    <!-- Tengah: Search Bar -->
    <div class="w-1/3">
        <input type="text" placeholder="Search task title..." 
               class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">
    </div>
    
    <!-- Kanan: Calendar, Friends, Notifications, Profile -->
    <div class="flex items-center space-x-4">
        <button class="text-white hover:text-blue-800">
            <i class="fas fa-calendar-alt text-xl"></i>
        </button>
        <button class="text-white hover:text-blue-800">
            <i class="fas fa-user-friends text-xl"></i>
        </button>
        <button class="text-white hover:text-blue-800 relative">
            <i class="fas fa-bell text-xl"></i>
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1">1</span>
        </button>
        
        <!-- Profile Circle -->
        <form action="{{ route('logout') }}" method="POST"> 
            @csrf
            <button class="w-10 h-10 bg-gray-300 rounded-full overflow-hidden">
                <img src="/profile.jpg" alt="Profile" class="w-full h-full object-cover">
            </button>
        </form>
    </div>
</nav>

<!-- Pastikan untuk menyertakan FontAwesome untuk ikon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
