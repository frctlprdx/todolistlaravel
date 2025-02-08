<div x-data="{ open: false, taskToDelete: null }">
    <!-- Tombol Hapus -->
    <button @click="open = true; taskToDelete = {{ json_encode($task) }}" class="text-red-500 hover:text-red-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>
    </button>

    <!-- Modal Konfirmasi Hapus -->
    <div x-show="open" x-cloak @click.away="open = false" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" x-transition.opacity>
        <div class="bg-white p-6 rounded-lg shadow-lg w-[400px]" x-transition.scale>
            <h2 class="text-xl font-semibold mb-4">Apakah Anda Yakin?</h2>
            <p class="mb-4">Anda akan menghapus catatan ini, apakah Anda yakin?</p>
            <div class="flex justify-end space-x-2">
                <!-- Tombol Batal -->
                <button @click="open = false" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                    Batal
                </button>
                <!-- Tombol Hapus -->
                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
