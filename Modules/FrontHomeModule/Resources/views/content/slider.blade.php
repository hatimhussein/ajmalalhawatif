<div class="col-lg-12 col-md-12 col-sm-12  bounceInUp animated">

    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide">
                    @if(!empty($slider->link))
                        <a target="_blank" href="{{$slider->link}}">
                            <img src="{{asset('images/slider/'.$slider->image)}}">
                        </a>
                    @else
                        <img src="{{asset('images/slider/'.$slider->image)}}">
                    @endif
                </div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
    </div>
</div>
