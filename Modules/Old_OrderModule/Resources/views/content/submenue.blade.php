<div class="LHS-nav col-lg-3 col-md-3 col-sm-4">
  <div id="magik-verticalmenu" class="block magik-verticalmenu">
    <div class="nav-title"> <span>{{__('fronthomemodule::home.categories')}}</span></div>
    <div class="nav-content">
      <div class="navbar navbar-inverse">
        <div id="verticalmenu" class="verticalmenu" role="navigation">
          <div class="navbar">
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav verticalmenu">

                @foreach($categories as $category)
                  <li class=" parent dropdown lay"> <a href="{{url('category/'.$category['id'])}}" class="dropdown-toggle"><span class="menu-title">{!! LanguageHelper::nameTranslate($category) !!}</span><b
                      class="round-arrow"></b></a>
                      <div class="dropdown-menu">
                        <div class="dropdown-menu-inner">
                          <div class="row">
                            <div class="col-md-7 fl-r">
                              <h3 class="catt-h3">{!! LanguageHelper::nameTranslate($category) !!}</h3>

                              @foreach($category->child->where('status',1) as $childern)
                                <div class="col-md-6 fl-r">
                                  <div class="mega-col-inner">
                                    <div class="ves-widget">
                                      <div class="widget-html">
                                        <div class="widget-inner">
                                          <ul>
                                            <li>
                                              <a href="{{url('category/'.$childern['id'])}}">
                                              <span>{!! LanguageHelper::nameTranslate($childern) !!}</span>
                                             </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endforeach
                            </div>

                            <div class="col-md-5 hidden-sm fl-r">
                              <img src="{{asset('images/category/'.$category['photo'])}}" alt="img" class="cattegory-img">
                            </div>

                            @if(count($category->brands) > 0)
                              <div class="col-md-12 fl-r">
                                <h3 class="catt-h3 brand">{{__('commonmodule::front.shopbybrand')}}</h3>
                                <ul class="shop-brand">
                                  @foreach($category->brands->unique() as $brand)

                                    <li>
                                      <div class="cat_img">
                                        <div class="left-cat-img">
                                          <a href="{{url('brand-products/'.$brand->id)}}"><img src="{{asset('images/brand/'.$brand->photo)}}" alt="img"></a>
                                        </div>
                                      </div>
                                    </li>
                                  @endforeach

                                </ul>
                              </div>
                            @endif

                          </div>
                        </div>
                      </div>
                  </li>
                @endforeach



                <li class="lay"> <a href="{{url('best_seller_products')}}"><span class="menu-title">{{__('fronthomemodule::home.best_seller')}}</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
