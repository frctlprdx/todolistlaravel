<div x-data="{ open: false, task: { id: '', title: '', description: '' } }">
    <!-- Tombol Edit -->
    <button @click="open = true; task = {...selectedTask}" class="text-gray-500 hover:text-blue-500 flex-shrink-0 mt-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>                              
    </button>

    <!-- Overlay Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
        x-transition.opacity>
        <div class="bg-white p-6 rounded-lg shadow-lg w-[600px]" x-transition.scale>
            <h2 class="text-xl font-semibold mb-4">Edit Catatan</h2>

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

            <!-- Form Edit Task -->
            @if(isset($task) && !empty($task))
                <form method="POST" :action="`/tasks/${task.id}`">
                    @csrf
                    @method('PUT')

                    <!-- Input User ID (Hidden) -->
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <!-- Input Judul -->
                    <div class="mb-3">
                        <label class="block text-sm font-medium">Judul</label>
                        <input type="text" name="title" x-model="task.title" 
                            value="{{ old('title', $task->title ?? '') }}" 
                            class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300"
                            required>
                    </div>

                    <!-- Input Deskripsi -->
                    <div class="mb-3">
                        <label class="block text-sm font-medium">Deskripsi</label>
                        <textarea name="description" x-model="task.description" 
                                class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">{{ old('description', $task->description ?? '') }}</textarea>
                    </div>

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
            @endif
            
        </div>
    </div>
</div>
