@extends('fronthomemodule::layouts.master')


@section('title')
    {!! LanguageHelper::nameTranslate($brands_info) !!}

@endsection



@section('content')

    <!-- Breadcrumbs -->

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[LanguageHelper::nameTranslate($brands_info)]])

    <!-- main-container -->
    <section class="main-container col2-left-layout">
        <div class="main container">
            <div class="row">
                <aside class="col-left sidebar col-sm-3 col-xs-12  wow bounceInUp animated">
                    <div class="block block-layered-nav">
                        <div class="mb-mana-catalog-leftnav">
                            <div class="block block-layered-nav">
                                <div class="title">
                                    <strong><span>  {{__('productmodule::product.shop_by')}}</span></strong>
                                </div>
                                <div class="block-content">

                                    @if($brandcategories->count() > 0)
                                        <dl class="narrow-by-list">
                                            <dt class=" m-collapseable" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <div class="m-filter-actions">
                                                    <div class="m-filter-expand-collapse">
                                                        <div class="btn-expand-collapse"></div>
                                                    </div>
                                                </div>
                                                {{__('productmodule::product.main_category')}}
                                                <i class="icon-chevron-left arrow"></i>
                                            </dt>
                                            <dd id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">

                                                <ol class="m-filter-css-checkboxes ">
                                                    @foreach($brandcategories as $category)
                                                        <li>
                                                            <span title="Black"><input class="category_id"
                                                                                       name="category_ids[]"
                                                                                       type="checkbox"
                                                                                       value="{{$category->id}}"/> {!! LanguageHelper::nameTranslate($category) !!}</span>

                                                        </li>
                                                    @endforeach

                                                </ol>
                                            </dd>
                                        </dl>
                                    @endif

                                    @foreach($brandcategories as $category)
                                        @foreach($category->options as $key=>$option)
                                            <dl class="narrow-by-list">
                                                <dt class=" m-collapseable" data-toggle="collapse"
                                                    data-target="#collapse{{$key}}" aria-expanded="true"
                                                    aria-controls="collapse{{$key}}">

                                                    <div class="m-filter-actions">
                                                        <div class="m-filter-expand-collapse">
                                                            <div class="btn-expand-collapse"></div>
                                                        </div>
                                                    </div>

                                                    {!! LanguageHelper::nameTranslate($option) !!}
                                                    <i class="icon-chevron-left arrow"></i>
                                                </dt>
                                                <dd id="collapse{{$key}}" class="collapse"
                                                    aria-labelledby="headingThree"
                                                    data-parent="#accordionExample">

                                                    <ol class="m-filter-css-checkboxes ">
                                                        @foreach($option->optionValues as $options_values)
                                                            <li>
                                                                <span title="Black"><input class="options_values"
                                                                                           name="options_values[]"
                                                                                           type="checkbox"
                                                                                           value="{{$options_values->id}}"/>   {!! LanguageHelper::nameTranslate($options_values) !!} </span>

                                                            </li>
                                                        @endforeach
                                                    </ol>

                                                </dd>
                                            </dl>
                                        @endforeach
                                    @endforeach

                                    <dl class="narrow-by-list">
                                        <dt class=" m-collapseable" data-toggle="collapse"
                                            data-target="#collapseSix" aria-expanded="true"
                                            aria-controls="collapseSix">

                                            <div class="m-filter-actions">
                                                <div class="m-filter-expand-collapse">
                                                    <div class="btn-expand-collapse"></div>
                                                </div>
                                            </div>
                                            {{__('productmodule::product.filter_by_price')}}
                                            <i class="icon-chevron-left arrow"></i>
                                        </dt>
                                        <dd id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                            data-parent="#accordionExample">

                                            <ol class="m-filter-css-checkboxes ">


                                                <div class="slider-box">
                                                    <label
                                                        for="priceRange">{{__('productmodule::product.filter_by_price')}}</label>
                                                    <input type="text" id="priceRange" name="price" readonly>
                                                    <div id="price-range" class="slider"></div>
                                                </div>

                                                <button
                                                    class="btn btn-primary btn-search-price">{{__('productmodule::product.show')}}</button>


                                            </ol>

                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                <section class="col-main col-sm-9   wow bounceInUp animated">
                    <div class="category-title">
                        <h1>{{__('productmodule::product.products')}}</h1>
                    </div>
                    <div style="display:none" class="category-description std">
                        <div class="slider-items-products">
                            <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col1">

                                    <!-- Item -->
                                    <div class="item"><a href="#x"><img alt=""
                                                                        src="assets/images/banner-3.jpg"></a>
                                    </div>
                                    <!-- End Item -->

                                    <!-- Item -->
                                    <div class="item"><a href="#x"><img alt=""
                                                                        src="assets/images/banner-4.jpg"></a></div>
                                    <!-- End Item -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="category-products">
                        <div class="toolbar">
                            <div class="sorter">
                                <div class="view-mode">
                                    <span title="Grid" class="button button-active button-grid"></span>
                                    <span title="List" class="button button-list"></span>
                                </div>
                            </div>
                            <div id="sort-by">
                                <label class="left">{{__('productmodule::product.sort_by')}}</label>
                                <ul>
                                    <li><a href="#">{{__('productmodule::product.choose')}}<span
                                                class="right-arrow"></span></a>
                                        <ul>
                                            <li class="sorting" data-sorting_type="desc"
                                                data-column_name="product_price">
                                                <label>
                                                    <input type="radio" checked="checked" name="radio">
                                                    {{__('productmodule::product.max-to-min-price')}}
                                                </label>
                                            </li>
                                            <li class="sorting" data-sorting_type="asc"
                                                data-column_name="product_price">
                                                <label>
                                                    <input type="radio" name="radio">
                                                    {{__('productmodule::product.min-to-max-price')}}
                                                </label>
                                            </li>

                                            {{--                                                <li class="sorting" data-sorting_type="asc"--}}
                                            {{--                                                    data-column_name="parent_id">--}}
                                            {{--                                                    {{__('productmodule::product.type')}}--}}
                                            {{--                                                </li>--}}

                                            <li class="sorting" data-sorting_type="asc"
                                                data-column_name="reviews">
                                                <label>
                                                    <input type="radio" name="radio">
                                                    {{__('productmodule::product.top-review')}}
                                                </label>
                                            </li>

                                            <li class="sorting" data-sorting_type="asc"
                                                data-column_name="topsell">
                                                <label>
                                                    <input type="radio" name="radio">
                                                    {{__('productmodule::product.top-sell')}}
                                                </label>
                                            </li>

                                            <li class="sorting" data-sorting_type="asc"
                                                data-column_name="discountsproducts">
                                                <label>
                                                    <input type="radio" name="radio">
                                                    {{__('productmodule::product.discounts_products')}}
                                                </label>
                                            </li>

                                            <li class="sorting" data-sorting_type="asc"
                                                data-column_name="newproducts">
                                                <label>
                                                    <input type="radio" name="radio">
                                                    {{__('productmodule::product.newproducts')}}
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @include('productmodule::front.content.productCategoryRender')
                    <div style="display: flex;width: 100%;" class="auto-load text-center">
                        <svg style="margin: auto" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0"
                             xml:space="preserve">
                                <path fill="#000"
                                      d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                    <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                      dur="1s"
                                                      from="0 50 50" to="360 50 50" repeatCount="indefinite"/>
                                </path>
                            </svg>
                    </div>
                </section>

                <input type="hidden" name="hidden_page" id="hidden_page" value="1"/>
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="product_price"/>
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc"/>


            </div>
        </div>
    </section>

@stop




@section('js')

    <script type="text/javascript">

        $(document).on('click', '.sorting', function (e) {
            if ($(e.target).is('label')) {
                return true;
            }

            let column_name = $(this).data('column_name');
            let order_type = $(this).data('sorting_type');

            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(order_type);
            let page = $('#hidden_page').val();

            getData(page, order_type, column_name);
        });


        $(document).ready(function () {
            $(document).on('click', '.pagination li a', function (event) {
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];


                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                getData(page, sort_type, column_name);
            });


            $(document).on('click', '.options_values', function (event) {
                var page = $('#hidden_page').val();

                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                getData(page, sort_type, column_name);
            });

            $(document).on('click', '.category_id', function (event) {
                var page = $('#hidden_page').val();

                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                getData(page, sort_type, column_name);
            });

            $(document).on('click', '.btn-search-price', function (event) {
                var page = $('#hidden_page').val();

                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                getData(page, sort_type, column_name);
            });

            $(document).on('click', '.brands', function (event) {
                var page = $('#hidden_page').val();

                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                getData(page, sort_type, column_name);
            });


        });
        var pagee = 1;

        function getData(page, sort_type, sort_by) {
            $("#catProducts").empty().html('Loading...');

            var options_values = $('.options_values:checkbox:checked').map(function () {
                return this.value;
            }).get();

            var category_ids = $('.category_id:checkbox:checked').map(function () {
                return this.value;
            }).get();

            var brands = $('.brands:checkbox:checked').map(function () {
                return this.value;
            }).get();


            var price = $("input[name='price']").val();
            pagee = 1;
            $.ajax(
                {
                    url: '?page=' + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&options_values=" + options_values + "&category_ids=" + category_ids + "&price=" + price + "&brands=" + brands,
                    type: "get",
                    datatype: "html"
                }).done(function (data) {
                $("#catProducts").empty().html(data);
                autoload = true;
                location.hash = page;
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
        }

        let ENDPOINT = "{{ url('/') }}";

        let scrollLock = true;
        let autoload = true;
        $(window).on('scroll', function () {
            let heightChange = $(document).height() - 850;

            if ($(window).scrollTop() + $(window).height() >= heightChange && $(document).height() > 500 && scrollLock && autoload) {
                scrollLock = false;
                pagee++;
                infiniteLoadMore(pagee);
                setTimeout(function () {
                    scrollLock = true;
                }, 1000);

            }
        });


        function infiniteLoadMore(page) {

            var price = $("input[name='price']").val();
            var options_values = $('.options_values:checkbox:checked').map(function () {
                return this.value;
            }).get();

            var category_ids = $('.category_id:checkbox:checked').map(function () {
                return this.value;
            }).get();

            var brands = $('.brands:checkbox:checked').map(function () {
                return this.value;
            }).get();

            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();

            $.ajax({
                url: '?page=' + page + "&sortby=" + column_name + "&sorttype=" + sort_type + "&options_values=" + options_values + "&category_ids=" + category_ids + "&typereturn=5&price=" + price + "&brands=" + brands,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
                .done(function (response) {
                    if (response == 0) {
                        $('.auto-load').hide();
                        autoload = false
                        return;
                    }
                    $('.auto-load').hide();
                    $("#catProducts").append(response);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }

    </script>

@endsection
