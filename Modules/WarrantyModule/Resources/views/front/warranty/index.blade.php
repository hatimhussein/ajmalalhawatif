@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('commonmodule::front.warranty')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/datatables.css')}}" type="text/css">
@endsection


@section('content')


    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]])


    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class=" wow bounceInUp animated col-md-12">
                    <div class="main">
                        <div class="col-main">
                            <div class="cart wow bounceInUp animated my-account warranty-div">
                                <div class="page-title title">
                                    <h2>{{__('commonmodule::front.warranty')}}</h2>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="corner-buttons">
                                            <a href="{{route('front.warranty.new')}}" class="btn btn-info">
                                                {{ __('warrantymodule::warranty.request_warranty') }}
                                            </a>
                                        </div>
                                        {{--                                        <form method="GET">--}}
                                        <div class="form-group mb-0">
                                            <small>{{ __('ordermodule::admin.search') }}</small>
                                            <input type="text" class="form-control" name="q"
                                                   id="warranty-search" value="{{ request()->get('q') }}">
                                        </div>
                                        {{--                                        </form>--}}
                                    </div>
                                </div>

                                @if(count($warranties) > 0)
                                    <div class="table-responsive warranty-table pl-0">
                                        <fieldset>
                                            <table id="warranty-table">
                                                <thead>
                                                <tr class="first last">
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.quote_number')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.warranty_type')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.user_name')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.phone')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.company_name')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.company_account')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.dummy_text_1')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.dummy_text_2')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.dummy_text_3')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.usage_date')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::warranty.sent_at')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::warranty.status')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::warranty.value')}}</th>
                                                    <th colspan="1" class="a-center"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($warranties as $warranty)
                                                    <tr class="first odd {{ is_null($warranty->is_applicable) ? 'bg-info' : (($warranty->is_applicable == 2) ? 'bg-warning': (($warranty->is_applicable == 1) ? 'bg-success':'bg-danger')) }}">
                                                        <td class="a-center">
                                                            <span>{{$warranty->id}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{!! __('warrantymodule::warranty.'.$warranty->type??'card', ['phone' => '<br>' . $warranty->phone]) !!}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$warranty->user_name}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$warranty->phone_code->code ?? ''}} {{$warranty->phone}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$warranty->merchant->company_name}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$warranty->merchant->account_number}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$warranty->dummy_text_1}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$warranty->dummy_text_2}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$warranty->dummy_text_3}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$warranty->usage_date ? $warranty->usage_date->toDateString() : ''}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$warranty->created_at}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>
                                                                  @if($warranty->is_applicable == 1)
                                                                    {{ __('warrantymodule::warranty.applicable') }}
                                                                @elseif($warranty->is_applicable == 2)
                                                                    {{ __('warrantymodule::warranty.in_progress') }}
                                                                @elseif(is_null($warranty->is_applicable))
                                                                    {{ __('warrantymodule::warranty.new') }}
                                                                @else
                                                                    {{ __('warrantymodule::warranty.not_applicable') }}
                                                                @endif
                                                            </span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$warranty->value}} {{LanguageHelper::nameTranslate($warranty->currency)}}</span>
                                                        </td>

                                                        <td class="a-center last">
                                                            <ul class="warranty-actions">
                                                                <li>
                                                                    <a class="btn btn-info a-button p-0"
                                                                       href="{{ route('front.warranty.show', $warranty->id) }}"
                                                                       title="{{__('ordermodule::order.order_details')}}">
                                                                        <i class="icon-eye-open"></i>
                                                                    </a>
                                                                </li>
                                                                @if($warranty->is_applicable == 2 && $warranty->user_id == auth()->id())
                                                                    <li>
                                                                        <a class="btn btn-danger a-button p-0"
                                                                           href="{{ route('front.warranty.edit', $warranty->id) }}">
                                                                            <i class="icon-pencil"></i>
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </fieldset>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-center">{{__('ordermodule::order.no_orders')}}</h3>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    </div>
    <!--End main-container -->

@stop

@section('js')
    <script src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}"></script>

    <script>
        const dtTable = $('#warranty-table').DataTable({
            order: [[0, "desc"]],
            lengthMenu: [100, 50, 20, 10],
            language: {
                paginate: {
                    previous: '<i class="glyphicon glyphicon-circle-arrow-left"></i>',
                    next: '<i class="glyphicon glyphicon-circle-arrow-right"></i>'
                },
                // info: "Showing page _PAGE_ of _PAGES_"
                info: ""
            },
            dom: 't',
            columns: [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,

                {searchable: false, orderable: false},
                {searchable: false, orderable: false},

                null,

                {searchable: false, orderable: false},
                {searchable: false, orderable: false},
            ]
        });

        $('#warranty-search').on('keyup', function () {
            dtTable.search(this.value).draw();
        });
    </script>
@endsection
