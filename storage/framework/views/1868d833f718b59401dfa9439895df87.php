<?php if(session()->has('livewire-alert')): ?>
    <script type="module">
        flashAlert(<?php echo json_encode(session('livewire-alert'), 15, 512) ?>)
    </script>
<?php endif; ?><?php /**PATH C:\laragon\www\tasklistchelodewi2\vendor\jantinnerezo\livewire-alert\src/../resources/views/components/flash.blade.php ENDPATH**/ ?>