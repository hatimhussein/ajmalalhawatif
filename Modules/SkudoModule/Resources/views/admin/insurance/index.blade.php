@extends('commonmodule::layouts.master')

@section('title')
    {{__('warrantymodule::admin.insurance')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}"
          type="text/css">

@endsection



@section('content')


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('warrantymodule::admin.insurance')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">{{__('warrantymodule::admin.insurance')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="page-title" style="float:right">
                    <a class="mt-4 btn btn-button-16 mr-2"
                       href="{{route('skudo.insurance.export')}}">
                        {{__('productmodule::category.download')}}
                    </a>
                </div>
            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <form action="{{route('skudo.insurance.index')}}" method="get">
                                <div class="row mt-5">
                                    <div class="col-md-3 col-xs-12">
                                        <input type="date" name="date" id="date_input" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <button type="submit"
                                                class="btn btn-success">
                                            {{__('warrantymodule::warranty.all')}}
                                        </button>
                                        <button type="submit" name="filter" value="new"
                                                class="btn btn-info">
                                            {{__('warrantymodule::warranty.new')}}
                                        </button>
                                        <button type="submit" class="btn btn-warning" name="filter" value="in_progress">
                                            {{__('warrantymodule::warranty.in_progress')}}
                                        </button>
                                        <button type="submit" name="filter" value="completed"
                                                class="btn btn-danger">
                                            {{__('warrantymodule::warranty.completed')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>{{__('warrantymodule::insurance.quote_number')}}</th>
{{--                                        <th>{{__('warrantymodule::insurance.company_name')}}</th>--}}
{{--                                        <th>{{__('warrantymodule::insurance.company_account')}}</th>--}}
                                        <th>{{__('warrantymodule::insurance.user_name')}}</th>
                                        <th>{{__('warrantymodule::insurance.phone')}}</th>
{{--                                        <th>{{__('warrantymodule::insurance.email')}}</th>--}}
                                        <th>{{__('warrantymodule::insurance.dummy_text_1')}}</th>
                                        <th>{{__('warrantymodule::insurance.dummy_text_2')}}</th>
{{--                                        <th>{{__('warrantymodule::insurance.dummy_text_3')}}</th>--}}
                                        <th>{{__('warrantymodule::insurance.attachments')}}</th>
                                        <th>{{__('warrantymodule::insurance.usage_date')}}</th>
                                        <th>{{__('warrantymodule::insurance.sent_at')}}</th>
                                        <th>{{__('warrantymodule::insurance.replied_at')}}</th>
                                        <th>{{__('warrantymodule::insurance.status')}}</th>
                                        <th>{{__('warrantymodule::insurance.expire_date')}}</th>
                                        <th>{{__('warrantymodule::warranty.admin')}}</th>
                                        <th>{{__('productmodule::category.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @include('warrantymodule::admin.includes.attachment_modal')

        </div>
    </div>
    <!--  END CONTENT PART  -->
@stop

@section('js')
    @include('commonmodule::includes.swal')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        let dTable = $('#zero-config').DataTable({
            "bProcessing": true,
            "processing": true,
            "serverSide": true,
            "sAjaxSource": "{{url('admin/skudo-insuranceServer?filter='.request()->get('filter').'&date='.request()->get('date'))}}",
            "lengthMenu": [10, 20, 50, 100],
            "pageLength": 50,
            "order": [[ 0, "desc" ]],
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            drawCallback: function (settings) {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    </script>
@endsection


