<?php $__env->startSection('cssPond'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/plugins/filePond/filepond.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/plugins/filePond/filepond-plugin-image-preview.min.css')); ?>">
<?php $__env->stopSection(); ?>


<!-- include FilePond library -->
<script src="<?php echo e(asset("assets/front/plugins/filePond/filepond.min.js")); ?>"></script>

<!-- include FilePond plugins -->
<script src="<?php echo e(asset("assets/front/plugins/filePond/filepond-plugin-image-preview.min.js")); ?>"></script>

<!-- include FilePond jQuery adapter -->
<script src="<?php echo e(asset("assets/front/plugins/filePond/filepond.jquery.js")); ?>"></script>


<script>
    $(function () {

        // First register any plugins
        $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

        // Turn input element into a pond
        $('.simple-pond').filepond();

        // Set allowMultiple property to true
        $('.multi-pond').filepond('allowMultiple', true);

        // Manually add a file using the addFile method
        // $('.loaded-pond').first().filepond('addFile', 'index.html').then(function (file) {
        //     console.log('file added', file);
        // });

    });
</script>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/includes/filePond.blade.php ENDPATH**/ ?>