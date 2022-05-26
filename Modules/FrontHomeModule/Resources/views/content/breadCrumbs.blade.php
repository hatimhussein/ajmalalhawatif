
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ul>
            <li class="home"> <a title="Go to Home Page" href="{{url('/')}}">{{__('fronthomemodule::breadCrumbs.home')}}</a><span>&mdash;›</span></li>

                @foreach($pages as $key=>$page)
                  <li class="category13"><strong>{{$page}}</strong>
                    @if($key+1 != count($pages))
                    <span>&mdash;›</span>
                    @endif

                  </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
