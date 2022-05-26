<div class="main container">
    <h2>{{__('productmodule::product.filter_by_brand')}}</h2>
    <!-- start brands -->
    <div class="grid gr-m-4 gr-sm-3 gr-xs-2 logos">
        <button onclick="filterData('{{route('front.catalog.filter_get_all')}}')" type="button" class="btn btn-primary"><i class="icon-plus"></i>{{__('fronthomemodule::home.view_all')}}</button>
        @foreach($brands as $brand)
            <a onclick="filterData('{{route('front.catalog.filter_by_brand',$brand->id)}}')" class="single-brand {{$brand->id == $selected_brand?'active':''}}">
                <img src="{{asset('images/brand/'.$brand->photo)}}">
            </a>
        @endforeach
    </div>
    <!-- end brands -->

    <!-- start slider 1 -->
    @if($catalog_categories->count() > 0)
        <section class="link-slider slider">
            @foreach($catalog_categories as $key)
                <div class="slide {{$key->id == $selected_category?'active':''}}"><a onclick="filterData('{{route('front.catalog.filter_by_category',$key->id)}}')">{{\LanguageHelper::nameTranslate($key)}}<i class="icon-file"></i> </a></div>
            @endforeach
        </section>
    @endif
<!-- end slider 1 -->

    <!-- start slider 2 -->
    @if($catalog_sub_categories->count() > 0)
        <section class="link-slider slider slider2">
            @foreach($catalog_sub_categories as $key)
                <div class="slide {{$key->id == $selected_sub_category?'active':''}}">
                    <a onclick="filterData('{{route('front.catalog.filter_by_sub_category',$key->id)}}')">
                        <i class="icon-file"></i>
                        <p>{{\LanguageHelper::nameTranslate($key)}}</p>
                    </a>
                </div>
            @endforeach
        </section>
    @endif
<!-- end slider 2 -->

    <!-- start brochures -->
    @if($catalogs->count() > 0)
        <div class="brochures">
            <div class="toolbar">
                <div class="sorter">
                    <div class="view-mode">
                        <span title="Grid" onclick="gridView()" class="button button-active button-grid"></span>
                        <span title="List" onclick="listView()" class="button button-list"></span>
                    </div>
                </div>
            </div>
        <div class="grid gr-m-4 gr-sm-3 gr-xs-2 brochures" id="gridView">
            @foreach($catalogs as $key)
                <div class="imageDiv">
                    @if(str_contains($key->file, 'png') || str_contains($key->file, 'jpg') || str_contains($key->file, 'jpeg'))
                        <img src="{{asset('files/catalog/'.$key->file)}}">
                    @else
                        <img src="{{asset('assets/front/assets/images/pdf.png')}}">
                    @endif

                    <div class="imageIcon">
                        <a href="{{asset('files/catalog/'.$key->file)}}" target="_blank"><i class="icon-eye-open"></i></a>
                        <a href="{{route('front.catalog.download',$key->id)}}" target="_blank"> <i class="icon-download"></i></a>
                    </div>
                </div>
            @endforeach

        </div>
        </div>
@endif
<!-- end brochures -->

    <div id="listCatalogs" style="display: none">
        @if($catalogs->count() > 0)
            @foreach($catalogs as $key)

                <div class="item brochures">
                    <div class="brochure-item">
                        <div class="product-image-area">
                            <a class="product-image" title="Sample Product"  >
                                @if(str_contains($key->file, 'png') || str_contains($key->file, 'jpg') || str_contains($key->file,'jpeg'))
                                    <img class="img-responsive one" src="{{asset('files/catalog/'.$key->file)}}">
                                @else
                                    <img class="img-responsive one" src="{{asset('assets/front/assets/images/pdf.png')}}">
                                @endif
                            </a>
                        </div>
                        <div class="info">
                            <div class="info-inner">
                                <div class="item-title">
                                    <a title=" Sample Product" href="#">
                                        <h3> {{\LanguageHelper::nameTranslate($key)}}</h3>
                                    </a>
                                </div>
                                <!--item-title-->
                                <div class="item-content">
                                    {!! \LanguageHelper::descTranslate($key) !!}
                                </div>
                                <!--item-content-->
                            </div>
                            <!--info-inner-->
                            <div class="actions">
                                <div class="imageIcon">
                                    <a href="{{asset('files/catalog/'.$key->file)}}" target="_blank"><i class="icon-eye-open"></i></a>
                                    <a href="{{route('front.catalog.download',$key->id)}}" target="_blank"> <i class="icon-download"></i></a>
                                </div>
                            </div>
                            <!--actions-->

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>


</div>
