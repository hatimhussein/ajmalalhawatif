<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title> <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php echo $__env->make('commonmodule::front.includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <meta name="keywords" content="<?php echo LanguageHelper::nameTranslate($seo_info,'keys'); ?>">
    <meta name="description" content="<?php echo LanguageHelper::nameTranslate($seo_info,'desc'); ?>">
    <meta name="author" content="<?php echo e(($seo_info!=null)?$seo_info->author:''); ?>">
    <meta name="robots" content="index,follow">
    <meta itemprop="name" content="<?php echo LanguageHelper::nameTranslate($seo_info,'name'); ?>">
    <meta itemprop="description" content="<?php echo LanguageHelper::nameTranslate($seo_info,'desc'); ?>">
    <?php echo $__env->yieldContent('page_seo'); ?>
    <?php if(!isset($og_seos)): ?>
        <meta property="og:title" content="<?php echo LanguageHelper::seoTranslate($seo_info,'name'); ?>">
        <meta property="og:url" content="<?php echo e(($seo_info!=null)?$seo_info->url:'#'); ?>">
        <meta property="og:description" content="<?php echo LanguageHelper::seoTranslate($seo_info,'desc'); ?>">
    <?php endif; ?>
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php echo e($site_data->where('key','site_name')->first()->value_ar); ?> ">
    <link rel="canonical" href="<?php echo e(($seo_info!=null)?$seo_info->url:'#'); ?>">
    <?php ($favicon=$site_data->where('key','favicon')->first()->photo); ?>
    <link rel="icon" href="<?php echo e(asset('images/img/'.$favicon)); ?>">
    <?php echo ($seo_info!=null)?$seo_info->script_header:''; ?>

    <?php echo $site_data->where('key','seo_script')->first()->value_ar; ?>


</head>


<body>
<div class="page">
    <!-- Site header -->
    <?php echo $__env->make('commonmodule::front.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('fronthomemodule::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->yieldContent('content'); ?>


    <?php echo $__env->make('commonmodule::front.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<?php echo $__env->make('commonmodule::front.includes.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- heheboi  -->
<?php echo ($seo_info!=null)?$seo_info->script_footer:''; ?>

<?php echo $site_data->where('key','seo_script')->first()->value_en; ?>


<script>
    $(document).on("keypress", 'input[type="number"]', function(e){
        let charCode = !e.charCode ? e.which : e.charCode;

        if( !(charCode >= 48 && charCode <= 57) ){
            e.preventDefault();
        }
    });
</script>

</body>
</html>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/FrontHomeModule\Resources/views/layouts/master.blade.php ENDPATH**/ ?>