@extends('commonmodule::layouts.master')

@section('title')
    {{__('configmodule::admin.currency')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}" type="text/css" >
@endsection



@section('content')



      <!--  BEGIN CONTENT PART  -->
      <div id="content" class="main-content">
          <div class="container">
              <div class="page-header">
                  <div class="page-title">
                      <h3>{{__('configmodule::admin.currency')}}</h3>

                    </div>

                    @can('add_currency')
                      <div class="page-title" style="float:right">
                          <a href="{{url('admin/currency/create')}}" class="mt-4 btn btn-button-16"> {{__('configmodule::admin.add_new_currency')}} </a>
                      </div>
                    @endcan


              </div>

              <div class="row" id="cancel-row">

                  <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>{{__('configmodule::admin.currency')}}</h4>
                                  </div>
                              </div>
                          </div>
                          <div class="widget-content widget-content-area">
                              <div class="mb-4">
                                  <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                      <thead>
                                          <tr class="text-center">
                                              <th>#</th>
                                              <th>{{__('configmodule::admin.name_ar')}}</th>
                                              <th> {{__('configmodule::admin.name_en')}}</th>
                                              <th>{{__('configmodule::admin.code')}}</th>
                                              <th>{{__('configmodule::admin.symbol')}}</th>
                                              <th>{{__('configmodule::admin.factor')}} </th>
                                              <th>{{__('configmodule::admin.status')}}</th>
                                              <th>{{__('configmodule::admin.deafult')}}</th>
                                              <th>{{__('configmodule::admin.action')}}</th>

                                            </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($currencies as $currency)
                                          <tr class="text-center">
                                              <td class="text-primary">{{$currency->id}}</td>
                                              <td>{{$currency->name_ar}}</td>
                                              <td>{{$currency->name_en}}</td>
                                              <td>{{$currency->code}}</td>
                                              <td>{{$currency->symbol}}</td>
                                              <td>{{$currency->value}}</td>
                                              <td>
                                                @if($currency->status==1)
                                                  <span class="badge badge-success">{{__('configmodule::admin.active')}}</span>
                                                @else
                                                  <span class="badge badge-danger">{{__('configmodule::admin.unactive')}}</span>
                                                @endif
                                              </td>
                                              <td>
                                                @if($currency->status==1)
                                                <label><input class="currency_id" {{($currency->is_deafult==1)?'checked':''}} type="radio" name="is_deafult" value="{{$currency->id}}"></label>
                                                </td>
                                                @else
                                                  -
                                                @endif
                                              <td>
                                                <ul class="table-controls">


                                                  @can('update_currency')
                                                    <li><a  href="{{url('admin/currency/'.$currency->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a></li>
                                                  @endcan

                                                  @can('delete_currency')
                                                    <li>
                                                      <form class="inline" action="{{url('admin/currency/' . $currency->id)}}" method="POST">
                                                        {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                        <button class="unst" title="Delete" type="submit" onclick="return confirm('هل تريد حذف هذة العملة ؟')" type="button"
                                                          ><i class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i></button>
                                                      </form>
                                                    </li>
                                                  @endcan



                                                </ul>


                                              </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>


          </div>
      </div>
      <!--  END CONTENT PART  -->
@stop

@section('js')
@include('commonmodule::includes.swal')

<script>
    $('#zero-config').DataTable({
        "language": {
            "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        }
    });
</script>
<script type="text/javascript">
$( ".currency_id" ).on('click',function() {
     var id=  $(this).val();


      token='{{csrf_token()}}';
         $.ajax({
             'type': 'POST',
             'url': '{{ url("admin/update-deafult-currency") }}',
              data : {'id':id,'_token':token},
             'statusCode': {
                     200: function (response) {
                       alert('{{__("configmodule::admin.currency_deafult_done")}}');
                     },
                     422: function (response) {
                       toastr["error"]('حدث خطأ ما');

                     }
                 },
         });
});

</script>
@endsection
