<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- CDN Tailwind -->
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Daftar Akun</h2>
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('register.process') }}" method="POST" class="mt-6">
            @csrf <!-- Tambahkan ini untuk menghindari error 419 -->
            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name"
                    class="w-full p-3 border rounded-lg mt-1 focus:ring focus:ring-blue-300"
                    placeholder="Masukkan nama Anda" required>
            </div>

            <!-- Email -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full p-3 border rounded-lg mt-1 focus:ring focus:ring-blue-300"
                    placeholder="Masukkan email Anda" required>
            </div>

            <!-- Nomor Telepon -->
            <div class="mt-4">
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="tel" id="phone_number" name="phone_number"
                    class="w-full p-3 border rounded-lg mt-1 focus:ring focus:ring-blue-300"
                    placeholder="Masukkan nomor telepon Anda" required>
            </div>

            <!-- Password -->
            <div class="mt-4 relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full p-3 border rounded-lg mt-1 focus:ring focus:ring-blue-300"
                    placeholder="Masukkan password" required>
                <button type="button" onclick="togglePassword('password')"
                    class="absolute right-3 top-10 text-sm text-blue-500">
                    Show
                </button>
            </div>

            <!-- Konfirmasi Password -->
            <div class="mt-4 relative">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                    Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full p-3 border rounded-lg mt-1 focus:ring focus:ring-blue-300"
                    placeholder="Ulangi password" required>
                <button type="button" onclick="togglePassword('password_confirmation')"
                    class="absolute right-3 top-10 text-sm text-blue-500">
                    Show
                </button>
            </div>


            <!-- Tombol Register -->
            <button type="submit"
                class="w-full mt-6 bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition">
                Daftar
            </button>
        </form>

        <!-- Link ke Login -->
        <p class="text-sm text-center text-gray-600 mt-4">
            Sudah punya akun? <a href="{{ route('loginemail') }}" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>

</body>

</html>


<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        const button = event.target;

        if (input.type === "password") {
            input.type = "text";
            button.innerText = "Hide";
        } else {
            input.type = "password";
            button.innerText = "Show";
        }
    }
</script>