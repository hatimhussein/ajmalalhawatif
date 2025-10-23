<?php if($wish_list): ?>
    <?php if($wish_list->contains('product_id', $product->id)): ?>
        <div class="Wishlist sale-top-left active"><span data-product_id="<?php echo e($product->id); ?>"
                                                         class="active wishlist_operations" href="#"><i
                    class="icon-heart"></i></span></div>
    <?php else: ?>
        <div class="Wishlist sale-top-left"><span data-product_id="<?php echo e($product->id); ?>" class="wishlist_operations"><i
                    class="icon-heart"></i></span></div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/FrontHomeModule\Resources/views/content/Wishlist_heart.blade.php ENDPATH**/ ?>