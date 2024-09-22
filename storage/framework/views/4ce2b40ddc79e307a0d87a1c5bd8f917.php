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
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-red-500 text-sm mt-2"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div>
                                <!--[if BLOCK]><![endif]--><?php if($kegiatan_id): ?>
                                    <button wire:click="editKegiatan" 
                                        class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 text-white rounded-md shadow-md transition duration-200">
                                        Edit Task
                                    </button>
                                <?php else: ?>
                                    <button wire:click="tambahKegiatan" 
                                        class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 text-white rounded-md shadow-md transition duration-200">
                                        Tambah Task
                                    </button>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
                                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700"><?php echo e($loop->iteration); ?></td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700"><?php echo e($t->kegiatan); ?></td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                <?php if($t->status == 'Sudah'): ?> bg-green-100 text-green-800 
                                                <?php elseif($t->status == 'Proses'): ?> bg-yellow-100 text-yellow-800 
                                                <?php else: ?> bg-red-100 text-red-800 <?php endif; ?>">
                                                <?php echo e($t->status); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex space-x-2">
                                                <!-- Edit Button -->
                                                <button wire:click="editTask(<?php echo e($t->id); ?>)" 
                                                    class="px-3 py-1 bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-300 text-white rounded-md shadow-sm transition duration-200">
                                                    Edit
                                                </button>
                                                
                                                <!-- Delete Button -->
                                                <button wire:click="hapusTask(<?php echo e($t->id); ?>)" 
                                                    class="px-3 py-1 bg-red-500 hover:bg-red-600 focus:ring-2 focus:ring-red-300 text-white rounded-md shadow-sm transition duration-200">
                                                    Delete
                                                </button>
                                                
                                                <!-- Status Buttons -->
                                                <button wire:click="updateStatus(<?php echo e($t->id); ?>, 'Sudah')" 
                                                    class="px-3 py-1 rounded-md shadow-sm focus:outline-none transition duration-200
                                                    <?php if($t->status == 'Sudah'): ?> 
                                                        bg-blue-600 text-white 
                                                    <?php else: ?> 
                                                        bg-white text-blue-600 border border-blue-600 hover:bg-blue-50 
                                                    <?php endif; ?>">
                                                    Sudah
                                                </button>
                                                <button wire:click="updateStatus(<?php echo e($t->id); ?>, 'Proses')" 
                                                    class="px-3 py-1 rounded-md shadow-sm focus:outline-none transition duration-200
                                                    <?php if($t->status == 'Proses'): ?> 
                                                        bg-yellow-500 text-white 
                                                    <?php else: ?> 
                                                        bg-white text-yellow-600 border border-yellow-600 hover:bg-yellow-50 
                                                    <?php endif; ?>">
                                                    Proses
                                                </button>
                                                <button wire:click="updateStatus(<?php echo e($t->id); ?>, 'Belum')" 
                                                    class="px-3 py-1 rounded-md shadow-sm focus:outline-none transition duration-200
                                                    <?php if($t->status == 'Belum'): ?> 
                                                        bg-red-500 text-white 
                                                    <?php else: ?> 
                                                        bg-white text-red-600 border border-red-600 hover:bg-red-50 
                                                    <?php endif; ?>">
                                                    Belum
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            Tidak ada task yang tersedia.
                                        </td>
                                    </tr>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\tasklistchelodewi2\resources\views/livewire/task-list.blade.php ENDPATH**/ ?>