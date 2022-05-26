@extends('commonmodule::layouts.master')

@section('title')
    {{__('warrantymodule::admin.warranty')}}
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
                    <h3>{{__('warrantymodule::admin.warranty')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">{{__('warrantymodule::admin.warranty')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="page-title" style="float:right">
                    <a class="mt-4 btn btn-button-16 mr-2"
                       href="{{route('warranty.export')}}">
                        {{__('productmodule::category.download')}}
                    </a>
                </div>
            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <form
                                        action="{{ route('warranty.index') }}">
                                        <input type="hidden" name="type" value="{{ request()->get('type', 'card') }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="date" name="date" id="date-filter-input"
                                                       class="form-control mb-3"
                                                       value="{{ request()->get('date') }}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="filter" value="all">
                                            {{__('warrantymodule::' . $localeFile . '.all')}}
                                        </button>
                                        <button type="submit" class="btn btn-info" name="filter" value="new">
                                            {{__('warrantymodule::' . $localeFile . '.new')}}
                                        </button>
                                        <button type="submit" class="btn btn-warning" name="filter" value="in_progress">
                                            {{__('warrantymodule::' . $localeFile . '.in_progress')}}
                                        </button>
                                        <button type="submit" class="btn btn-danger" name="filter" value="completed">
                                            {{__('warrantymodule::' . $localeFile . '.completed')}}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>{{__('warrantymodule::' . $localeFile . '.quote_number')}}</th>
                                        @if (request()->get('type', 'card') == 'sms')
                                            <th>{{__('warrantymodule::' . $localeFile . '.user_name')}}</th>
                                            <th>{{__('warrantymodule::' . $localeFile . '.phone')}}</th>
                                            <th>{{__('warrantymodule::' . $localeFile . '.warranty_number')}}</th>
                                        @endif
                                        <th>{{__('warrantymodule::' . $localeFile . '.company_name')}}</th>
                                        <th>{{__('warrantymodule::' . $localeFile . '.company_account')}}</th>
                                        <th>{{__('warrantymodule::' . $localeFile . '.dummy_text_1')}}</th>
                                        <th>{{__('warrantymodule::' . $localeFile . '.dummy_text_2')}}</th>
                                        <th>{{__('warrantymodule::' . $localeFile . '.dummy_text_3')}}</th>
                                        <th>{{__('warrantymodule::insurance.attachments')}}</th>
                                        <th>{{__('warrantymodule::' . $localeFile . '.status')}}</th>
                                        <th>{{__('warrantymodule::' . $localeFile . '.value')}}</th>
                                        <th>{{__('warrantymodule::' . $localeFile . '.usage_date')}}</th>
                                        <th>{{__('warrantymodule::' . $localeFile . '.sent_at')}}</th>
                                        <th>{{__('warrantymodule::' . $localeFile . '.replied_at')}}</th>
                                        <th>{{__('warrantymodule::' . $localeFile . '.admin')}}</th>
                                        <th>{{__('productmodule::category.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($warranties as $warranty)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$warranty->id}}</td>
                                            @if (request()->get('type', 'card') == 'sms')
                                                <td>{{$warranty->user_name}}</td>
                                                <td>{{$warranty->phone_code->code ?? ''}} {{ $warranty->phone }}</td>
                                                <td>
                                                    @if($warranty->insurance)
                                                        <ul class="table-controls">
                                                            <li>
                                                                <a href="javascript: void(0)"
                                                                   onclick="showInsurance('{{$warranty->insurance_id}}')"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Shot">
                                                                    <i class="flaticon-view-1 bg-info p-1 text-white"></i>
                                                                </a>
                                                            </li>
                                                            <li> {{$warranty->insurance_id}}</li>
                                                        </ul>
                                                    @endif
                                                </td>
                                            @endif
                                            <td>{{$warranty->merchant->company_name ?? ''}}</td>
                                            <td>{{$warranty->merchant->account_number ?? ''}}</td>
                                            <td>{{$warranty->dummy_text_1}}</td>
                                            <td>{{$warranty->dummy_text_2}}</td>
                                            <td>{{$warranty->dummy_text_3}}</td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li>
                                                        <a href="javascript: void(0)"
                                                           onclick="showAttachments('{{addslashes($warranty->attachments_str)}}')"
                                                           data-toggle="tooltip" data-placement="top"
                                                           title="Shot">
                                                            <i class="flaticon-view-1 bg-info p-1 text-white"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                @if($warranty->is_applicable == 1)
                                                    <span
                                                        class="badge badge-success">{{__('warrantymodule::' . $localeFile . '.applicable')}}</span>
                                                @elseif($warranty->is_applicable == 2)
                                                    @if(is_null($warranty->seen_at))
                                                        <span
                                                            style="margin-bottom: 10px;" class="badge badge-warning">{{__('warrantymodule::' . $localeFile . '.in_progress')}}</span>
                                                        <span
                                                            style="margin-bottom: 10px;" class="badge badge-info">{{__('warrantymodule::' . $localeFile . '.replay_done')}}</span>
                                                        <span
                                                            class="badge badge-secondary">{{$warranty->read_at}}</span>
                                                    @else
                                                        <span
                                                            style="margin-bottom: 10px;" class="badge badge-warning">{{__('warrantymodule::' . $localeFile . '.in_progress')}}</span>

                                                    @endif

                                                @elseif(is_null($warranty->is_applicable))
                                                    <span
                                                        class="badge badge-info">{{__('warrantymodule::' . $localeFile . '.new')}}</span>
                                                @else
                                                    <span
                                                        class="badge badge-danger">{{__('warrantymodule::' . $localeFile . '.not_applicable')}}</span>
                                                @endif
                                            </td>
                                            <td>{{$warranty->value}} {{ $warranty->currency->name ?? '-' }}</td>

                                            <td>{!! $warranty->usage_date ? $warranty->usage_date->toDateString() . '<br>' . $warranty->usage_date->diffForHumans() : '' !!}</td>
                                            <td>{!! $warranty->created_at ? $warranty->created_at . '<br>' . $warranty->created_at->diffForHumans() : '' !!}</td>
                                            <td>{!! $warranty->replied_at ? $warranty->replied_at . '<br>' . humanReadableDiff($warranty->replied_at, $warranty->created_at) : '' !!}</td>

                                            <td>{{ $warranty->admin->name ?? '-' }}</td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li><a href="{{route('warranty.edit', $warranty->id)}}"
                                                           data-toggle="tooltip" data-placement="top"
                                                           title="Edit"><i
                                                                class="flaticon-edit  bg-success p-1 text-white"></i></a>
                                                    </li>
                                                    <li>
                                                        <form class="inline"
                                                              action="{{ route('warranty.destroy', $warranty->id) }}"
                                                              method="POST">
                                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                            <button class="unst" title="Delete" type="submit"
                                                                    onclick="return confirm('{{__("warrantymodule::admin.delete_warranty")}}')">
                                                                <i class="flaticon-delete  bg-danger p-1 text-white"></i>
                                                            </button>
                                                        </form>
                                                    </li>
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

            @include('warrantymodule::admin.includes.attachment_modal')
            @include('warrantymodule::admin.includes.insurance_modal')

        </div>
    </div>
    <!--  END CONTENT PART  -->
@stop

@section('js')
    @include('commonmodule::includes.swal')

    <script>
        let dTable = $('#zero-config').DataTable({
            "order": [[0, "desc"]],
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


