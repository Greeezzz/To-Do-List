<div>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-blue-500 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-md">
                <div class="p-6 text-white">
                    <h2 class="font-semibold text-2xl leading-tight">
                        Task List
                    </h2>
                </div>
            </div>

            <!-- Main Content -->
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-md">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-2">Aplikasi Task List Hari Ini</h3>
                    <hr class="mb-4 border-gray-300 dark:border-gray-700">

                    <!-- Input Form -->
                    <div class="mt-4">
                        <div class="flex flex-col space-y-4">
                            <div>
                                <label for="kegiatan" class="block text-sm font-medium mb-1">Task</label>
                                <input type="text" wire:model="kegiatan" id="kegiatan" 
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-gray-100 transition duration-200"
                                    placeholder="Tambah Task">
                                @error('kegiatan')
                                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                @if($kegiatan_id)
                                    <button wire:click="editKegiatan" 
                                        class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 text-white rounded-md shadow-md transition duration-200">
                                        Edit Task
                                    </button>
                                @else
                                    <button wire:click="tambahKegiatan" 
                                        class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 text-white rounded-md shadow-md transition duration-200">
                                        Tambah Task
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Task Table -->
                    <div class="mt-8 overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-200 dark:border-gray-700 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        No
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-200 dark:border-gray-700 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Nama Task
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-200 dark:border-gray-700 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-200 dark:border-gray-700 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($task as $t)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{ $t->kegiatan }}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($t->status == 'Sudah') bg-green-100 text-green-800 
                                                @elseif($t->status == 'Proses') bg-yellow-100 text-yellow-800 
                                                @else bg-red-100 text-red-800 @endif">
                                                {{ $t->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex space-x-2">
                                                <!-- Edit Button -->
                                                <button wire:click="editTask({{ $t->id }})" 
                                                    class="px-3 py-1 bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-300 text-white rounded-md shadow-sm transition duration-200">
                                                    Edit
                                                </button>
                                                
                                                <!-- Delete Button -->
                                                <button wire:click="hapusTask({{ $t->id }})" 
                                                    class="px-3 py-1 bg-red-500 hover:bg-red-600 focus:ring-2 focus:ring-red-300 text-white rounded-md shadow-sm transition duration-200">
                                                    Delete
                                                </button>
                                                
                                                <!-- Status Buttons -->
                                                <button wire:click="updateStatus({{ $t->id }}, 'Sudah')" 
                                                    class="px-3 py-1 rounded-md shadow-sm focus:outline-none transition duration-200
                                                    @if($t->status == 'Sudah') 
                                                        bg-blue-600 text-white 
                                                    @else 
                                                        bg-white text-blue-600 border border-blue-600 hover:bg-blue-50 
                                                    @endif">
                                                    Sudah
                                                </button>
                                                <button wire:click="updateStatus({{ $t->id }}, 'Proses')" 
                                                    class="px-3 py-1 rounded-md shadow-sm focus:outline-none transition duration-200
                                                    @if($t->status == 'Proses') 
                                                        bg-yellow-500 text-white 
                                                    @else 
                                                        bg-white text-yellow-600 border border-yellow-600 hover:bg-yellow-50 
                                                    @endif">
                                                    Proses
                                                </button>
                                                <button wire:click="updateStatus({{ $t->id }}, 'Belum')" 
                                                    class="px-3 py-1 rounded-md shadow-sm focus:outline-none transition duration-200
                                                    @if($t->status == 'Belum') 
                                                        bg-red-500 text-white 
                                                    @else 
                                                        bg-white text-red-600 border border-red-600 hover:bg-red-50 
                                                    @endif">
                                                    Belum
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            Tidak ada task yang tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>