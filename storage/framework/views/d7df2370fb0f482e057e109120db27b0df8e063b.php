<div class="notification-item position-relative  mb-3 row justify-content-center">
    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(route('merchants.index')); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/merchant.svg')); ?>" alt="merchant">
            <p><?php echo e(__('commonmodule::sidebar.merchants')); ?></p>
            <span id="merchant-counter"
                  class="badge badge-success"><?php echo e($merchantCount ?? ''); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(route('insurance.index')); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/insurance.svg')); ?>" alt="insurance">
            <p><?php echo e(__('commonmodule::sidebar.insurance')); ?></p>
            <span id="insurance-counter"
                  class="badge badge-success"><?php echo e($insuranceCount ?? ''); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(route('warranty.index')); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/warranty_card.svg')); ?>" alt="warranty_card">
            <p><?php echo e(__('commonmodule::sidebar.card_warranty')); ?></p>
            <span id="card_warranty-counter"
                  class="badge badge-success"><?php echo e($cardWarrantyCount ?? ''); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(route('warranty.index', ['type' => 'sms'])); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/warranty_sms.svg')); ?>" alt="warranty_sms">
            <p><?php echo e(__('commonmodule::sidebar.sms_warranty')); ?></p>
            <span id="sms_warranty-counter"
                  class="badge badge-success"><?php echo e($smsWarrantyCount ?? ''); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(url('admin/orders/current')); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/user_order.svg')); ?>" alt="user_order">
            <p><?php echo e(__('commonmodule::sidebar.users_orders')); ?></p>
            <span id="users_order-counter"
                  class="badge badge-success"><?php echo e($userOrdersCount ?? ''); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(url('admin/orders/merchants/current')); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/merchant_order.svg')); ?>" alt="merchant_order">
            <p><?php echo e(__('commonmodule::sidebar.merchants_orders')); ?></p>
            <span id="merchants_order-counter"
                  class="badge badge-success"><?php echo e($merchantOrdersCount ?? ''); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(route('returns.index')); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/return.svg')); ?>" alt="return">
            <p><?php echo e(__('commonmodule::sidebar.returns')); ?></p>
            <span id="return-counter"
                  class="badge badge-success"><?php echo e($returnsCount ?? ''); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(url('admin/reviews')); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/review.svg')); ?>" alt="review">
            <p><?php echo e(__('commonmodule::sidebar.reviews')); ?></p>
            <span id="review-counter"
                  class="badge badge-success"><?php echo e($reviewsCount ?? ''); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(url('admin/suggestions_complaint')); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/suggest.svg')); ?>" alt="suggest">
            <p><?php echo e(__('commonmodule::sidebar.suggestions_complaint')); ?></p>
            <span id="suggestion-counter"
                  class="badge badge-success"><?php echo e($suggestionsCount ?? ''); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(url('admin/abandoned-cart')); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/cart.svg')); ?>" alt="cart">
            <p><?php echo e(__('ordermodule::admin.abandoned_carts')); ?></p>
            <span id="cart-counter"
                  class="badge badge-success"><?php echo e($cartsCount ?? ''); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="<?php echo e(url('admin/contactus')); ?>" class="notification-link">
            
            <img src="<?php echo e(asset('assets/admin/img/Notifications/contact.svg')); ?>" alt="contact">
            <p><?php echo e(__('usermodule::admin.contactus')); ?></p>
            <span id="contact-counter"
                  class="badge badge-success"><?php echo e($contactsCount ?? ''); ?></span>
        </a>
    </div>

</div>

<?php $__env->startSection('notification_js'); ?>
    <script>
        let isLoading = false;

        $('.load-notifications').click(function (e) {
            e.preventDefault();
            if (isLoading || !$(this).hasClass('load-notifications')) {
                return true;
            }

            isLoading = true;
            $('#notificationDropdown').removeClass('load-notifications');
            $('.notification-list').addClass('is_loading');

            $.get('<?php echo e(route('admin.notification.list')); ?>', (response) => {
                $.map(response.notifications, (count, key) => {
                    let text = count > 0 ? count : '';
                    $(`#${key}-counter`).text(text);
                })

                $('.notification-list').removeClass('is_loading');
                isLoading = false;
            })
        })

        $(() => {
            $('.load-notifications').trigger('click');
        })
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/includes/notification_items.blade.php ENDPATH**/ ?>