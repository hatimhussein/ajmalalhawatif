@extends('fronthomemodule::layouts.master')

@section('title')
    {!! LanguageHelper::configTranslate($config) !!}
@endsection


@section('content')
@include('fronthomemodule::content.breadCrumbs',['pages'=>[LanguageHelper::configTranslate($config)]])

  <!-- main-container -->
  <div class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
          <aside class="col-right sidebar col-sm-3 wow bounceInUp">
              <div class="block block-account">
                <div class="block-title">Company</div>
                <div class="block-content">
                  <ul>

                          @foreach($polices as $policy)
                            <li><a onclick="getConfig({{$policy->id}})">
                            <!-- {{(session('locale')!='en')?$policy->display_name_ar:$policy->display_name_en}} -->
                            {!! LanguageHelper::configTranslate($policy) !!}
                            </a></li>
                          @endforeach

                  </ul>
                </div>
              </div>
            </aside>
            @include('configmodule::front.configRender')
      </div>
    </div>
  </div>
  <!--End main-container -->

@stop



@section('js')
<script type="text/javascript">

  function getConfig(id)
  {
    $.ajax(
    {
        url: id,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $("#about").empty().html(data);

    }).fail(function(jqXHR, ajaxOptions, thrownError){
          alert('No response from server');
    });

  }
</script>
@endsection
