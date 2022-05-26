<aside class="col-right sidebar col-md-3 col-sm-4 wow bounceInUp">
    <div class="block block-account">
        <div class="block-title">{{__('usermodule::account.my_account')}}</div>
        <div class="block-content">
            <ul>


                <li class="{{(request()->path()=='account-dashboard')?'current':''}}"><a
                        href="{{url('account-dashboard')}}">{{__('usermodule::account.dashboard')}}</a></li>
                <li class="{{(request()->path()=='account-information')?'current':''}}"><a
                        href="{{url('account-information')}}">{{__('usermodule::account.account_information')}}</a></li>
                <li class="{{(request()->path()=='change-password')?'current':''}}"><a
                        href="{{url('change-password')}}">{{__('usermodule::account.change_password')}}</a></li>
                <li class="{{(request()->path()=='orders')?'current':''}}"><a
                        href="{{url('orders')}}">{{__('usermodule::account.my_orders')}}</a></li>
                <li class="{{(request()->path()=='wishlist')?'current':''}}"><a
                        href="{{url('wishlist')}}">{{__('usermodule::account.my_wishlist')}}</a></li>
                <li class="{{(request()->path()=='returns')?'current':''}}"><a
                        href="{{url('returns')}}">{{__('commonmodule::front.returns')}}</a></li>
                {{--                <li class="{{(request()->path()=='warranty')?'current':''}} last"><a--}}
                {{--                        href="{{route('front.warranty.index')}}">{{__('commonmodule::front.warranty')}}</a></li>--}}
            </ul>
        </div>
    </div>
</aside>
