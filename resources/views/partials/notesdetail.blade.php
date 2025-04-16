<div x-data="taskComponent()" class="flex h-screen pt-16">
    <!-- Sidebar Tasks (40%) -->
    <div class="w-2/5 bg-gray-400 p-6 border-r h-full overflow-y-auto">
        <h2 class="text-xl font-semibold mb-4">Tasks</h2>

        <!-- Include Popup (Tombol & Modal) -->
        @include('partials.titlepopup')

        <!-- List of Tasks -->
        <ul class="space-y-2">
            @foreach ($tasks as $task)
                <li
                    class="p-3 bg-white shadow-md rounded-lg cursor-pointer hover:bg-gray-200 flex justify-between items-center">
                    <!-- Bagian Judul Tugas -->
                    <span @click="selectedTask && selectedTask.id === {{ $task->id }} ? selectedTask = { id: null } : selectedTask = {{ json_encode($task) }}" class="flex-grow">
                        {{ $task->title }}
                    </span>

                    <!-- Bagian Trash Icon -->
                    <div @click.stop="open = true" class="flex-shrink-0">
                        @include('partials.deletebutton')
                    </div>
                </li>
            @endforeach
        </ul>

    </div>

    <!-- Task Details (60%) -->
    <div class="w-3/5 p-6 bg-white h-full overflow-y-auto">
        <template x-if="!selectedTask.id">
            <div class="flex flex-col items-center justify-center h-full text-center text-gray-500">
                <h2 class="text-2xl font-semibold mb-2">Selamat Datang 👋</h2>
                <p class="text-lg">Ada pekerjaan hari ini?</p>
            </div>
        </template>
        <template x-if="selectedTask.id">
            <div>
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-xl font-semibold" x-text="selectedTask.title"></h2>

                    <!-- Tombol Aksi -->
                    <div class="flex space-x-3 items-center">
                        <!-- Checkbox Selesai -->
                        <input type="checkbox" class="w-5 h-5 cursor-pointer" :checked="selectedTask . completed"
                            @change="toggleCompleted(selectedTask.id)">


                        <!-- Tombol Favorit -->
                        <button @click="toggleFavorite(selectedTask)"
                            class="text-gray-500 hover:text-yellow-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                        </button>

                        <!-- Tombol Edit -->
                        @include('partials.editpopup')

                        <!-- Tombol Share -->
                        <button @click="shareTask(selectedTask)"
                            class="text-gray-500 hover:text-green-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <p class="text-gray-600 mb-4"
                    x-text="'Created at: ' + new Date(selectedTask.created_at).toLocaleDateString('id-ID')"></p>

                <div class="bg-white p-4 shadow-md rounded-lg">
                    <p class="text-gray-800 whitespace-pre-wrap"
                        x-text="selectedTask.description || 'Deskripsi tidak tersedia.'"></p>
                </div>

            </div>
        </template>

    </div>
</div>

<script>
    function taskComponent() {
        return {
            selectedTask: {
                id: null,
                completed: false
            },
            toggleCompleted(id) {
                fetch(`/tasks/${id}/toggle-completed`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Toggle berhasil:', data);
                        this.selectedTask.completed = data.completed;
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan:', error);
                    });
            }
        }
    }
</script>