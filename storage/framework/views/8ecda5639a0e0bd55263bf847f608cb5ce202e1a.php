<!--  BEGIN NAVBAR  -->
<header class="header navbar fixed-top navbar-expand-sm">
    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><i
            class="flaticon-menu-line-2"></i></a>
    <ul class="navbar-nav flex-row">
        <li class="nav-item dropdown language-dropdown ml-1  ml-lg-0">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="flagDropdown" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <?php echo e(__('adminmodule::admin.lang')); ?>

            </a>
            <div class="dropdown-menu position-absolute" aria-labelledby="flagDropdown">
                <a class="dropdown-item" href="<?php echo e(url('locale/ar')); ?>"><img src="<?php echo e(asset('images/img/arabic.png')); ?>"
                                                                          class="flag-width" alt=""> &#xA0;عربى</a>
                <a class="dropdown-item" href="<?php echo e(url('locale/en')); ?>"><img src="<?php echo e(asset('images/img/english.png')); ?>"
                                                                          class="flag-width" alt=""> &#xA0;English</a>
            </div>
        </li>
    </ul>


    <ul class="navbar-nav flex-row mr-lg-auto ml-lg-0  ml-auto">
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        
        
        
        

        
        
        
        
        
        
        
        
        

        
        
        
        
        
        

        
        
        
        
        
        
        
        
        

        
        
        
        
        
        
        

        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        

        

        

        

        

        
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        

        
        
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </ul>





    <ul class="navbar-nav flex-row ml-lg-auto">

        <!-- <li class="nav-item  d-lg-block d-none">
            <form class="form-inline" role="search">
                <input type="text" class="form-control search-form-control" placeholder="Search...">
            </form>
        </li> -->


        <li class="nav-item dropdown user-profile-dropdown ml-lg-0 mr-lg-2 ml-3 order-lg-0 order-1">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="flaticon-user-12"></span>
            </a>
            <div class="dropdown-menu  position-absolute" aria-labelledby="userProfileDropdown">
                <!-- <a class="dropdown-item" href="user_profile.html">
                    <i class="mr-1 flaticon-user-6"></i> <span>My Profile</span>
                </a>
                <a class="dropdown-item" href="apps_scheduler.html">
                    <i class="mr-1 flaticon-calendar-bold"></i> <span>My Schedule</span>
                </a>
                <a class="dropdown-item" href="apps_mailbox.html">
                    <i class="mr-1 flaticon-email-fill-1"></i> <span>My Inbox</span>
                </a>
                <a class="dropdown-item" href="user_lockscreen_1.html">
                    <i class="mr-1 flaticon-lock-2"></i> <span>Lock Screen</span>
                </a>
                <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="<?php echo e(url('admin/admin-logout')); ?>">
                    <i class="mr-1 flaticon-power-button"></i> <span>Log Out</span>
                </a>
            </div>
        </li>

    </ul>
</header>
<!--  END NAVBAR  -->

<div class="loader-spinner">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>

<style media="screen">

    .loader-spinner {
        position: fixed;
        left: 0;
        right: 0;
        height: 100%;
        background-color: #2c3e50ab;
        z-index: 999999;
    }

    .spinner {
        width: 60px;
        height: 60px;
        position: relative;
        margin: 0 auto;
        top: 50%;
        transform: translateY(-50px);
    }

    .double-bounce1, .double-bounce2 {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #fff;
        opacity: 0.6;
        position: absolute;
        top: 0;
        left: 0;

        -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
        animation: sk-bounce 2.0s infinite ease-in-out;
    }

    .double-bounce2 {
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
    }

    @-webkit-keyframes sk-bounce {
        0%, 100% {
            -webkit-transform: scale(0.0)
        }
        50% {
            -webkit-transform: scale(1.0)
        }
    }

    @keyframes  sk-bounce {
        0%, 100% {
            transform: scale(0.0);
            -webkit-transform: scale(0.0);
        }
        50% {
            transform: scale(1.0);
            -webkit-transform: scale(1.0);
        }
    }

    .unst {
        background: unset;
        border: unset;
    }
</style>


<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/includes/header.blade.php ENDPATH**/ ?>