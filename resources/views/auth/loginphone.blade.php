<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login dengan Nomor Telepon</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- CDN Tailwind -->
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Login dengan Nomor Telepon</h2>

        <form action="{{ route('loginphone.process')}}" method="POST" class="mt-6">
            <!-- Nomor Telepon -->
            @csrf
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone_number"
                       class="w-full p-3 border rounded-lg mt-1 focus:ring focus:ring-blue-300"
                       placeholder="Masukkan nomor telepon Anda" required>
            </div>

            <!-- Tombol Kirim OTP -->
            <button type="submit"
                    class="w-full mt-6 bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition">
                Kirim Kode OTP
            </button>
        </form>

        <!-- Link ke Login dengan Email -->
        <p class="text-sm text-center text-gray-600 mt-4">
            Atau login dengan <a href="{{ route('loginemail') }}" class="text-blue-500 hover:underline">Email & Password</a>
        </p>
    </div>

</body>
</html>
