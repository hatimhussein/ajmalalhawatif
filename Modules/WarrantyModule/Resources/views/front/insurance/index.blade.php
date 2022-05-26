@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('warrantymodule::insurance.insurance')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/datatables.css')}}" type="text/css">
@endsection

@section('content')
    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('warrantymodule::insurance.insurance')]])


    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="insurance wow bounceInUp animated col-md-12">
                    <div class="main">
                        <div class="col-main">
                            <div class="cart wow bounceInUp animated my-account warranty-div">
                                <div class="page-title title">
                                    {{--                                    @if(request()->get('q'))--}}
                                    <h2>{{__('warrantymodule::insurance.insurance')}}</h2>
                                    <div class="row mt-5">
                                        <div class="col-md-9 col-sm-8">
                                            <div class="insurance-search-box">
{{--                                                <form action="{{ route('front.insurance.index') }}" method="get">--}}
                                                    <input type="search" name="q" id="insurance-search"
                                                           value="{{ $search }}"
                                                           placeholder="{{ __('warrantymodule::insurance.search_by') }}">
                                                    {{--                                                    <button class="btn btn-info"--}}
                                                    {{--                                                            type="submit">{{ __('usermodule::admin.search') }}</button>--}}
{{--                                                </form>--}}
                                            </div>
                                        </div>
                                        <hr class="mobile-separator">
                                        <div class="col-md-3 col-sm-4">
                                            <div class="corner-buttons">
                                                <a href="{{route('front.insurance.create')}}" class="btn btn-info">
                                                    {{ __('warrantymodule::insurance.add_insurance') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{--                                    @else--}}
                                    {{--                                    <div class="row new-warranty mt-5">--}}
                                    {{--                                        <div class="col-md-4"></div>--}}
                                    {{--                                        <section class="col-md-4">--}}
                                    {{--                                            <div class="main">--}}
                                    {{--                                                <div class="col-main">--}}
                                    {{--                                                    <div class="text-center">--}}
                                    {{--                                                        <h3>--}}
                                    {{--                                                            <b>{{__('warrantymodule::insurance.insurance')}}</b>--}}
                                    {{--                                                        </h3>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                    <div class="card-body">--}}
                                    {{--                                                        <div class="text-center blue">--}}
                                    {{--                                                            <form action="{{ route('front.insurance.index') }}"--}}
                                    {{--                                                                  method="get">--}}
                                    {{--                                                                <input type="search" name="q" id="insurance-search"--}}
                                    {{--                                                                       value="{{ $search }}"--}}
                                    {{--                                                                       placeholder="{{ __('warrantymodule::insurance.search_by') }}">--}}
                                    {{--                                                                <button class="btn btn-info"--}}
                                    {{--                                                                        type="submit">{{ __('usermodule::admin.search') }}</button>--}}
                                    {{--                                                            </form>--}}
                                    {{--                                                        </div>--}}
                                    {{--                                                        <div class="text-center">--}}
                                    {{--                                                            <p>{{ __('warrantymodule::warranty.or') }}</p>--}}
                                    {{--                                                        </div>--}}
                                    {{--                                                        <div class="text-center red">--}}
                                    {{--                                                            <a href="{{ route('front.insurance.create') }}">{{ __('warrantymodule::insurance.add_insurance') }}</a>--}}
                                    {{--                                                        </div>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </section>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    @endif--}}
                                </div>

                                @if($insurances->count())
                                    <div class="table-responsive warranty-table pl-0">
                                        <fieldset>
                                            <table id="insurance-table">
                                                <thead>
                                                <tr class="first last">
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::insurance.quote_number')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::insurance.company_name')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::insurance.company_account')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::insurance.user_name')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::insurance.phone')}}</th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('warrantymodule::insurance.email')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::insurance.dummy_text_1')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::insurance.dummy_text_2')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::insurance.dummy_text_3')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::insurance.usage_date')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::insurance.sent_at')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::insurance.status')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::insurance.expire_date')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::insurance.active_date')}}</th>
                                                    <th colspan="1"
                                                        class="a-center"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($insurances as $insurance)
                                                    <tr class="{{ $insurance->isClosed() ? 'bg-dark' : ($insurance->status == 0 ? 'bg-info' : (($insurance->status == 1) ? 'bg-success': (($insurance->status == 3) ? 'bg-warning':'bg-danger'))) }}">
                                                        <td>{{ $insurance->id }}</td>
                                                        <td>{{ $insurance->merchant->company_name ?? '' }}</td>
                                                        <td>{{ $insurance->merchant->account_number ?? '' }}</td>
                                                        <td>{{ $insurance->user_name }}</td>
                                                        <td>{{ $insurance->phone ? ($insurance->phone_code->code ?? '') : '' }} {{ $insurance->phone }}</td>
                                                        <td>{{ $insurance->email }}</td>
                                                        <td>{{ $insurance->dummy_text_1 }}</td>
                                                        <td>{{ $insurance->dummy_text_2 }}</td>
                                                        <td>{{ $insurance->dummy_text_3 }}</td>
                                                        <td>{{ $insurance->usage_date ? $insurance->usage_date->diffForHumans() : '' }}</td>
                                                        <td>{{ $insurance->created_at ? $insurance->created_at->diffForHumans() : '' }}</td>
                                                        <td>
                                                            @if ($insurance->isClosed())
                                                                <span disabled
                                                                      class="btn btn-dark">{{__('warrantymodule::insurance.closed')}}</span>
                                                            @else
                                                                @if($insurance->status == 1)
                                                                    <span disabled
                                                                          class="btn btn-success">{{__('warrantymodule::insurance.activated')}}</span>
                                                                @elseif($insurance->status == 3)
                                                                    <span disabled
                                                                          class="btn btn-warning">{{__('warrantymodule::warranty.in_progress')}}</span>
                                                                @elseif($insurance->status == 0)
                                                                    <button
                                                                        {{ $insurance->store_reason ? '' : 'disabled' }}
                                                                        class="btn btn-info {{ $insurance->store_reason ? 'reason-details' : '' }}"
                                                                        data-reason="{{ $insurance->store_reason }}">{{__('warrantymodule::insurance.pending')}}</button>
                                                                @else
                                                                    <span
                                                                        class="btn btn-danger reason-details"
                                                                        data-reason="{{ $insurance->reason }}">{{__('warrantymodule::insurance.rejected')}}</span>
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>{{ ($insurance->status == 1 && $insurance->expire_date) ? $insurance->expire_date->format('Y-m-d') : '-' }}</td>
                                                        <td>
                                                            {{ ($insurance->status == 1 && $insurance->replied_at) ? $insurance->replied_at->format('Y-m-d') : '-' }}
                                                        </td>
                                                        <td class="a-center last">
                                                            <ul class="warranty-actions">
                                                                <li>
                                                                    <a class="btn btn-info a-button p-0"
                                                                       href="{{ route('front.insurance.show', $insurance->id) }}"
                                                                       title="{{__('ordermodule::order.order_details')}}">
                                                                        <i class="icon-eye-open"></i>
                                                                    </a>
                                                                </li>
                                                                @if($insurance->status == 3 && !$insurance->isClosed())
                                                                    <li>
                                                                        <a class="btn btn-danger a-button p-0"
                                                                           href="{{ route('front.insurance.edit', $insurance->id)}}">
                                                                            <i class="icon-pencil"></i>
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </fieldset>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-center">{{__('warrantymodule::insurance.no_result')}}</h3>
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

    <div class="modal fade" id="reason-modal" tabindex="-1" role="dialog" aria-labelledby="reasonModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 id="reason-body" class="text-center">

                    </h3>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}"></script>

    <script>
        $('.reason-details').click(function () {
            const reason = $(this).data('reason');

            $('#reason-modal #reason-body').text(reason);
            $('#reason-modal').modal('show');
        })
    </script>

    <script>
        const dtTable = $('#insurance-table').DataTable({
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
                {searchable: false, orderable: false},
            ]
        });

        $('#insurance-search').on('keyup', function () {
            dtTable.search(this.value).draw();
        });
    </script>

@endsection
