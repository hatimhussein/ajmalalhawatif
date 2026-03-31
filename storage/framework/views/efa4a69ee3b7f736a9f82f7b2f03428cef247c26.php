<!-- Item -->
<?php ($discount=$product->discounts->sortByDesc('id')->where('discount_quantity',1)->where('start_date',"<=",date('Y-m-d'))->where('end_date',">=",date('Y-m-d'))->sortByDesc('id')->first()); ?>
<div class="item">
    <div class="col-item">
        <?php if($discount): ?>
            <div class="sale-label sale-top-right">Sale</div>
        <?php endif; ?>
        <?php echo $__env->make('fronthomemodule::content.Wishlist_heart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="product-image-area"><a class="product-image"
                                           title="Sample Product" href="<?php echo e(url('product-details/'.$product->id)); ?>">
                <img alt="a" class="img-responsive one"
                     src="<?php echo e(asset('images/product/'.$product['product_photo'])); ?>">
                <?php if($product->images->count() > 0): ?>
                    <img alt="a" class="img-responsive two"
                         src="<?php echo e(asset('images/product/'.$product['images']->first()->image)); ?>">
                <?php else: ?>
                    <img alt="a" class="img-responsive two"
                         src="<?php echo e(asset('images/product/'.$product['product_photo'])); ?>">
                <?php endif; ?>
            </a>
        </div>
        <div class="info">
            <div class="info-inner">
                <div class="item-title">
                    <a title=" Sample Product" href="<?php echo e(url('product-details/'.$product->id)); ?>">
                        <?php echo LanguageHelper::productName($product); ?>

                    </a>
                </div>
                <!--item-title-->
                <div class="item-content">
                    <div class="ratings">
                        <div class="rating-box">
                            <?php if($product->reviews->where('is_shown',1)->count() > 0): ?>
                                <div
                                    style="width:<?php echo e($product->reviews->where('is_shown',1)->sum('stars') / $product->reviews->where('is_shown',1)->count()); ?>%"
                                    class="rating"></div>
                            <?php else: ?>
                                <div style="width:0%" class="rating"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php echo $__env->make('fronthomemodule::content.discountBox', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!--item-content-->
            </div>
            <!--info-inner-->
            <div class="actions">

                <?php if(trim($product->type)=="simple"): ?>
                    <?php if($product->product_quantity > 0): ?>
                        <?php if($discount): ?>
                            <button data-product_id="<?php echo e($product->id); ?>" data-cart_type="from_home"
                                    data-product_photo="<?php echo e($product->product_photo); ?>"
                                    data-product_type="<?php echo e($product->type); ?>"
                                    data-product_name="<?php echo LanguageHelper::nameTranslate($product); ?>"
                                    data-product_price="<?php echo ProductHelper::calDiscountAmountWithoutCurrency($product->tax_free_price,$discount); ?>"
                                    class="button btn-cart add_to_cart"
                                    title="Add to Cart" type="button"><span><i class="icon-basket"></i> <?php echo e(__('productmodule::product.add_to_cart')); ?></span>
                            </button>
                        <?php else: ?>
                            <button data-product_id="<?php echo e($product->id); ?>" data-cart_type="from_home"
                                    data-product_photo="<?php echo e($product->product_photo); ?>"
                                    data-product_type="<?php echo e($product->type); ?>"
                                    data-product_name="<?php echo LanguageHelper::nameTranslate($product); ?>"
                                    data-product_price=" <?php echo e($product->product_price); ?>"
                                    class="button btn-cart add_to_cart"
                                    title="Add to Cart" type="button"><span><i class="icon-basket"></i> <?php echo e(__('productmodule::product.add_to_cart')); ?></span>
                            </button>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(url('product-details/'.$product->id)); ?>" class="button btn-cart">
                            <span><?php echo e(__('productmodule::product.out_stock')); ?></span>
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?php echo e(url('product-details/'.$product->id)); ?>" class="button btn-cart">
                        <span><?php echo e(__('productmodule::product.cart_details')); ?></span>
                    </a>
                <?php endif; ?>
            </div>
            <!--actions-->

            <div class="clearfix"></div>
        </div>
    </div>
</div>


<!-- End Item -->
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/FrontHomeModule\Resources/views/content/product.blade.php ENDPATH**/ ?>