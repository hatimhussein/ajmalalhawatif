<script  >
$( "#country_id" ).on('change',function() {
          var country_id=  $(this).val();

              token='{{csrf_token()}}';
                 $.ajax({
                     'type': 'get',
                     'url': '{{ url("getGovernmentList/") }}',
                      data : {'country_id':country_id},
                     'statusCode': {
                             200: function (response) {
                               $('#government_id').html('<option disabled selected value="">Choose Government</opiton>');
                                $.map(response.data ,function(government ) {
                                  $('#government_id').append('<option value="'+government.id+'">'+government.name_ar+'</opiton>');
                                });
                             },
                             422: function (response) {
                               alert('error');

                             }
                         },
                 });
          });

          $( "#government_id" ).on('change',function() {
          var gov_id=  $(this).val();

              token='{{csrf_token()}}';
                 $.ajax({
                     'type': 'get',
                     'url': '{{ url("getCityList/") }}',
                      data : {'gov_id':gov_id},
                     'statusCode': {
                             200: function (response) {
                               $('#city_id').html('<option disabled selected value="">{{__("usermodule::login.choose_city")}}</opiton>');
                               $('#zone_id').html('<option disabled selected value="">{{__("usermodule::login.choose_zone")}}</opiton>');
                               @if(session('locale')=='en')
                                $.map(response.data ,function(city) {
                                  $('#city_id').append('<option value="'+city.id+'">'+city.name_en+'</opiton>');
                                });
                               @else
                                $.map(response.data ,function(city) {
                                    $('#city_id').append('<option value="'+city.id+'">'+city.name_ar+'</opiton>');
                                  });

                               @endif

                             },
                             422: function (response) {
                               $('#errors').html('حدث خطأ ما ');

                             }
                         },
                 });
          });

</script>