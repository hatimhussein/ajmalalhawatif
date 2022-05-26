@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('fronthomemodule::home.catalogs')}}
@endsection


@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.catalogs')]])

    <!-- main-container -->
    <div class="main-container catalog-container brands-container" id="catalogs_content">
        <div class="main container">
            <h2>{{__('productmodule::product.filter_by_brand')}}</h2>
            <!-- start brands -->
            <div class="grid gr-m-10 gr-sm-5 gr-xs-3 logos">
                <button onclick="setBrand(null)" type="button"
                        class="btn btn-primary"><i class="icon-plus"></i>{{__('fronthomemodule::home.view_all')}}
                </button>
                @foreach($brands as $brand)
                    <a onclick="setBrand({{ $brand->id }})" id="brand-{{ $brand->id }}"
                       class="single-brand">
                        <img src="{{asset('images/brand/'.$brand->photo)}}" alt="{{ $brand->name }}">
                    </a>
                @endforeach
            </div>
            <!-- end brands -->

            @if($catalog_categories->count() > 0)
                <section class="link-slider slider">
                    @foreach($catalog_categories as $category)
                        <div id="category-btn-{{$category->id}}"
                             class="slide category-btn"
                             onclick="setCategory('{{$category->id}}')">
                            <a href="javascript:void(0);">
                                <img src="{{asset('images/catalog_category/'.$category->image)}}"
                                     alt="{{ $category->name }}">
                                <span>{{ $category->name }}</span>
                            </a>
                        </div>
                    @endforeach
                </section>
            @endif

            @foreach($catalog_categories as $category)
                @if($category->children->count() > 0)
                    <section id="sub-slider-{{$category->id}}" class="link-slider slider2"
                             style="{{ $loop->first ? '' : 'display: none' }}">
                        @foreach($category->children as $child)
                            <div class="slide child-btn" onclick="setSubCategory('{{$child->id}}')">
                                <a href="javascript:void(0);">
                                    <img src="{{asset('images/catalog_category/'.$child->image)}}"
                                         alt="{{ $child->name }}">
                                    <p>{{ $child->name }}</p>
                                </a>
                            </div>
                        @endforeach
                    </section>
                @endif
            @endforeach

            @if($catalogs->count())
                <div class="brochures">
                    <div class="toolbar">
                        <div class="sorter">
                            <div class="view-mode">
                                    <span title="Grid" onclick="gridView()"
                                          class="button button-active button-grid"></span>
                                <span title="List" onclick="listView()" class="button button-list"></span>
                            </div>
                        </div>
                    </div>
                    <div class="grid gr-m-6 gr-sm-5 gr-xs-3" id="gridView">

                        @foreach($catalogs as $catalog)
                            <div class="imageDiv">
                                @if(is_image($catalog->file))
                                    <img src="{{$catalog->file_path}}"
                                         alt="{{ $catalog->name }}">
                                @elseif(is_video($catalog->file))
                                    <video controls>
                                        <source
                                            src="{{$catalog->file_path}}"
                                            type="video/mp4">
                                        <source
                                            src="{{$catalog->file_path}}"
                                            type="video/quicktime">
                                        Your browser does not support the video
                                        tag.
                                    </video>
                                @else
                                    <img src="{{asset('assets/front/assets/images/pdf.png')}}"
                                         alt="{{ $catalog->name }}">
                                @endif

                                <div class="imageIcon">
                                    <a href="{{$catalog->file_path}}" target="_blank"><i
                                            class="icon-eye-open"></i></a>
                                    <a href="{{route('front.catalog.download',$catalog->id)}}" target="_blank"> <i
                                            class="icon-download"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="listCatalogs" style="display: none">
                        @foreach($catalogs as $catalog)
                            <div class="item brochures">
                                <div class="brochure-item">
                                    <div class="product-image-area">
                                        @if(is_image($catalog->file))
                                            <img class="img-responsive one"
                                                 src="{{$catalog->file_path}}"
                                                 alt="{{ $catalog->name }}">
                                        @elseif(is_video($catalog->file))
                                            <video controls>
                                                <source
                                                    src="{{$catalog->file_path}}"
                                                    type="video/mp4">
                                                <source
                                                    src="{{$catalog->file_path}}"
                                                    type="video/quicktime">
                                                Your browser does not support the video
                                                tag.
                                            </video>
                                        @else
                                            <img class="img-responsive one"
                                                 src="{{asset('assets/front/assets/images/pdf.png')}}"
                                                 alt="{{ $catalog->name }}">
                                        @endif
                                    </div>
                                    <div class="info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <h3> {{ $catalog->name }} </h3>
                                            </div>
                                            <!--item-title-->
                                            <div class="item-content">
                                                <p>{{ \LanguageHelper::descTranslate($catalog) }}</p>
                                            </div>
                                            <!--item-content-->
                                        </div>
                                        <!--info-inner-->
                                        <div class="actions">
                                            <div class="imageIcon">
                                                <a href="{{$catalog->file_path}}" target="_blank"><i
                                                        class="icon-eye-open"></i></a>
                                                <a href="{{route('front.catalog.download',$catalog->id)}}"
                                                   target="_blank">
                                                    <i class="icon-download"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!--actions-->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <!-- End Item -->

        <input type="hidden" id="brand_id" value="">
        <input type="hidden" id="category_id" value="">
    </div>
    <!--End main-container -->

@stop

@section('js')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script>
        $(document).ready(function () {
            prepareSlider();
        });

        var sliderOpt = {
            slidesToShow: 4,
            slidesToScroll: 1,
            @if(app()->isLocale('ar'))
            rtl: true,
            @endif
            autoplay: false,
            autoplaySpeed: 1500,
            arrows: true,
            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='icon-chevron-left' aria-hidden='true'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='icon-chevron-right' aria-hidden='true'></i></button>",
            dots: false,
            pauseOnHover: false,
            infinite: false,
            loop: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2
                }
            }]
        };

        function prepareSlider() {

            $('.link-slider.slider').slick(sliderOpt);
            sliderOpt.slidesToShow = 7;
            sliderOpt.responsive = [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 6
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]

            @foreach($catalog_categories as $category)
            $('#sub-slider-{{$category->id}}').slick(sliderOpt);
            @endforeach

        }

        // List View
        function listView() {
            $('#listCatalogs').css('display', 'block');
            $('#gridView').css('display', 'none');
        }

        // Grid View
        function gridView() {
            $('#gridView').css('display', 'grid');
            $('#listCatalogs').css('display', 'none');
        }

        $('.single-brand').click(function () {
            $('.single-brand.active').removeClass('active');
            $(this).addClass('active');
        });

        $('.category-btn').click(function () {
            $('.category-btn').removeClass('active')
            $('.child-btn').removeClass('active')
            $(this).addClass('active');
        })

        $('.child-btn').click(function () {
            $('.child-btn').removeClass('active')
            $(this).addClass('active');
        })
    </script>


    <script>
        const brandInp = $('#brand_id');
        const categoryInp = $('#category_id');

        function filterData(url) {
            let brand_id = brandInp.val();
            let cat_id = categoryInp.val();

            $.ajax({
                type: 'get',
                url: url,
                data: {brand_id, cat_id},
                success: (response) => {
                    prepareGridView(response.data)
                    prepareListView(response.data);
                }
            });
        }

        function prepareGridView(catalogs) {
            $('#gridView').html('');

            $.map(catalogs, function (catalog) {

                let preview = '';
                if (catalog.is_image) {
                    preview = `<img src="${catalog.file_path}" alt="${catalog.name}">`;
                } else if (catalog.is_video) {
                    preview = `<video controls>
                                   <source src="${catalog.file_path}" type="video/mp4">
                                   <source src="${catalog.file_path}" type="video/quicktime">
                                        Your browser does not support the video tag.
                                </video>`;
                } else {
                    preview = `<img src="{{asset('assets/front/assets/images/pdf.png')}}" alt="${catalog.name}">`;
                }

                $('#gridView').append(`
                    <div class="imageDiv">
                        ${preview}
                        <div class="imageIcon">
                            <a href="${catalog.file_path}" target="_blank"><i
                                class="icon-eye-open"></i></a>
                            <a href="/catalog/${catalog.id}/download" target="_blank"> <i
                                    class="icon-download"></i></a>
                        </div>
                    </div>
                `);
            });
        }


        function prepareListView(catalogs) {
            $('#listCatalogs').html('');

            $.map(catalogs, function (catalog) {

                let preview = '';
                if (catalog.is_image) {
                    preview = `<img class="img-responsive one" src="${catalog.file_path}" alt="${catalog.name}">`;
                } else if (catalog.is_video) {
                    preview = `<video controls>
                                   <source src="${catalog.file_path}" type="video/mp4">
                                   <source src="${catalog.file_path}" type="video/quicktime">
                                        Your browser does not support the video tag.
                                </video>`;
                } else {
                    preview = `<img class="img-responsive one" src="{{asset('assets/front/assets/images/pdf.png')}}" alt="${catalog.name}">`;
                }

                $('#listCatalogs').append(`
                    <div class="item brochures">
                        <div class="brochure-item">
                            <div class="product-image-area">
                                 ${preview}
                            </div>
                            <div class="info">
                            <div class="info-inner">
                                <div class="item-title">
                                    <h3>${catalog.name}</h3>
                                    </div>
                                            <!--item-title-->
                                    <div class="item-content">
                                        <p>${catalog.desc}</p>
                                    </div>
                                    <!--item-content-->
                                </div>
                                <!--info-inner-->
                                <div class="actions">
                                    <div class="imageIcon">
                                        <a href="${catalog.file_path}" target="_blank"><i
                                                class="icon-eye-open"></i></a>
                                        <a href="/catalog/${catalog.id}/download"
                                           target="_blank">
                                            <i class="icon-download"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--actions-->
                            </div>
                        </div>
                    </div>
                `);
            });
        }


        function setBrand(brand_id) {
            if (brand_id === null) {
                $('.single-brand.active').removeClass('active');
                resetCategories()
            }

            brandInp.val(brand_id);
            filterData();
        }

        function resetCategories() {
            $('.category-btn.active, .child-btn.active').removeClass('active');
            categoryInp.val(null);
        }

        function setCategory(cat_id) {
            categoryInp.val(cat_id);
            $('.link-slider.slider2').not(`#sub-slider-${cat_id}`).hide();
            $(`#sub-slider-${cat_id}`).show()
            $(`#sub-slider-${cat_id}`).slick('unslick')
            $(`#sub-slider-${cat_id}`).slick(sliderOpt)
            filterData();
        }

        function setSubCategory(cat_id) {
            categoryInp.val(cat_id);
            $(`#category-btn-${cat_id}`).addClass('active');
            filterData();
        }

    </script>
@endsection
