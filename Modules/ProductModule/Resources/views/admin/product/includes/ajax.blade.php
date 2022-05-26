
<script>
    $('#categoryFormModal').submit(function(e){
        e.preventDefault();
        console.log('here');
        var form = document.getElementById('categoryFormModal');
      var isValidForm = form.checkValidity();

          token='{{csrf_token()}}';
          category_photo = $('#category_photo').prop('files')[0];

          var formdata = new FormData(document.querySelector('#categoryFormModal'));
          formdata.append("photo", category_photo);
          formdata.append("_token", token);

             $.ajax({
                 'type': 'post',
                 'url': '{{ url("admin/setCategory") }}',
                 data: formdata,
                 processData: false,
                 contentType: false,

                 'statusCode': {
                         200: function (response) {
                           $('#saveCategoryBtn').html('save');
                           console.log(response);


                         },
                         422: function (response) {
                           var erro='';
                           $.map(response.responseJSON.errors ,function(error) {
                                    // erro+=error[0]+'<br><br>';
                                    if(error[0])
                                    swal("Error", error[0], "error", { button: "Ok", });

                           });
                           $('#saveCategoryBtn').html('save');

                           // swal("خطأ", erro, "error", { button: "Ok", });

                         }
                     },
             });

    });
</script>


