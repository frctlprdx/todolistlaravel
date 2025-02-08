<div class="w-full h-screen bg-blue-500 flex items-center justify-center text-white">
    <div class="container mx-auto px-6 lg:px-20 flex flex-col lg:flex-row items-center">
        
        <!-- Bagian Kiri: Teks -->
        <div class="lg:w-1/2 text-center lg:text-left">
            <h1 class="text-5xl font-bold leading-tight">
                Selamat Datang di MyToDO!
            </h1>
            <p class="mt-4 text-lg">
                Temukan berbagai fitur menarik setelah login!
            </p>
            <a href="{{ route('register') }}" class="mt-6 inline-block px-6 py-3 bg-white text-blue-500 rounded-lg font-semibold hover:bg-gray-200">
                Daftar Sekarang
            </a>
        </div>

        <!-- Bagian Kanan: Mockup Web -->
        <div class="lg:w-1/2 mt-10 lg:mt-0 flex justify-center">
            <img src="{{ asset('images/hero.png') }}" alt="Mockup Web" class="w-full lg:w-full rounded-lg shadow-lg">
        </div>
        
    </div>
</div>
