@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('fronthomemodule::suggestion.suggestions')}}
@endsection



@section('content')

<!-- Breadcrumbs -->
@include('merchantmodule::content.breadCrumbs',['pages'=>[__('fronthomemodule::suggestion.suggestions')]])

<!-- main-container -->
<section class="main-container col1-layout">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
            </div>
            <fieldset class="col2-set">
                <div class="col-2 registered-users suggestion"><strong>{{__('fronthomemodule::suggestion.suggestions')}}</strong>
                  <form id="suggestionComplaintForm" >
                    <div class="content">
                        <ul class="form-list">
                            <li>
                                <label for="name">{{__('fronthomemodule::suggestion.name')}} <span class="required">*</span></label>
                                <br>
                                <input name="name" type="text" title="Name" class="input-text required-entry"
                                    value="" required autocomplete="off">
                            </li>
                            <li>
                                <label for="phone">{{__('fronthomemodule::suggestion.mobile')}} <span class="required">*</span></label>
                                <br>
                                <input name="phone" type="text" title="phone"
                                    class="input-text required-entry validate-password" required autocomplete="off">
                            </li>
                            <li>
                                    <div class="radio-btn">
                                        <label for="suggestion">{{__('fronthomemodule::suggestion.suggestion')}}</label>
                                        <input type="radio" name="type" value="suggestion" id="suggestion" required >
                                    </div>
                                    <div class="radio-btn">
                                        <label for="complaint">{{__('fronthomemodule::suggestion.complaint')}}</label>
                                        <input type="radio" name="type" value="complaint" id="complaint" required >
                                    </div>
                            </li>
                            <li>
                                <label for="pass">{{__('fronthomemodule::suggestion.message')}} <span class="required">*</span></label>
                                <br>
                                <textarea name="message" id="" rows="5" required autocomplete="off"></textarea>
                            </li>
                        </ul>
                        <div class="buttons-set">
                            <button name="send" type="submit"
                                class=" button  send btn-block"><span>{{__('fronthomemodule::suggestion.send_btn')}}</span></button>
                        </div>
                    </div>
                  </form>

                </div>
            </fieldset>
        </div>
    </div>
</section>
<!--End main-container -->


@section('js')

<script type="text/javascript">


$( "#suggestionComplaintForm" ).submit(function( event ) {
  event.preventDefault();
  var form = document.getElementById('suggestionComplaintForm');
      token='{{csrf_token()}}';
      var formdata = new FormData(document.querySelector('#suggestionComplaintForm'));
      formdata.append("_token", token);

         $.ajax({
             'type': 'post',
             'url': '{{ url("save-suggestion-complaint") }}',
             data: formdata,
             processData: false,
             contentType: false,
             'statusCode': {
                     200: function (response) {

                       if(response.code==201)
                       toastr["error"](response.message);
                       else{
                         toastr["success"](response.message)
                         $('input[type="text"]').val('');
                         $('input[type="radio"]').attr('checked',false);
                         $('textarea').val('');

                        }

                     },
                     422: function (response) {

                      $.map(response.responseJSON.errors ,function(error) {
                         toastr["error"](error)
                      });

                     }
                 },
         });

});



</script>

@endsection

@stop
