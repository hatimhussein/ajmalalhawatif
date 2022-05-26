
<form class="submit_config_form" action="{{url('admin/update-config-array')}}" method="POST">
@csrf
<div class="row">
@foreach($configCategorires->where('id',5)->first()->configs as $key=>$config)
        <div class="col-12">
            <div class="form-row">
                <div class="input-control required col-md-12 mb-4 required">
                    <input type="hidden" id="{{$config->key}}" name="{{$config->key}}" value="{{$config->value_ar}}"  class="form-control " data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{$config->display_name_en}}" placeholder="{{$config->display_name_en}}" autocomplete="off" required>
                </div>
            </div>

        </div>
    @endforeach
    <div class="col-xl-3 mb-3" >
    <button  type="submit" class="btn btn-md btn-block btn-success">{{__('configmodule::admin.update')}}</button>
</div>
</div>

</form>

            <div style="width:100%;height:500px;" id="map"></div>

              <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdB-OtsN9eywcvWkkR0XKrVD8HiIxBEDE&callback=initMap">
    </script>
      <script>
      var map;
      var marker;
      var infowindow;
      var messagewindow;
      function initMap() {
        var latlng = {lat: 28.0641233, lng: 31.4088828};
        map = new google.maps.Map(document.getElementById('map'), {
          center: latlng,
          zoom: 7
        });
        google.maps.event.addListener(map, 'click', function(event) {

          marker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });

          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });

         var latlng = marker.getPosition();
            document.getElementById("lat").value= latlng.lat();
            document.getElementById("lng").value= latlng.lng();

       });

 var input = document.getElementById('pac-input');

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);



        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.


      }

      </script>
