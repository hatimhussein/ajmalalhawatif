@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('fronthomemodule::home.home')}}
@endsection

@section('content')

    <!-- start News -->
    @if($news->count())
        <div class="news-line onoffswitch3">
            <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
            <label class="onoffswitch3-label" for="myonoffswitch3">
        <span class="onoffswitch3-inner">
            <span class="onoffswitch3-active">
                <marquee class="scroll-text" {{ (App::getLocale()=='en') ? '' : 'direction=right' }}>
                    @foreach ($news as $single_news)
                        <span>{{ LanguageHelper::productDescription($single_news) }}</span>
                    @endforeach
                </marquee>

                <span class="onoffswitch3-switch">{{ __('fronthomemodule::home.breaking_news') }}</span>
            </span>
        <span class="onoffswitch3-inactive"><span
                class="onoffswitch3-switch">{{ __('fronthomemodule::home.show_breaking_news') }}</span></span>
        </span>
            </label>
        </div>
    @endif
    <!-- end News -->

    <!-- start menu And Slider -->
    <div class="magik-slideshow" id="magik-slideshow">
        <div class="container">
            <div class="row">
                {{-- @include('fronthomemodule::content.submenue') --}}
                @include('fronthomemodule::content.slider')
            </div>
        </div>
    </div>

    <!-- end menu And Slider -->
    <div class="brand-logo ">
        <div class="container">
            @if($site_data->where('key','categories_slider')->first()->value_ar)
                <div class="slider-items-products">
                    <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col6">

                            @foreach($categories as $category)
                                <div class="item"><a href="{{url('category/'.$category->id)}}"><img
                                            src="{{asset('images/category/'.$category->photo)}}" alt="Image"></a>
                                    <h5>{{LanguageHelper::nameTranslate($category)}}</h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="grid gr-m-4 gr-sm-3 gr-xs-2 index-brands">
                    @foreach($categories as $category)
                        <a href="{{url('category/'.$category->id)}}" class="imageDiv-container">
                            <div class="imageDiv"
                                 style="background-image: url('{{asset('images/category/'.$category->banner)}}');background-size: 100% 100%;
                                     background-repeat: no-repeat;">
                            </div>
                            <div class="text">
                                <div>
                                    <h3>{{LanguageHelper::nameTranslate($category)}}</h3>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

        </div>
    </div>

    @if($AdvertiseStatus[0]->status==1)
        <!-- start ADS  -->
        <div class="offer-banner-section banner">
            <div class="container">
                <div class="row">

                    @foreach($advertisements as $key=>$advertisement)
                        @if($key > 1)  @break @endif
                        <a href="{{$advertisement->link}}" target="_blank" class="col-xs-6">
                            <img alt="promo-banner3" src="{{asset('images/img/'.$advertisement->image)}}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end ADS -->
    @endif

    <!-- start selectedCategories And Ads -->
    <div class="main-container col1-layout home-content-container">
        <div class="container">
            @include('fronthomemodule::content.discountsSlider')

            @php($is_shown=true)

            @foreach($selected_categories as $cat_key=>$category)
                @include('fronthomemodule::content.selectedCategories')
            @endforeach
        </div>
    </div>
    <!-- start selectedCategories  -->
    @if($AdvertiseStatus[1]->status==1)
        <div class="promo-banner-section wow bounceInDown animated banner">
            <div class="container">
                <div class="row">
                    @foreach($advertisements as $key=>$advertisement)
                        @if($key <= 1)  @continue @endif
                        <a href="{{$advertisement->link}}" target="_blank" class="col-xs-6">
                            <img alt="promo-banner3" src="{{asset('images/img/'.$advertisement->image)}}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@stop
