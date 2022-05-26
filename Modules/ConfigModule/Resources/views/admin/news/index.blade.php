@extends('commonmodule::layouts.master')

@section('title')
    {{__('configmodule::admin.news')}}
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
                    <h3>{{__('configmodule::admin.news')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">{{__('configmodule::admin.news')}}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="page-title" style="float:right">
                    <a href="{{ route('news.create') }}"
                       class="mt-4 btn btn-button-16"> {{__('configmodule::admin.create_news')}} </a>
                </div>

            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('configmodule::admin.news')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>{{__('configmodule::admin.news_ar')}}</th>
                                        <th>{{__('configmodule::admin.news_en')}}</th>
                                        <th>{{__('configmodule::admin.status')}}</th>
                                        <th>{{__('configmodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $line)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$loop->iteration}}</td>
                                            <td>{{$line->desc_ar}}</td>
                                            <td>{{$line->desc_en}}</td>

                                            <td>
                                                @if($line->status==1)
                                                    <span
                                                        class="badge badge-success">{{__('productmodule::category.active')}}</span>
                                                @else
                                                    <span
                                                        class="badge badge-danger">{{__('productmodule::category.unactive')}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="table-controls">
                                                    @can('update_category')
                                                        <li>
                                                            <a href="{{ route('news.edit', $line->id) }}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Edit">
                                                                <i class="flaticon-edit  bg-success p-1 text-white"></i>
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('delete_category')
                                                        <li>
                                                            <form class="inline"
                                                                  action="{{route('news.destroy', $line->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="unst" title="Delete" type="submit"
                                                                        onclick="return confirm('{{__("configmodule::admin.delete_news")}}')"
                                                                        type="button">
                                                                    <i class="flaticon-delete  bg-danger p-1 text-white"></i>
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
            }
        });
    </script>


@endsection


