<div x-data="{ open: false }">
    <!-- Tombol untuk membuka modal -->
    <button @click="open = true"
        class="w-full flex items-center justify-between bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 mb-4">
        <span>Buat catatan baru</span>
        <span class="text-xl font-bold">+</span>
    </button>

    <!-- Overlay Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
        x-transition.opacity>
        <div class="bg-white p-6 rounded-lg shadow-lg w-96" x-transition.scale>
            <h2 class="text-xl font-semibold mb-4">Buat Catatan Baru</h2>

            <!-- Notifikasi Error -->
            @if ($errors->any())
                <div class="text-red-500 text-sm mb-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Tambah Task -->
            <form method="POST" action="{{ route('tasks.store') }}" @submit="open = false">
                @csrf

                <!-- Input Judul -->
                <input type="text" name="title" placeholder="Masukkan judul catatan..."
                    class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">

                <!-- Tombol Simpan & Batal -->
                <div class="flex justify-end mt-4 space-x-2">
                    <button type="button" @click="open = false"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Untuk Mini Refresh -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.location.hash === "#refresh-tasks") {
            setTimeout(() => {
                window.location.hash = ""; // Hapus hash agar tidak refresh terus
            }, 100);
        }
    });
</script>