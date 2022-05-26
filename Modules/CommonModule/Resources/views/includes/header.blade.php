<!--  BEGIN NAVBAR  -->
<header class="header navbar fixed-top navbar-expand-sm">
    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><i
            class="flaticon-menu-line-2"></i></a>
    <ul class="navbar-nav flex-row">
        <li class="nav-item dropdown language-dropdown ml-1  ml-lg-0">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="flagDropdown" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                {{__('adminmodule::admin.lang')}}
            </a>
            <div class="dropdown-menu position-absolute" aria-labelledby="flagDropdown">
                <a class="dropdown-item" href="{{url('locale/ar')}}"><img src="{{asset('images/img/arabic.png')}}"
                                                                          class="flag-width" alt=""> &#xA0;عربى</a>
                <a class="dropdown-item" href="{{url('locale/en')}}"><img src="{{asset('images/img/english.png')}}"
                                                                          class="flag-width" alt=""> &#xA0;English</a>
            </div>
        </li>
    </ul>


    <ul class="navbar-nav flex-row mr-lg-auto ml-lg-0  ml-auto">
        {{--        <li class="nav-item dropdown message-dropdown ml-lg-4">--}}
        {{--            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown"--}}
        {{--               aria-haspopup="true" aria-expanded="false">--}}
        {{--                <span class="flaticon-mail-10"></span><span class="badge badge-primary">13</span>--}}
        {{--            </a>--}}
        {{--            <div class="dropdown-menu  position-absolute" aria-labelledby="messageDropdown">--}}
        {{--                <a class="dropdown-item title" href="javascript:void(0);">--}}
        {{--                    <i class="flaticon-chat-line mr-3"></i><span>You have 13 new messages</span>--}}
        {{--                </a>--}}
        {{--                <a class="dropdown-item" href="javascript:void(0);">--}}
        {{--                    <div class="media">--}}
        {{--                        <div class="usr-img online mr-3">--}}
        {{--                            <img class="usr-img rounded-circle" src="{{ asset('assets/admin/img/90x90.jpg')}}"--}}
        {{--                                 alt="Generic placeholder image">--}}
        {{--                        </div>--}}
        {{--                        <div class="media-body">--}}
        {{--                            <div class="mt-0">--}}
        {{--                                <p class="text mb-0">Browse latest projects...</p>--}}
        {{--                            </div>--}}

        {{--                            <div class="d-flex justify-content-between">--}}
        {{--                                <p class="meta-user-name mb-0">Kara Young</p>--}}
        {{--                                <p class="meta-time mb-0  align-self-center">1 min ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                    <div class="media">--}}
        {{--                        <div class="usr-img mr-3">--}}
        {{--                            <img class="usr-img rounded-circle" src="{{ asset('assets/admin/img/90x90.jpg')}}"--}}
        {{--                                 alt="Generic placeholder image">--}}
        {{--                        </div>--}}
        {{--                        <div class="media-body">--}}
        {{--                            <div class="mt-0">--}}
        {{--                                <p class="text mb-0">Design, Development and...</p>--}}
        {{--                            </div>--}}

        {{--                            <div class="d-flex justify-content-between">--}}
        {{--                                <p class="meta-user-name mb-0">Amy Diaz</p>--}}
        {{--                                <p class="meta-time mb-0  align-self-center">5 mins ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                    <div class="media">--}}
        {{--                        <div class="usr-img online mr-3">--}}
        {{--                            <img class="usr-img rounded-circle" src="{{ asset('assets/admin/img/90x90.jpg')}}"--}}
        {{--                                 alt="Generic placeholder image">--}}
        {{--                        </div>--}}
        {{--                        <div class="media-body">--}}
        {{--                            <div class="mt-0">--}}
        {{--                                <p class="text mb-0">We can ensure...</p>--}}
        {{--                            </div>--}}

        {{--                            <div class="d-flex justify-content-between">--}}
        {{--                                <p class="meta-user-name mb-0">Shaun Park</p>--}}
        {{--                                <p class="meta-time mb-0  align-self-center">1 day ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </a>--}}

        {{--                <a class="footer dropdown-item" href="javascript:void(0);">--}}
        {{--                    <div class="btn btn-info mb-3 mr-2 btn-rounded"><i class="flaticon-arrow-right mr-3"></i> View more--}}
        {{--                    </div>--}}
        {{--                </a>--}}
        {{--            </div>--}}
        {{--        </li>--}}

        {{--        <li class="nav-item dropdown notification-dropdown ml-3">--}}
        {{--            <a href="javascript:void(0);" class="nav-link dropdown-toggle load-notifications" id="notificationDropdown"--}}
        {{--               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
        {{--                <span class="flaticon-bell-4"></span>--}}
        {{--                <!-- <span class="badge badge-success">15</span> -->--}}
        {{--            </a>--}}
        {{--            <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">--}}
        {{--                <a class="dropdown-item title load-notifications" href="javascript:void(0);">--}}
        {{--                    <i class="flaticon-reload-1 mr-3"></i> <span></span>--}}
        {{--                </a>--}}

        {{--                <div class="dropdown-item text-center  p-1" href="javascript:void(0);">--}}

        {{--                    <div class="notification-list ">--}}

        {{--                        @include('commonmodule::includes.notification_items')--}}

        {{--                        <div class="notification-item position-relative  mb-3">--}}

        {{--                            <div class="c-dropdown text-right">--}}
        {{--                                <span id="c-dropdonbtn2" class="c-dropbtn mr-2"><i class="flaticon-dots"></i></span>--}}
        {{--                                <div class="c-dropdown-content">--}}
        {{--                                    <div class="c-dropdown-item">View</div>--}}
        {{--                                    <div class="c-dropdown-item">Delete</div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}

        {{--                            <h6 class="mb-1">Very long description...</h6>--}}
        {{--                            <p><span class="meta-time">5 minutes ago</span> . <span class="meta-member-notification">5 members</span>--}}
        {{--                            </p>--}}
        {{--                            <ul class="list-inline badge-collapsed-img mt-3">--}}
        {{--                                <li class="list-inline-item chat-online-usr">--}}
        {{--                                    <img alt="admin-profile" src="{{ asset('assets/admin/img/90x90.jpg')}}"--}}
        {{--                                         class="ml-0">--}}
        {{--                                </li>--}}
        {{--                                <li class="list-inline-item chat-online-usr">--}}
        {{--                                    <img alt="admin-profile" src="{{ asset('assets/admin/img/90x90.jpg')}}">--}}
        {{--                                </li>--}}
        {{--                                <li class="list-inline-item chat-online-usr">--}}
        {{--                                    <img alt="admin-profile" src="{{ asset('assets/admin/img/90x90.jpg')}}">--}}
        {{--                                </li>--}}
        {{--                                <li class="list-inline-item chat-online-usr">--}}
        {{--                                    <img alt="admin-profile" src="{{ asset('assets/admin/img/90x90.jpg')}}">--}}
        {{--                                </li>--}}
        {{--                                <li class="list-inline-item chat-online-usr">--}}
        {{--                                    <img alt="admin-profile" src="{{ asset('assets/admin/img/90x90.jpg')}}">--}}
        {{--                                </li>--}}
        {{--                            </ul>--}}

        {{--                        </div>--}}

        {{--                        <div class="notification-item position-relative  mb-3">--}}
        {{--                            <div class="c-dropdown text-right">--}}
        {{--                                <span class="c-dropbtn mr-2"><i class="flaticon-dots"></i></span>--}}
        {{--                                <div class="c-dropdown-content">--}}
        {{--                                    <div class="c-dropdown-item">View</div>--}}
        {{--                                    <div class="c-dropdown-item">Delete</div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}

        {{--                            <h6 class="mb-1">New item are in queue</h6>--}}
        {{--                            <p><span class="meta-time">25 minutes ago</span> . <span class="meta-member-notification">3 members</span>--}}
        {{--                            </p>--}}
        {{--                            <ul class="list-inline badge-collapsed-img mt-3">--}}
        {{--                                <li class="list-inline-item chat-online-usr">--}}
        {{--                                    <img alt="admin-profile" src="{{ asset('assets/admin/img/90x90.jpg')}}"--}}
        {{--                                         class="ml-0">--}}
        {{--                                </li>--}}
        {{--                                <li class="list-inline-item chat-online-usr">--}}
        {{--                                    <img alt="admin-profile" src="{{ asset('assets/admin/img/90x90.jpg')}}">--}}
        {{--                                </li>--}}
        {{--                                <li class="list-inline-item chat-online-usr">--}}
        {{--                                    <img alt="admin-profile" src="{{ asset('assets/admin/img/90x90.jpg')}}">--}}
        {{--                                </li>--}}
        {{--                            </ul>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <a class="footer dropdown-item text-center p-2">--}}
        {{--                    <span class="mr-1">View All</span>--}}
        {{--                    <div class="btn btn-gradient-warning rounded-circle"><i--}}
        {{--                            class="flaticon-arrow-right flaticon-circle-p"></i></div>--}}
        {{--                </a>--}}
        {{--            </div>--}}
        {{--        </li>--}}
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
                <a class="dropdown-item" href="{{url('admin/admin-logout')}}">
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

    @keyframes sk-bounce {
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


