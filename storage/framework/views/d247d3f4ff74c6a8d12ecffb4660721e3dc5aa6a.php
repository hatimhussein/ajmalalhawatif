<script src="<?php echo e(asset('assets/front/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/assets/js/autocomplete.js')); ?>"></script>


<script src="<?php echo e(asset('assets/front/assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/assets/js/parallax.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/assets/js/common.js')); ?>"></script>

<script src="<?php echo e(asset('assets/front/assets/js/swiper-bundle.min.js')); ?>"></script>


<script src="<?php echo e(asset('assets/front/assets/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/assets/js/jquery.flexslider.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/assets/js/cloud-zoom.js')); ?>"></script>

<script src="<?php echo e(asset('assets/front/plugins/toastr/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/plugins/toastr/custom-toastr.js')); ?>"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo e(asset('assets/front/assets/js/jquery.ui.touch-punch.min.js')); ?>"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


















<script type="text/javascript">
    $(() => {
        $('.owl-carousel').each(function () {
            if ($(this).find('.owl-controls.clickable:visible').length !== 0)
                $(this).parents('.slider-items-products').find('.new_title.center > a').addClass('has-arrow');
            // $(this).addClass('carousel-rtl');
            // else
        });
    });

    $(() => {
        if ($('nav').hasClass('sticky'))
            $('#nav-placeholder').show();
        else
            $('#nav-placeholder').hide();

        $('#nav-placeholder').height($('nav').height() + 'px');
    });

    $(window).on('scroll', () => {
        if ($('nav').hasClass('sticky'))
            $('#nav-placeholder').show();
        else
            $('#nav-placeholder').hide();
    });

    jQuery(document).ready(function () {
        var homeBannerSwiper = new Swiper('.swiper-container', {
            loop: true,
            spaceBetween: 0,
            centeredSlides: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 500,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
        // jQuery('#rev_slider_4').show().revolution({
        //   dottedOverlay: 'none',
        //   delay: 5000,
        //   startwidth: 585,
        //   startheight: 355,
        //   hideThumbs: 200,
        //   thumbWidth: 200,
        //   thumbHeight: 50,
        //   thumbAmount: 2,
        //   navigationType: 'thumb',
        //   navigationArrows: 'solo',
        //   navigationStyle: 'round',
        //   touchenabled: 'on',
        //   onHoverStop: 'on',
        //   swipe_velocity: 0.7,
        //   swipe_min_touches: 1,
        //   swipe_max_touches: 1,
        //   drag_block_vertical: false,
        //   spinner: 'spinner0',
        //   keyboardNavigation: 'off',
        //   navigationHAlign: 'center',
        //   navigationVAlign: 'bottom',
        //   navigationHOffset: 0,
        //   navigationVOffset: 20,
        //   soloArrowLeftHalign: 'left',
        //   soloArrowLeftValign: 'center',
        //   soloArrowLeftHOffset: 20,
        //   soloArrowLeftVOffset: 0,
        //   soloArrowRightHalign: 'right',
        //   soloArrowRightValign: 'center',
        //   soloArrowRightHOffset: 20,
        //   soloArrowRightVOffset: 0,
        //   shadow: 0,
        //   fullWidth: 'on',
        //   fullScreen: 'off',
        //   stopLoop: 'off',
        //   stopAfterLoops: -1,
        //   stopAtSlide: -1,
        //   shuffle: 'off',
        //   autoHeight: 'off',
        //   forceFullWidth: 'on',
        //   fullScreenAlignForce: 'off',
        //   minFullScreenHeight: 0,
        //   hideNavDelayOnMobile: 1500,
        //   hideThumbsOnMobile: 'off',
        //   hideBulletsOnMobile: 'off',
        //   hideArrowsOnMobile: 'off',
        //   hideThumbsUnderResolution: 0,
        //   hideSliderAtLimit: 0,
        //   hideCaptionAtLimit: 0,
        //   hideAllCaptionAtLilmit: 0,
        //   startWithSlide: 0,
        //   fullScreenOffsetContainer: ''
        // });
    });
</script>

<script>
    $("li.lay").hover(function () {
        $(".overlay").addClass('over');
    }, function () {
        $(".overlay").removeClass("over");
    });
</script>

<script>
    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>

<script>
    $('#headingOne').click(function () {
        $(this).toggleClass("selected");
        $('#headingTwo,#headingThree').removeClass('selected');
    });

    $('#headingTwo').click(function () {
        $(this).toggleClass("selected");
        $('#headingOne,#headingThree').removeClass('selected');
    });

    $('#headingThree').click(function () {
        $(this).toggleClass("selected");
        $('#headingOne,#headingTwo').removeClass('selected');
    });
</script>

<script type="text/javascript">
    $('.collapse').on('show.bs.collapse', function () {
        $('.collapse.in').each(function () {
            $(this).collapse('hide');
        });
    });
</script>

<script>
    $(".m-collapseable").click(function () {
        $(this).children(".arrow").toggleClass("arrow-down");
    });
</script>
<script>
    $('.forgot-pass').click(function () {
        $('.login-sec form > div').hide();
        $('.login-div').css('display', 'none');
        $('.forgotten-div').css('display', 'block');
        $('.merchantRegister-div').css('display', 'none')
        $('.merchant-login-div').css('display', 'none')
    })

    $('.phoneReset').click(function () {
        $('.login-sec form > div').hide();
        $('.login-div').css('display', 'none');
        $('.phone-forgotten').css('display', 'block');
        $('.forgotten-div').css('display', 'none');
        $('.merchantRegister-div').css('display', 'none')
        $('.merchant-login-div').css('display', 'none')
    })

    $('.register').click(function () {
        $('.login-sec form > div').hide();
        $('.login-div').css('display', 'none');
        $('.merchant-login-div').css('display', 'none');
        $('.register-div').css('display', 'block');
        $('.merchantRegister-div').css('display', 'none');
        $('.login-head').css('display', 'none');
        $('.merchant-login-head').css('display', 'none');
        $('.register-head').css('display', 'block');
    })
    $('.merchantRegister').click(function () {
        $('.login-sec form > div').hide();
        $('.login-div').css('display', 'none');
        $('.register-div').css('display', 'none');
        $('.merchantRegister-div').css('display', 'block');
        $('.merchant-login-div').css('display', 'none');
        $('.login-head').css('display', 'none');
        $('.register-head').css('display', 'block');
        $('.merchant-login-head').css('display', 'none');
    })

    $('.merchant_login').click(function () {
        $('.login-sec form > div').hide();
        $('.login-div').css('display', 'none');
        $('.register-div').css('display', 'none');
        $('.merchantRegister-div').css('display', 'none');
        $('.merchant-login-div').css('display', 'block');
        $('.login-head').css('display', 'none');
        $('.register-head').css('display', 'none');
        $('.merchant-login-head').css('display', 'block');
    });
    $('.back-login').click(function () {
        $('.login-sec form > div').hide();
        $('#loginForm > div').show();
        $('.login-head').show();
        $('.register-head').hide();
        $('.merchant-login-head').hide();
    });

    $('.phoneLogin').click(function () {
        $('.login-sec form > div').hide();
        $('#phoneLoginForm > div').show();
    });
</script>
<script>
    $('.button-list').click(function () {
        $('.grid-list').addClass('products-list');
        $('.button-grid').removeClass('button-active');
        $('.button-list').addClass('button-active');
    })

    $('.button-grid').click(function () {
        $('.grid-list').removeClass('products-list');
        $('.button-list').removeClass('button-active');
        $('.button-grid').addClass('button-active');
    })

</script>


<script>

    $(document).ready(function () {
        var fakedata = ['test1', 'test2', 'test3', 'test4', 'ietsanders'];

        $("#searchh").blur(function () {
            var keyEvent = $.Event("keydown");
            keyEvent.keyCode = $.ui.keyCode.ENTER;
            $(this).trigger(keyEvent);
        }).autocomplete({
            autoFocus: true,
            source: fakedata,
        });

        $("#searchj").autocomplete({source: fakedata});


    });


    // Get the input field
    var input = document.getElementById("search");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function (event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.querySelector("#search_mini_form #submit-button").click();
        }
    });
</script>


<?php echo $__env->make('commonmodule::front.includes.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('js'); ?>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/front/includes/js.blade.php ENDPATH**/ ?>