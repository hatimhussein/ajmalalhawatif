<style>

    <?php if(App::isLocale('en')): ?>

    @font-face {
        src: url('<?php echo e($colors->where('key', 'font-en')->first()->ex_value); ?>');
        font-family: <?php echo $colors->where('key', 'font-en')->first()->value; ?>;
    }

    body * {
        font-family: <?php echo $colors->where('key', 'font-en')->first()->value; ?>;
    }

    body {
        font-size: 12px;
    }

    <?php else: ?>

    @font-face {
        src: url('<?php echo e($colors->where('key', 'font-ar')->first()->ex_value); ?>');
        font-family: <?php echo $colors->where('key', 'font-ar')->first()->value; ?>;
    }

    body * {
        font-family: <?php echo $colors->where('key', 'font-ar')->first()->value; ?>;
    }

    body {
        font-size: 12px;
        direction: rtl
    }

    <?php endif; ?>

    .header-container {
        background: <?php echo e($colors->where('key','header-bg')->first()->value); ?>;
    }

    .toplinks div.links div > a {
        color: <?php echo e($colors->where('key','header-color')->first()->value); ?>;
    }

    .header-top .welcome-msg {
        color: <?php echo e($colors->where('key','header-color')->first()->value); ?>;
    }

    a.block-language {
        color: <?php echo e($colors->where('key','header-color')->first()->value); ?>;
    }

    a.block-language:hover {
        color: <?php echo e($colors->where('key','header-color')->first()->value); ?>;
    }

    a.block-language:focus {
        color: <?php echo e($colors->where('key','header-color')->first()->value); ?>;
    }

    .block-language-wrapper .dropdown-menu {
        border-bottom: 3px solid<?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .block-language-wrapper .dropdown-menu a:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .block-currency-wrapper .dropdown-menu {
        border-bottom: 3px solid<?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .block-currency-wrapper .dropdown-menu a:hover {
        color: <?php echo e($colors->where('key','header-color')->first()->value); ?>;
    }

    .toplinks div.links div a:hover {
        color: <?php echo e($colors->where('key','header-color')->first()->value); ?>;
    }

    .toplinks div.links div > ul a:hover {
        color: #999;
    }

    .search-btn-bg {
        background-color: <?php echo e($colors->where('key','btn-primary-bg')->first()->value); ?>;
        color: <?php echo e($colors->where('key','btn-primary-color')->first()->value); ?>;
    }

    .top-cart-contain .product-details .price {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .mini-cart {
        background: linear-gradient(to bottom, <?php echo e($colors->where('key','navbar-bg')->first()->value); ?> 1%, <?php echo e($colors->where('key','navbar-bg')->first()->value); ?> 3%, <?php echo e($colors->where('key','navbar-bg')->first()->value); ?> 7%, <?php echo e($colors->where('key','navbar-bg')->first()->value); ?> 100%);
        border: 1px solid<?php echo e($colors->where('key','secondary-color')->first()->value); ?>;
        box-shadow: 0px 0px 2px 1px<?php echo e($colors->where('key','secondary-color')->first()->value); ?>;
    }

    .mini-cart .cart-box .title {
        color: <?php echo e($colors->where('key','navbar-color')->first()->value); ?>;
    }

    .mini-cart .actions .btn-checkout {
        background-color: <?php echo e($colors->where('key','btn-primary-bg')->first()->value); ?>;
        border: 1px solid<?php echo e($colors->where('key','btn-primary-bg')->first()->value); ?>;
        color: <?php echo e($colors->where('key','btn-primary-color')->first()->value); ?>;
    }

    nav {
        background-color: <?php echo e($colors->where('key','navbar-bg')->first()->value); ?>;
        color: <?php echo e($colors->where('key','navbar-color')->first()->value); ?>;
    }

    #nav .level0-wrapper, #nav.classic .parent > ul {
        border-bottom: 5px <?php echo e($colors->where('key','navbar-bg')->first()->value); ?> solid;
    }

    a.btn-button-st:hover {
        background-color: <?php echo e($colors->where('key','navbar-bg')->first()->value); ?>;
        border: 1px solid<?php echo e($colors->where('key','navbar-bg')->first()->value); ?>;
    }

    #nav li.drop-menu ul {
        border-bottom: 5px <?php echo e($colors->where('key','navbar-bg')->first()->value); ?> solid;
    }

    #nav > li > a {
        color: <?php echo e($colors->where('key','navbar-color')->first()->value); ?>;
        border: none;
        border-left: 1px solid<?php echo e($colors->where('key','navbar-bg')->first()->value); ?>;
    }

    .news-line .onoffswitch3-active .onoffswitch3-switch, .news-line .onoffswitch3-inner .onoffswitch3-inactive {
        background-color: <?php echo e($colors->where('key','btn-secondary-bg')->first()->value); ?>;
        color: <?php echo e($colors->where('key','btn-secondary-color')->first()->value); ?>;
    }

    .new-label {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .col-item .actions-links .add-to-links a.magik-btn-quickview:hover {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .col-item .actions-links .add-to-links a.link-wishlist:hover {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .col-item .actions-links .add-to-links a.link-compare:hover {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .col-item .info .info-inner .item-title a:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .special-price .price {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .actions button.button.btn-cart {
        background-color: <?php echo e($colors->where('key','cart-bg')->first()->value); ?>;
        color: <?php echo e($colors->where('key','cart-color')->first()->value); ?>;
    }

    .blog-img a.info {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    #toTop:hover {
        background-color: <?php echo e($colors->where('key','secondary-color')->first()->value); ?>;
    }

    #mobile-menu ul.navmenu ul.submenu {
        border-bottom: 5px solid<?php echo e($colors->where('key','navbar-bg')->first()->value); ?>;

    }

    .block-tags .actions a.view-all:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .block-account .block-title {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .block-company .block-title {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;

    }

    .btn-edit:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .edit-bnt:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .button:hover {
        border: 1px solid<?php echo e($colors->where('key','btn-primary-bg')->first()->value); ?>;
        background-color: <?php echo e($colors->where('key','btn-primary-bg')->first()->value); ?>;
    }

    #sort-by li li a:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    #sort-by li li:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    #limiter li li a:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .toolbar span.button-grid, .toolbar span.button-list {
        background-color: <?php echo e($colors->where('key','btn-primary-color')->first()->value); ?>;
        border: 1px <?php echo e($colors->where('key','btn-primary-color')->first()->value); ?> solid;
        color: <?php echo e($colors->where('key','btn-primary-bg')->first()->value); ?>;
    }

    .toolbar span.button-active.button-grid, .toolbar span.button-active.button-list {
        background-color: <?php echo e($colors->where('key','btn-primary-bg')->first()->value); ?>;
        border: 1px <?php echo e($colors->where('key','btn-primary-bg')->first()->value); ?> solid;
        color: <?php echo e($colors->where('key','btn-primary-color')->first()->value); ?>;
    }

    .products-list .actions .add-to-links a.link-wishlist:hover {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
        border: 1px solid<?php echo e($colors->where('key','primary-color')->first()->value); ?>;

    }

    .products-list .actions .add-to-links a.link-compare:hover {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
        border: 1px solid<?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    #products-list .product-shop .btn-cart:hover {
        background-color: <?php echo e($colors->where('key','cart-hover')->first()->value); ?>;
        border: 1px solid<?php echo e($colors->where('key','cart-hover')->first()->value); ?>;
    }


    .col-item:hover .actions button.button.btn-cart {
        background-color: <?php echo e($colors->where('key','cart-hover')->first()->value); ?>;
        border: 1px solid<?php echo e($colors->where('key','cart-hover')->first()->value); ?>;
        color: <?php echo e($colors->where('key','cart-color')->first()->value); ?>;
    }

    .product-view .product-shop .add-to-box .btn-cart {
        background-color: <?php echo e($colors->where('key','cart-bg')->first()->value); ?>;
        color: <?php echo e($colors->where('key','cart-color')->first()->value); ?>;
    }

    .product-view .product-shop .add-to-box .btn-cart:hover {
        background-color: <?php echo e($colors->where('key','cart-hover')->first()->value); ?>;
        color: <?php echo e($colors->where('key','cart-color')->first()->value); ?>;
    }

    .product-view .product-shop .product-options-bottom .btn-cart {
        background-color: <?php echo e($colors->where('key','cart-bg')->first()->value); ?>;
    }

    .product-view .product-shop .add-to-links .link-wishlist:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;

    }

    .product-view .product-shop .add-to-links .link-compare:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .email-friend a:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .button.view-all:hover {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
        border: 1px solid<?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .form-add-tags button.button:hover {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
        border: 1px <?php echo e($colors->where('key','primary-color')->first()->value); ?> solid;
    }

    .data-table .price {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .availability.out-of-stock {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .custom button.items-count:hover {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
        border: 1px <?php echo e($colors->where('key','primary-color')->first()->value); ?> solid;
    }

    .product-next-prev .product-prev:hover {
        color: #fff;
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .product-next-prev .product-next:hover {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .block-progress .block-title {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .one-page-checkout .active .step-title h3 {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .one-page-checkout .active .step-title .number {
        background-color: none repeat scroll 0 0<?php echo e($colors->where('key','primary-color')->first()->value); ?>;
        border: 1px solid<?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    #shopping-cart-totals-table .price {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    #shopping-cart-table a.remove-item:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    button.button.btn-proceed-checkout {
        background-color: <?php echo e($colors->where('key','btn-primary-bg')->first()->value); ?>;
    }

    #wishlist-table a.remove-item:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    #wishlist-table button.button.remove-item:hover {
        background-color: none repeat scroll 0 0<?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    #wishlist-table button.button.btn-cart:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .checkout-progress li.active {
        border-bottom: 1px solid<?php echo e($colors->where('key','primary-color')->first()->value); ?>;
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    #multiship-addresses-table .btn-remove:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .account .last a:hover {
        background-color: <?php echo e($colors->where('key','btn-primary-bg')->first()->value); ?>;
        color: <?php echo e($colors->where('key','btn-primary-color')->first()->value); ?>;
    }

    #magik-verticalmenu .nav-title {
        background-color: linear-gradient(to bottom, <?php echo e($colors->where('key','primary-color')->first()->value); ?> 1%, #6ebad5 3%, <?php echo e($colors->where('key','primary-color')->first()->value); ?> 7%, <?php echo e($colors->where('key','primary-color')->first()->value); ?> 100%) !important;
    }

    span.round-tab:hover {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>73;
        border: 3px solid <?php echo e($colors->where('key','primary-color')->first()->value); ?>73;
    }

    table.simple-table th {
        background-color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }

    .actions a.button.btn-cart {
        background-color: <?php echo e($colors->where('key','cart-bg')->first()->value); ?>;
    }

    .card-header {
        color: <?php echo e($colors->where('key','primary-color')->first()->value); ?>;
    }


    /*---------------------------- second color------------------------------------------------ */
    /*---------------------------- color code : #fdd922 ---------------------------------*/
    .glyphicon-shopping-cart:before {
        color: <?php echo e($colors->where('key','secondary-color')->first()->value); ?>;
    }

    .mini-cart .actions .view-cart {
        background-color: <?php echo e($colors->where('key','btn-secondary-bg')->first()->value); ?>;
        color: <?php echo e($colors->where('key','btn-secondary-color')->first()->value); ?>;
    }

    .new_title {
        border-bottom: 3px solid<?php echo e($colors->where('key','secondary-color')->first()->value); ?>;
    }

    .side-nav-categories .block-title {
        background-color: <?php echo e($colors->where('key','secondary-color')->first()->value); ?>;
    }

    button.subscribe {
        background-color: <?php echo e($colors->where('key','btn-secondary-bg')->first()->value); ?>;
        color: <?php echo e($colors->where('key','btn-secondary-color')->first()->value); ?>;
    }

    .add-icon:before {
        color: <?php echo e($colors->where('key','secondary-color')->first()->value); ?>;
    }

    .email-icon:before {
        color: <?php echo e($colors->where('key','secondary-color')->first()->value); ?>;

    }

    .phone-icon:before {
        color: <?php echo e($colors->where('key','secondary-color')->first()->value); ?>;
    }

    .coppyright a {
        color: <?php echo e($colors->where('key','secondary-color')->first()->value); ?>;
    }

    .account .last a {
        background-color: <?php echo e($colors->where('key','btn-secondary-bg')->first()->value); ?>;
        color: <?php echo e($colors->where('key','btn-secondary-color')->first()->value); ?>                        !important;
    }

    .payment-accept h4 {
        color: <?php echo e($colors->where('key','footer-color')->first()->value); ?>;
    }

    .bg-ctg {
        width: 200px;
        color: <?php echo e($colors->where('key','btn-secondary-color')->first()->value); ?>                        !important;
        background-color: <?php echo e($colors->where('key','btn-secondary-bg')->first()->value); ?>                        !important;
        font-size: 18px !important;
        border-right: 1px solid <?php echo e($colors->where('key','btn-secondary-bg')->first()->value); ?>                        !important;
        font-family: 'roboto-regular' !important;
        cursor: pointer;
    }


    /* footer color 1 */
    /**** footer primary-color: #06253e *****/
    .footer-top {
        background-color: <?php echo e($colors->where('key','newsletter-bg')->first()->value); ?>;
    }

    .footer-bottom {
        background-color: <?php echo e($colors->where('key','footer-bg')->first()->value); ?>;
    }

    .footer .brand-logo {
        background-color: <?php echo e($colors->where('key','brands-bg')->first()->value); ?>;
    }

    /*footer color 2*/

    /**** footer secondary-color: #0a3151 *****/
    .footer {
        background-color: <?php echo e($colors->where('key','footer-bg')->first()->value); ?>;
    }

    .footer-middle .links li a {
        color: <?php echo e($colors->where('key','footer-color')->first()->value); ?>;
    }

    .mini-cart {
        border: 1px solid<?php echo e($colors->where('key','Icon-cart')->first()->value); ?>;
        box-shadow: 0px 0px 2px 1px<?php echo e($colors->where('key','Icon-cart')->first()->value); ?>;
    }

    .glyphicon-shopping-cart:before {
        color: <?php echo e($colors->where('key','Cart-icon')->first()->value); ?>;
    }

    .search-btn-bg {
        color: <?php echo e($colors->where('key','Search-icon')->first()->value); ?>;

    }

    .toplinks div.links div > a {
        color: <?php echo e($colors->where('key','Login_text')->first()->value); ?>;

    }

    nav {
        background-color: <?php echo e($colors->where('key','menu_color')->first()->value); ?>;
    }

    #nav > li > a {
        color: <?php echo e($colors->where('key','menu_text_color')->first()->value); ?>;
    }

    #mobile-menu ul.navmenu ul.submenu {
        background-color: <?php echo e($colors->where('key','mobile_menu_color')->first()->value); ?>;
    }

    #mobile-menu ul.navmenu ul.submenu ul.topnav li a, #mobile-menu ul.navmenu ul.submenu ul.topnav li em {
        color: <?php echo e($colors->where('key','mobile_menu_text_color')->first()->value); ?>;
    }

    .brand-logo .new_title h2 {
        color: <?php echo e($colors->where('key','brands-color')->first()->value); ?>;
    }
</style>

<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/front/includes/color.blade.php ENDPATH**/ ?>