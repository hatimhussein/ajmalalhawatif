@extends('commonmodule::layouts.master')

@section('title')
   {{__('productfeaturemodule::admin.offers')}}
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
                    <h3>
                      <a href="{{url('admin/offers')}}">
                      {{__('productfeaturemodule::admin.offers')}}
                      </a>
                    </h3>

                      <div class="crumbs">
                          <ul id="breadcrumbs" class="breadcrumb">
                              <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                              <li><a href="#">{{__('productfeaturemodule::admin.offers')}}</a></li>
                          </ul>
                      </div>
                  </div>



                  @can('add_offer')
                    <div class="page-title" style="float:right">
                        <a href="{{url('admin/offers/create')}}" class="mt-4 btn btn-button-16"> {{__('productfeaturemodule::admin.add_new_offer')}} </a>
                    </div>
                  @endcan

              </div>

              <div class="row" id="cancel-row">

                  <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>{{__('productfeaturemodule::admin.offers')}}</h4>
                                  </div>
                              </div>
                          </div>
                          <div class="widget-content widget-content-area">
                              <div class="table-responsive mb-4">
                                  <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                      <thead>
                                          <tr class="text-center">
                                              <th>#</th>
                                              <th>{{__('productfeaturemodule::admin.name_ar')}}</th>
                                              <th>{{__('productfeaturemodule::admin.name_en')}}</th>
                                              <th >{{__('productfeaturemodule::admin.action')}}</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($offers as $offer)
                                          <tr class="text-center">
                                              <td class="text-primary">{{$offer->id}}</td>
                                              <td>{{$offer->name_ar}}</td>
                                              <td>{{$offer->name_en}}</td>



                                              <td>
                                                <ul class="table-controls">


                                                  @can('update_offer')

                                                    <li><a  href="{{url('admin/offers/'.$offer->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a></li>
                                                  @endcan
                                                  @can('delete_offer')

                                                    <li>
                                                      <form class="inline" action="{{url('admin/offers/' . $offer->id)}}" method="POST">
                                                        {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                        <button class="unst" title="Delete" type="submit" onclick="return confirm('{{__('productfeaturemodule::admin.delete_offer')}}')" type="button"
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
    var myDataTable =$('#zero-config').DataTable({
        "language": {
            "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        },


    });


</script>
@endsection
