@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::account.my_wishlist')}}
@endsection


@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('usermodule::account.my_wishlist')]])

    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">

                @include('usermodule::front.account.menu')

                <section class="col-main col-sm-9 wow bounceInUp">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2>{{__('usermodule::account.my_wishlist')}}</h2>
                        </div>
                        @if(count($wishlists) > 0)
                            <div class="my-wishlist">
                                <div class="table-responsive">
                                    <form method="post" id="wishlist-view-form">
                                        <fieldset>
                                            <input type="hidden" value="ROBdJO5tIbODPZHZ" name="form_key">
                                            <table id="wishlist-table" class="clean-table linearize-table data-table">
                                                <thead>
                                                <tr class="first last">
                                                    <th class="customer-wishlist-item-cart"></th>
                                                    <th class="customer-wishlist-item-cart">{{__('usermodule::account.product_name')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($wishlists as $wish)
                                                    @continue(!$wish->product)
                                                    <tr class="first odd">
                                                        <td class="wishlist-cell0 customer-wishlist-item-image"><a
                                                                href="{{url('product-details/'.$wish->product->id)}}"
                                                                class="product-image"> <img width="150" height="150"
                                                                                            src="{{asset('images/product/'.$wish->product->product_photo)}}">
                                                            </a></td>
                                                        <td class="wishlist-cell1 customer-wishlist-item-info">
                                                            <h3 class="product-name"><a
                                                                    href="{{url('product-details/'.$wish->product->id)}}">{!! LanguageHelper::nameTranslate($wish->product) !!}</a>
                                                            </h3>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            <!-- <div class="buttons-set buttons-set2">
                                                <button class="button btn-add" title="Add All to Cart"
                                                    type="button"><span>Add All to Cart</span></button>
                                                <button class="button btn-update" title="Update Wishlist" name="do"
                                                    type="submit"><span>Update Wishlist</span></button>
                                            </div> -->
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        @else
                            <h3 class="text-center">{{__('productmodule::product.no_products')}}</h3>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!--End main-container -->



@stop
