@extends('commonmodule::layouts.master')

@section('title')
    {{__('areamodule::area.cities')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}"
          type="text/css">
@endsection



@section('content')



    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('areamodule::area.cities')}}</h3>

                </div>
                @can('add_city')
                    <div class="page-title" style="float:right">
                        <a href="{{url('admin/city/create')}}"
                           class="mt-4 btn btn-button-16"> {{__('areamodule::area.add_new_city')}} </a>
                        <a class="mt-4 btn btn-button-16 mr-2"
                           href="{{url('admin/downloadcity')}}"> {{__('areamodule::area.download')}}  </a>
                        <a data-target="#uploadModal" data-toggle="modal"
                           class="mt-4 btn btn-button-16 mr-2"> {{__('areamodule::area.upload')}}  </a>
                    </div>
                @endcan


            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('areamodule::area.cities')}} </h4>
                                </div>
                            </div>
                            @can('delete_city')
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="bulk-form" action="{{ route('city.bulk') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="method" value="">
                                            <input type="hidden" name="ids" value="">
                                            <button type="submit" class="btn btn-danger bulk-btn" value="delete"
                                                    disabled>{{__('productmodule::admin.delete')}}</button>
                                        </form>
                                    </div>
                                </div>
                            @endcan
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class=" mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th><input type="checkbox" class="table-select-all"></th>
                                        <th>{{__('areamodule::area.name_ar')}}</th>
                                        <th>{{__('areamodule::area.name_en')}}</th>
                                        <th>{{__('areamodule::area.shipping_price')}}</th>
                                        <th>{{__('areamodule::area.government')}}</th>
                                        <th>{{__('areamodule::area.country')}}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cities as $city)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$loop->iteration}}</td>
                                            <td>
                                                <input type="checkbox" class="table-select"
                                                       name="ids[]" value="{{$city->id}}">
                                            </td>
                                            <td>{{$city->name_ar}}</td>
                                            <td>{{$city->name_en}}</td>
                                            <td>{{$city->shipping_price}}</td>
                                            <td>{{($city->government)?$city->government->name_ar:''}}</td>
                                            <td>{{($city->country)?$city->country->name_ar:''}}</td>


                                            <td>
                                                <ul class="table-controls">

                                                    @can('update_city')
                                                        <li><a href="{{url('admin/city/'.$city->id.'/edit')}}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Edit"><i
                                                                    class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a>
                                                        </li>
                                                    @endcan

                                                    @can('delete_city')
                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/city/' . $city->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="unst" title="Delete" type="submit"
                                                                        onclick="return confirm('{{__("areamodule::area.delete_city")}}')"
                                                                        type="button"
                                                                >
                                                                    <i class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i>
                                                                </button>
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
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('areamodule::area.upload')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{url('admin/uploadcity')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <input type="file" name="city" class="col-lg-6" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{__('areamodule::area.upload')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

@section('js')
    @include('commonmodule::includes.swal')

    <script>
        $('#zero-config').DataTable({
            "lengthMenu": [100, 50, 20, 10],
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            columnDefs: [{
                orderable: false,
                targets: 1
            }],
        });
    </script>
@endsection
