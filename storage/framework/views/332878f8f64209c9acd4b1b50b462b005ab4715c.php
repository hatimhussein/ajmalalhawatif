<?php ($discount=$product->discounts->sortByDesc('id')->where('discount_quantity',1)->where('start_date',"<=",date('Y-m-d'))->where('end_date',">=",date('Y-m-d'))->sortByDesc('id')->first()); ?>


<div class="price-box">

    <?php if($discount): ?>
        <p class="old-price">
            <span class="price">
                <?php echo ProductHelper::calPriceCurrency($product->product_price); ?>  <?php echo LanguageHelper::nameTranslate(Session::get('currency')); ?>

            </span>
        </p>
        <p class="special-price">
            <span class="price">
                <?php echo ProductHelper::calDiscountAmount($product->tax_free_price,$discount); ?>  <?php echo LanguageHelper::nameTranslate(Session::get('currency')); ?>

            </span>
        </p>
    <?php else: ?>
        <p class="special-price">
            <span class="price">
                <?php echo ProductHelper::calPriceCurrency($product->product_price); ?>  <?php echo LanguageHelper::nameTranslate(Session::get('currency')); ?>

            </span>
        </p>
    <?php endif; ?>

</div>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/FrontHomeModule\Resources/views/content/discountBox.blade.php ENDPATH**/ ?>