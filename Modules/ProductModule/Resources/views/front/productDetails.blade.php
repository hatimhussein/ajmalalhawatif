@extends('fronthomemodule::layouts.master')

@section('title')
    {!! LanguageHelper::nameTranslate($product_info) !!}
@endsection


@section('page_seo')
    @php($og_seos = true)
    <meta property="og:title" content="{!! LanguageHelper::nameTranslate($product_info) !!}">
    <meta property="og:url" content="{{ url('product-details/'.$product_info->id) }}">
    <meta property="og:description" content="{{ strip_tags(LanguageHelper::productDescription($product_info))  }}">
    <meta property="og:image"
          content="{{asset('images/product/'. str_replace(' ', '%20', trim($product_info->product_photo)) )}}"/>

    <meta name="twitter:title" content="{!! LanguageHelper::nameTranslate($product_info) !!}">
    <meta name="twitter:description" content="{{ strip_tags(LanguageHelper::productDescription($product_info))  }}">
    <meta name="twitter:image"
          content="{{asset('images/product/'. str_replace(' ', '%20', trim($product_info->product_photo)) )}}">
    <meta name="twitter:image:alt" content="{!! LanguageHelper::nameTranslate($product_info) !!}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')

    <!-- Breadcrumbs -->
    @include('fronthomemodule::content.breadCrumbs',['pages'=>[LanguageHelper::productName($product_info)]])

    <style>

    </style>
    <!-- main-container -->
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="product-view">
                    <div class="product-essential">
                        @if($product_info->brand)
                            <div class="col-sm-12">
                                <div class="brand-div">
                                    <p>{{__('productfeaturemodule::brand.brand')}}: </p>
                                    <img src="{{asset('images/brand/'.$product_info->brand->photo)}}" alt="">
                                </div>
                            </div>
                        @endif
                        <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                        <div class="product-img-box col-sm-5 wow bounceInRight animated">
                            <div class="product-image">
                                <div class="large-image">
                                    <a href="{{asset('images/product/'.$product_info->product_photo)}}"
                                       class="cloud-zoom"
                                       id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                                        <img src="{{asset('images/product/'.$product_info->product_photo)}}">
                                    </a>
                                </div>
                                <div class="flexslider flexslider-thumb">
                                    <ul class="previews-list slides">
                                        <li>
                                            <a href="{{asset('images/product/'.$product_info->product_photo)}}"
                                               class='cloud-zoom-gallery'
                                               rel="useZoom: 'zoom1', smallImage: '{{asset("images/product/".$product_info->product_photo)}}' ">
                                                <img src="{{asset('images/product/'.$product_info->product_photo)}}"
                                                     alt="Thumbnail 1"/>
                                            </a>
                                        </li>

                                        @foreach($product_info->images as $image)
                                            <li>
                                                <a href="{{asset('images/product/'.$image->image)}}"
                                                   class='cloud-zoom-gallery'
                                                   rel="useZoom: 'zoom1', smallImage: '{{asset("images/product/".$image->image)}}' ">
                                                    <img src="{{asset('images/product/'.$image->image)}}"
                                                         alt="Thumbnail 1"/>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- end: more-images -->

                            <div class="clear"></div>
                        </div>
                        <div class="product-shop col-sm-7 wow bounceInLeft animated">
                            <div class="product-name">
                                <h1>{!! LanguageHelper::productName($product_info) !!}</h1>
                            </div>
                            <div class="ratings">
                                <p>{{__('productmodule::product.reviews')}}: </p>
                                <div class="rating-box">

                                    @if($product_info->reviews->where('is_shown',1)->count() > 0)
                                        <div
                                            style="width:{{$product_info->reviews->where('is_shown',1)->sum('stars') / $product_info->reviews->where('is_shown',1)->count()}}%"
                                            class="rating"></div>
                                    @else
                                        <div style="width:0%" class="rating"></div>
                                    @endif
                                </div>
                            </div>

                            <div class="short-description">
                                {!! LanguageHelper::getTranslated($product_info, 'short_desc') !!}
                            </div>


                        </div>

                    </div>
                    <div class="left-side-d">
                        <div class="price-block">

                            @php($discount=$product_info->discounts->sortByDesc('id')->where('discount_quantity',1)->where('start_date',
                                    "<=",date('Y-m-d'))->where('end_date',">=",date('Y-m-d'))->first())

                            <div class="price-box">
                                @if($discount)
                                    <p class="old-price"><span class="price-label">Regular Price:</span> <span
                                            class="price"> <span>{!!
                                            ProductHelper::calPriceCurrency($product_info->product_price) !!}</span>
                                        {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                                    </span></p>
                                    <p class="special-price"><span class="price-label">Special Price</span>
                                        <span class="price"> <span
                                                data-product_price="{!! ProductHelper::calDiscountAmount($product_info->tax_free_price,$discount) !!}"
                                                id="product_price">{!!
                                            ProductHelper::calDiscountAmount($product_info->tax_free_price,$discount)
                                            !!} </span> {!!
                                        LanguageHelper::nameTranslate(Session::get('currency')) !!} </span>
                                    </p>
                                @else
                                    <p class="special-price"><span class="price-label">Special Price</span>
                                        <span class="price"> <span
                                                data-product_price="{!! ProductHelper::calPriceCurrency($product_info->product_price) !!}"
                                                id="product_price">{!!
                                            ProductHelper::calPriceCurrency($product_info->product_price)
                                            !!} </span> {!!
                                        LanguageHelper::nameTranslate(Session::get('currency')) !!} </span>
                                    </p>
                                @endif

                            </div>

                        </div>
                        <div class="add-to-box">
                            <div class="add-to-cart">
                                @if($product_info->type=='combination')
                                    @if($product_info->main_option->first())

                                        <div class="selects">
                                            <label style="display: none" id="product_type"
                                                   data-product_type="combination"></label>
                                            @php($options=$product_info->option_values->where('option_id',$product_info->main_option->first()->id))
                                            @php($option_array=$product_info->main_option->toArray())
                                            <div style="display: inline-block;">
                                                <label>{{LanguageHelper::nameTranslate($option_array[0],'arr')}}</label>
                                                <select class="options selected_option mt-3 "
                                                        data-follow_option="{{(count($option_array) > 1)?$option_array[1]['id']:null}}"
                                                        data-product_id="{{$product_info->id}}" id="main_option"
                                                        name="main_option">
                                                    <option disabled selected value="">
                                                        {{__('productmodule::product.choose')}}</option>
                                                    @foreach($options as $option)

                                                        <option value="{{$option->id}}">
                                                            {{LanguageHelper::nameTranslate($option)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @foreach($option_array as $key=>$option)
                                                @if($key==0) @continue @endif
                                                @php($next=null)
                                                @if($key+1 < count($option_array)) @php($next=$option_array[$key+1]['id']) @endif
                                                <div
                                                    style="display: inline-block;">
                                                    <label>{{LanguageHelper::nameTranslate($option,'arr')}}</label>
                                                    <select
                                                        class="options_s selected_option mt-3 {{($key+1==count($option_array))?'last':''}}"
                                                        data-follow_option="{{$next}}"
                                                        data-product_id="{{$product_info->id}}"
                                                        name="{{$option['id']}}">
                                                        <option
                                                            value="">{{__('productmodule::product.choose')}}</option>
                                                    </select>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                @else
                                    <label style="display: none" id="product_type" data-product_type="simple"></label>
                                @endif

                                <div class="">
                                    <label for="qty">{{__('productmodule::product.quantity')}}</label>
                                    <div class="custom">
                                        <button
                                            onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;"
                                            class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i>
                                        </button>
                                        <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12"
                                               id="qty"
                                               name="qty">
                                        <button
                                            onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                                            class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i>
                                        </button>
                                    </div>
                                </div>


                                <div class="add-wh-sh">
                                    @if($wish_list)
                                        @if($wish_list->contains('product_id', $product_info->id))
                                            <div class="Wishlist"><span data-product_id="{{$product_info->id}}"
                                                                        class="active wishlist_operations" href="#"><i
                                                        class="icon-heart"></i></span>
                                            </div>
                                        @else
                                            <div class="Wishlist"><span data-product_id="{{$product_info->id}}"
                                                                        class="wishlist_operations"><i
                                                        class="icon-heart"></i></span>
                                            </div>
                                        @endif
                                    @endif

                                    <div class="add-cart-div">


                                        @php($discount=$product_info->discounts->sortByDesc('id')->where('discount_quantity',1)->where('start_date',"
                                        <=",date('Y-m-d'))->where('end_date',">=",date('Y-m-d'))->sortByDesc('id')->first())


                                        @if($discount)
                                            <button data-product_id="{{$product_info->id}}"
                                                    data-product_type="{{$product_info->type}}"
                                                    data-product_photo="{{$product_info->product_photo}}"
                                                    data-product_name="{!! LanguageHelper::nameTranslate($product_info) !!}"
                                                    data-product_price="{!! ProductHelper::calDiscountAmount($product_info->tax_free_price,$discount) !!}"
                                                    class="button add_to_cart btn-cart" title="Add to Cart"
                                                    type="button"><span><i
                                                        class="glyphicon glyphicon-shopping-cart"></i>
                                            {{__('productmodule::product.add_to_cart')}}</span></button>

                                        @else
                                            <button data-product_id="{{$product_info->id}}"
                                                    data-product_type="{{$product_info->type}}"
                                                    data-product_photo="{{$product_info->product_photo}}"
                                                    data-product_name="{!! LanguageHelper::nameTranslate($product_info) !!}"
                                                    data-product_price=" {!! ProductHelper::calPriceCurrency($product_info->product_price) !!} "
                                                    class="button add_to_cart btn-cart" title="Add to Cart"
                                                    type="button"><span><i
                                                        class="glyphicon glyphicon-shopping-cart"></i>
                                            {{__('productmodule::product.add_to_cart')}}</span></button>
                                        @endif

                                    </div>
                                    {{--  --}}
                                    <div class="share-div">
                                <span data-toggle="modal" data-target="#socialShareModal">
                                    <i class="icon-share"></i>
                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="discount-r" id="all_discounts">
                                @if($all_discounts->count() > 0 && $product_info->type=='simple')
                                    @foreach($all_discounts as $discount_)
                                        <p>{{__('productmodule::product.order_qty')}} {{$discount_->discount_quantity}}
                                            {{__('productmodule::product.or_more')}}
                                            <strong>{!!
                                ProductHelper::calDiscountAmount($product_info->product_price,$discount_)
                                !!} {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                                                {{__('productmodule::product.fot_unit')}}</strong>
                                        </p>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                        {{--  --}}
                    </div>
                </div>


                <script async src="https://static.addtoany.com/menu/page.js"></script>

                <div class="product-collateral">
                    <div class="col-sm-12 wow bounceInUp animated">
                        <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                            <li class="active"><a href="#product_tabs_description"
                                                  data-toggle="tab">{{__('productmodule::product.details')}}</a>
                            </li>
                            <li><a href="#product_tabs_tags"
                                   data-toggle="tab">{{__('productmodule::product.specifications')}}</a></li>
                            <li><a href="#reviews_tabs" data-toggle="tab">{{__('productmodule::product.reviews')}}</a>
                            </li>
                            @if ($product_info->video || $product_info->yt_video)
                                <li>
                                    <a href="#video_tabs" data-toggle="tab">{{__('productmodule::admin.video')}}</a>
                                </li>
                            @endif
                        </ul>
                        <div id="productTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="product_tabs_description">
                                <div class="std">
                                    {!! LanguageHelper::productDescription($product_info) !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product_tabs_tags">
                                <div class="box-collateral box-tags">
                                    <div class="box-collateral box-additional">
                                        <!-- <h3>General</h3> -->
                                        <table class="data-table">
                                            <colgroup>
                                                <col width="25%">
                                                <col>
                                            </colgroup>
                                            <tbody>
                                            <tr class="first odd">
                                                <th class="label2">{{__('productmodule::product.product_code')}}</th>
                                                <td class="data last">{{$product_info->product_code}}</td>
                                            </tr>
                                            <tr class="even">
                                                <th class="label2">{{__('productmodule::product.category')}}</th>
                                                <td class="data last">{!!
                                                    LanguageHelper::nameTranslate($product_info->category) !!} </td>
                                            </tr>

                                            @if($product_info->brand_id != null)
                                                <tr class="last odd">
                                                    <th class="label2">{{__('productmodule::product.brand_name')}}</th>
                                                    <td class="data last">{!!
                                                    LanguageHelper::nameTranslate($product_info->brand) !!} </td>
                                                </tr>
                                            @endif

                                            </tbody>
                                        </table>
                                        <!-- <h3>Navigation</h3> -->
                                        <table class="data-table" id="product-attribute-specs-table-2">
                                            <colgroup>
                                                <col width="25%">
                                                <col>
                                            </colgroup>
                                            <tbody>
                                            @foreach($product_info->attributes as $attr)
                                                <tr class="first odd">
                                                    <th class="label2">{!! LanguageHelper::nameTranslate($attr) !!}</th>
                                                    <td class="data last">{{$attr->pivot->attribute_value}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <!--tags-->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews_tabs">
                                <div class="box-collateral box-reviews" id="customer-reviews">
                                    <div class="box-reviews1">

                                        <div class="form-add">
                                            <form id="review-form">
                                                <h3>{{__('productmodule::product.reviews_title')}}</h3>
                                                <fieldset>
                                                <!-- <h4>{{__('productmodule::product.reviews_question')}} <em class="required">*</em></h4> -->
                                                    <span id="input-message-box"></span>
                                                    <input type="hidden" value="{{$product_info->id}}"
                                                           class="validate-rating" name="product_id">

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <table id="product-review-table" class="data-table">
                                                                <colgroup>
                                                                    <col>
                                                                    <col width="1">
                                                                    <col width="1">
                                                                    <col width="1">
                                                                    <col width="1">
                                                                    <col width="1">
                                                                </colgroup>
                                                                <thead>
                                                                <tr class="first last">
                                                                    <th>&nbsp;</th>
                                                                    <th><span class="nobr">1 *</span></th>
                                                                    <th><span class="nobr">2 *</span></th>
                                                                    <th><span class="nobr">3 *</span></th>
                                                                    <th><span class="nobr">4 *</span></th>
                                                                    <th><span class="nobr">5 *</span></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr class="last even">
                                                                    <th>{{__('productmodule::product.reviews_review')}}
                                                                    </th>
                                                                    <td class="value"><input type="radio" class="radio"
                                                                                             value="20" id="Quality_1"
                                                                                             name="stars"></td>
                                                                    <td class="value"><input type="radio" class="radio"
                                                                                             value="40" id="Quality_2"
                                                                                             name="stars"></td>
                                                                    <td class="value"><input type="radio" class="radio"
                                                                                             value="60" id="Quality_3"
                                                                                             name="stars"></td>
                                                                    <td class="value"><input type="radio" class="radio"
                                                                                             value="80" id="Quality_4"
                                                                                             name="stars"></td>
                                                                    <td class="value last"><input type="radio"
                                                                                                  class="radio"
                                                                                                  value="100"
                                                                                                  id="Quality_5"
                                                                                                  name="stars"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="review1" style="    width: 100%;">
                                                                <ul class="form-list">
                                                                    @guest()
                                                                        <li>
                                                                            <label class="required"
                                                                                   for="nickname_field">{{__('productmodule::product.reviews_name')}}
                                                                                <em>*</em></label>
                                                                            <div class="input-box">
                                                                                <input type="text"
                                                                                       class="input-text required-entry"
                                                                                       id="nickname_field" name="name"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </li>
                                                                    @endguest
                                                                    <li>
                                                                        <label class="required label-wide d-inline"
                                                                               for="review_field">{{__('productmodule::product.reviews_review')}}
                                                                            <em>*</em></label>
                                                                        <div class="input-box">
                                                                        <textarea class="required-entry" rows="3"
                                                                                  id="review_field" name="review"
                                                                                  autocomplete="off"></textarea>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="review2">
                                                                <div class="buttons-set">
                                                                    <button class="button submit send"
                                                                            title="Submit Review"
                                                                            type="submit"><span>
																		{{__('productmodule::product.reviews_btn')}}</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </fieldset>
                                            </form>
                                        </div>

                                    </div>
                                    <div class="box-reviews2">
                                        <h3>{{__('productmodule::product.customer_reviews')}}</h3>
                                        <div class="box visible">
                                            <ul>
                                                @foreach($product_info->reviews->where('is_shown',1)->sortByDesc('id')
                                                as $review)

                                                    <li>
                                                        <table class="ratings-table">
                                                            <colgroup>
                                                                <col width="1">
                                                                <col>
                                                            </colgroup>
                                                            <tbody>
                                                            <tr>
                                                                <th>{{__('productmodule::product.reviews_review')}}</th>
                                                                <td>
                                                                    <div class="rating-box">
                                                                        <div class="rating"
                                                                             style="width:{{$review->stars}}%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                        <div class="review">
                                                            <h6><span>{{$review->name}}
                                                        </span></h6>
                                                            <h5><span>{{$review->created_at}}</span></h5>
                                                            <div class="review-txt">{{$review->review}}</div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            @if ($product_info->video || $product_info->yt_video)
                                <div class="tab-pane fade" id="video_tabs">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="video-holder">
                                                <div class="row d-flex justify-center">
                                                    @if($product_info->video)
                                                        <div class="col-md-6 col-xs-12">
                                                            <video controls>
                                                                <source
                                                                    src="{{ asset('images/product/'.$product_info->video) }}"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                    @endif
                                                    @if($product_info->yt_video)
                                                        <div class="col-md-6 col-xs-12">
                                                            <iframe
                                                                src="https://www.youtube.com/embed/{{ $product_info->yt_video }}"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen></iframe>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($product_info->relatedProducts)
                        <div class="col-sm-12">
                            <br> <br>
                            <div class="box-additional">
                                <div class="related-pro wow bounceInUp animated">
                                    <div class="slider-items-products">
                                        <div class="new_title center">
                                            <h2><a href="#">{{__('productmodule::product.selected_products')}}</a></h2>
                                        </div>
                                        <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                                            <div class="slider-items slider-width-col4">
                                                @foreach($product_info->relatedProducts->take(10) as $product)
                                                    @include('fronthomemodule::content.product')
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--End main-container -->


    <!-- Social Share Modal -->

    <div class="modal" id="socialShareModal" tabindex="-1" role="dialog" aria-labelledby="socialShareModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="a2a_kit a2a_kit_size_64 a2a_default_style">

                        @php($classes=[' social-share',' ',' social-share',' social-share','a2a_button_email social-share','a2a_button_sms social-share','a2a_button_copy_link social-share'])

                        @foreach($socialShare as $key)
                            <a class="{{$key->properties['class']}} social-share">
                                <img src="{{asset('images/img/'.$key->photo)}}" alt="">
                                <p>{{\Modules\CommonModule\Helper\LanguageHelper::configValue($key)}}</p>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Social Share Modal -->
@stop


@section('js')

    @include('productmodule::front.content.add_to_cart')

    <script type="text/javascript">
        $("#review-form").submit(function (event) {
            event.preventDefault();
            var form = document.getElementById('review-form');
            token = '{{csrf_token()}}';
            var formdata = new FormData(document.querySelector('#review-form'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '{{ url("save-review")}}',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {

                        if (response.code == 201)
                            toastr["error"](response.message);
                        else {
                            toastr["success"](response.message)
                            $('input[type="text"]').val('');
                            $('textarea').val('');
                            $('input[type="radio"]').attr('checked', false);
                        }

                    },
                    422: function (response) {
                        let errors = reverseObj(response.responseJSON.errors);
                        $.map(errors, function (error) {
                            toastr["error"](error)
                        });

                    }
                },
            });

        });

    </script>

    <script>
        var timeOutHolder = setInterval("productImageAutoplay()", 3000);
        var next_index = 1;

        $(".product-img-box .product-image").mouseout(function () {
            timeOutHolder = setInterval("productImageAutoplay()", 3000)
        });

        $(".product-img-box .product-image").mouseover(function () {
            clearInterval(timeOutHolder);
        });

        function productImageAutoplay() {
            let items = $(".cloud-zoom-gallery");
            next_index = next_index >= items.length ? 0 : next_index;
            let image_src = $(items[next_index]).find('img').attr('src');
            $(".cloud-zoom").data("zoom").destroy();
            $(".product-image .large-image a.cloud-zoom").attr('href', image_src);
            $(".product-image .large-image a.cloud-zoom img").attr('src', image_src);
            $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
            next_index++;
        }

    </script>
@endsection


