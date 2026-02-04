<div class="notification-item position-relative  mb-3 row justify-content-center">

    @can('show_skudo_insurance')
    <div class="col-md-3 col-3 notification-box">
        <a href="{{ route('skudo.insurance.index') }}" class="notification-link">
            <img src="{{ asset('assets/admin/img/Notifications/insurance.svg') }}" alt="skudo_insurance">
            <p>{{ __('commonmodule::sidebar.insurance_skudo') }}</p>
            <span id="skudo_insurance-counter"
                  class="badge badge-success">{{ $skudoInsuranceCount ?? '' }}</span>
        </a>
    </div>
    @endcan

    @can('show_skudo_warranty')
    <div class="col-md-3 col-3 notification-box">
        <a href="{{ route('skudo.warranty.index') }}" class="notification-link">
            <img src="{{ asset('assets/admin/img/Notifications/warranty_card.svg') }}" alt="skudo_warranty">
            <p>{{ __('commonmodule::sidebar.warranty_skudo') }}</p>
            <span id="skudo_warranty-counter"
                  class="badge badge-success">{{ $skudoWarrantyCount ?? '' }}</span>
        </a>
    </div>
    @endcan

    
    <div class="col-md-3 col-3 notification-box">
        <a href="{{ route('insurance.index') }}" class="notification-link">
            {{--            <i class="flaticon-lock-2"></i>--}}
            <img src="{{ asset('assets/admin/img/Notifications/insurance.svg') }}" alt="insurance">
            <p>{{ __('commonmodule::sidebar.insurance') }}</p>
            <span id="insurance-counter"
                  class="badge badge-success">{{ $insuranceCount ?? '' }}</span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="{{ route('warranty.index', ['type' => 'sms']) }}" class="notification-link">
            {{--            <i class="flaticon-phone--fill"></i>--}}
            <img src="{{ asset('assets/admin/img/Notifications/warranty_sms.svg') }}" alt="warranty_sms">
            <p>{{ __('commonmodule::sidebar.sms_warranty') }}</p>
            <span id="sms_warranty-counter"
                  class="badge badge-success">{{ $smsWarrantyCount ?? '' }}</span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="{{ url('admin/orders/current') }}" class="notification-link">
            {{--            <i class="flaticon-cart-bag"></i>--}}
            <img src="{{ asset('assets/admin/img/Notifications/user_order.svg') }}" alt="user_order">
            <p>{{ __('commonmodule::sidebar.users_orders') }}</p>
            <span id="users_order-counter"
                  class="badge badge-success">{{ $userOrdersCount ?? '' }}</span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="{{ url('admin/orders/merchants/current') }}" class="notification-link">
            {{--            <i class="flaticon-cart-bag-2"></i>--}}
            <img src="{{ asset('assets/admin/img/Notifications/merchant_order.svg') }}" alt="merchant_order">
            <p>{{ __('commonmodule::sidebar.merchants_orders') }}</p>
            <span id="merchants_order-counter"
                  class="badge badge-success">{{ $merchantOrdersCount ?? '' }}</span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="{{ route('returns.index') }}" class="notification-link">
            {{--            <i class="flaticon-refresh-1"></i>--}}
            <img src="{{ asset('assets/admin/img/Notifications/return.svg') }}" alt="return">
            <p>{{ __('commonmodule::sidebar.returns') }}</p>
            <span id="return-counter"
                  class="badge badge-success">{{ $returnsCount ?? '' }}</span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="{{ url('admin/reviews') }}" class="notification-link">
            {{--            <i class="flaticon-star-empty"></i>--}}
            <img src="{{ asset('assets/admin/img/Notifications/review.svg') }}" alt="review">
            <p>{{ __('commonmodule::sidebar.reviews') }}</p>
            <span id="review-counter"
                  class="badge badge-success">{{ $reviewsCount ?? '' }}</span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="{{ url('admin/suggestions_complaint') }}" class="notification-link">
            {{--            <i class="flaticon-question"></i>--}}
            <img src="{{ asset('assets/admin/img/Notifications/suggest.svg') }}" alt="suggest">
            <p>{{ __('commonmodule::sidebar.suggestions_complaint') }}</p>
            <span id="suggestion-counter"
                  class="badge badge-success">{{ $suggestionsCount ?? '' }}</span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="{{ url('admin/abandoned-cart') }}" class="notification-link">
            {{--            <i class="flaticon-cart-2"></i>--}}
            <img src="{{ asset('assets/admin/img/Notifications/cart.svg') }}" alt="cart">
            <p>{{ __('ordermodule::admin.abandoned_carts') }}</p>
            <span id="cart-counter"
                  class="badge badge-success">{{ $cartsCount ?? '' }}</span>
        </a>
    </div>

    <div class="col-md-3 col-3 notification-box">
        <a href="{{ url('admin/contactus') }}" class="notification-link">
            {{--            <i class="flaticon-cart-2"></i>--}}
            <img src="{{ asset('assets/admin/img/Notifications/contact.svg') }}" alt="contact">
            <p>{{ __('usermodule::admin.contactus') }}</p>
            <span id="contact-counter"
                  class="badge badge-success">{{ $contactsCount ?? '' }}</span>
        </a>
    </div>

</div>

@section('notification_js')
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

            $.get('{{ route('admin.notification.list') }}', (response) => {
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
@endsection
