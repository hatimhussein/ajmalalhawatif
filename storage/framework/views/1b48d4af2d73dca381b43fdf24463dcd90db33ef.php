
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/animate/animate.css')); ?>" type="text/css" >
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/modals/component.css')); ?>" type="text/css" >

<!-- END PAGE LEVEL PLUGINS -->

<!--  BEGIN CUSTOM STYLE FILE  -->
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/ui-kit/custom-modal.css')); ?>" type="text/css" >


<script src="<?php echo e(asset('assets/admin/js/modal/classie.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/modal/modalEffects.js')); ?>"></script>

<script type="text/javascript">

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
  $('[data-toggle="popover"]').popover()
})
$('#yt-video-link').click(function () {
    var src = 'https://www.youtube.com/embed/YE7VzlLtp-4';
    $('#videoMedia1').modal('show');
    $('<iframe>').attr({
        'src': src,
        'width': '560',
        'height': '315',
        'allow': 'encrypted-media'
    }).css('border', '0').appendTo('#videoMedia1 .video-container');
});
$('#vimeo-video-link').click(function () {
    var src = 'https://player.vimeo.com/video/1084537';
    $('#videoMedia2').modal('show');
    $('<iframe>').attr({
        'src': src,
        'width': '560',
        'height': '315',
        'allow': 'encrypted-media'
    }).css('border', '0').appendTo('#videoMedia2 .video-container');
});
$('#videoMedia1 button, #videoMedia2 button').click(function () {
    $('#videoMedia1 iframe, #videoMedia2 iframe').removeAttr('src');
});

</script>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/includes/modal.blade.php ENDPATH**/ ?>