<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- CDN Tailwind -->
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>

        <form action="{{ route('loginemail.process')}}" method="POST" class="mt-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                       class="w-full p-3 border border-gray-300 rounded-lg mt-1 focus:ring focus:ring-blue-300 focus:outline-none"
                       placeholder="Masukkan email Anda" required>
            </div>

            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                       class="w-full p-3 border border-gray-300 rounded-lg mt-1 focus:ring focus:ring-blue-300 focus:outline-none"
                       placeholder="Masukkan password" required>
            </div>

            <button type="submit"
                    class="w-full mt-6 bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition font-semibold">
                Login
            </button>
        </form>

        <p class="text-sm text-center text-gray-600 mt-4">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:underline font-semibold">Daftar</a>
        </p>

        <!-- Link ke Login dengan Nomor Telepon -->
        <p class="text-sm text-center text-gray-600 mt-2">
            Atau login dengan <a href="{{ route('loginphone') }}" class="text-blue-500 hover:underline font-semibold">Nomor Telepon</a>
        </p>
    </div>

</body>
</html>
