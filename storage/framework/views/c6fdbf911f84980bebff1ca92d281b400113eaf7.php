<?php $__env->startSection('title'); ?>
    <?php echo LanguageHelper::configTranslate($config); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('fronthomemodule::content.breadCrumbs',['pages'=>[LanguageHelper::configTranslate($config)]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- main-container -->
  <div class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
          <aside class="col-right sidebar col-sm-3 wow bounceInUp">
              <div class="block block-account">
                <div class="block-title">Company</div>
                <div class="block-content">
                  <ul>

                          <?php $__currentLoopData = $polices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a onclick="getConfig(<?php echo e($policy->id); ?>)">
                            <!-- <?php echo e((session('locale')!='en')?$policy->display_name_ar:$policy->display_name_en); ?> -->
                            <?php echo LanguageHelper::configTranslate($policy); ?>

                            </a></li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </ul>
                </div>
              </div>
            </aside>
            <?php echo $__env->make('configmodule::front.configRender', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </div>
  <!--End main-container -->

<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
<script type="text/javascript">

  function getConfig(id)
  {
    $.ajax(
    {
        url: id,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $("#about").empty().html(data);

    }).fail(function(jqXHR, ajaxOptions, thrownError){
          alert('No response from server');
    });

  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fronthomemodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/ConfigModule\Resources/views/front/about.blade.php ENDPATH**/ ?>