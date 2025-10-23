  <div class="col-lg-9 col-md-9 col-sm-8  bounceInUp animated">
    <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
          <ul>
            @foreach($sliders as $slider)
              <li data-transition='random' data-slotamount='7' data-masterspeed='1000'
                data-thumb="{{asset('images/slider/'.$slider->image)}}" class="black-text">
                <img src="{{asset('images/slider/'.$slider->image)}}" data-bgposition='left top'
                  data-bgrepeat='no-repeat' alt="banner" />
              </li>
            @endforeach
          </ul>
          <div class="tp-bannertimer"></div>
        </div>
      </div>

  </div>
