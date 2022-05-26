




<div class="tab-pane fade {{$complete=='incomplete'?'show active':''}}" id="justify-pills-incomplete" role="tabpanel" aria-labelledby="justify-pills-messages-tab">
    <div class="row margin-bottom-120">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>{{__('usermodule::admin.incomplete')}} </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <form class="bulk-form" action="{{ route('SuggestionsOperations') }}" method="post">
                                @csrf
                                <input type="hidden" name="method" value="">
                                <input type="hidden" name="ids" value="">
                                <button type="submit" class="btn btn-success bulk-btn" value="complete"
                                        disabled>{{__('usermodule::admin.complete')}}</button>

                                <button type="submit" class="btn btn-danger bulk-btn" value="incomplete"
                                        disabled>{{__('usermodule::admin.incomplete')}}</button>
{{--                                <button type="submit" class="btn btn-success bulk-btn" value="show"--}}
{{--                                        disabled>{{__('usermodule::admin.show')}}</button>--}}
{{--                                <button type="submit" class="btn btn-danger bulk-btn" value="hide"--}}
{{--                                        disabled>{{__('usermodule::admin.hide')}}</button>--}}
                                <button type="submit" class="btn btn-danger bulk-btn" value="delete"
                                        disabled>{{__('productmodule::admin.delete')}}</button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="widget-content widget-content-area">
                    <div class=" mb-4">
                        <table id="ecommerce-product-list2" class="table table-hover  table-bordered text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><input type="checkbox" class="table-select-all"></th>

                                <th>{{__('usermodule::admin.name')}}</th>
                                <th>{{__('usermodule::admin.phone')}}</th>
                                <th>{{__('fronthomemodule::suggestion.subject')}}</th>
                                <th>{{__('usermodule::admin.date')}}</th>
                                <th>{{__('usermodule::admin.numbersugg')}} {{__('usermodule::admin.'.$type) }}</th>
                                <th class="align-center">{{__('usermodule::admin.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts->where('complete',0) as $contact)
                                <tr>
                                    <td>{{$contact->id}}</td>
                                    <td>
                                        <input type="checkbox" class="table-select"
                                               name="ids[]" value="{{$contact->id}}">
                                    </td>
                                    <td>{{$contact->name}} </td>
                                    <td>{{$contact->phone}}</td>
                                    <td>{{$contact->subject}}</td>
                                    <td>{{$contact->created_at}}</td>
                                    <td>{{$contact->generate}}</td>

                                    <td class="align-center">
                                        <ul class="table-controls">

                                            <li >
                                                <a href="{{url('admin/show-suggestion/id/'.$contact->id)}}"
                                                   class="mod btn  p-0">
                                                    <i class="flaticon-view  bg-info p-1 text-white br-6"></i>
                                                </a>
                                            </li>
                                            @if($contact->complete == 0)
                                            <li>
                                                <button {{$contact->reply_type==1?'disabled':''}} type="button" class="mod btn  p-0" data-toggle="modal"
                                                        data-name="{{$contact->name}}" data-phone="{{$contact->phone}}" data-email="{{$contact->email}}"
                                                        data-id="{{$contact->id}}" data-type="شكوى" data-created_at="{{$contact->created_at}}"  data-target="#exampleModalCenter">
                                                    <i class="flaticon-reply  bg-info p-1 text-white br-6"></i>
                                                </button>
                                            </li>
                                            @endif
                                            <li>
                                                <a href="{{url('admin/delete-suggestion/id/'.$contact->id)}}"
                                                   class="mod btn btn-danger p-0">
                                                    <i class="flaticon-delete   bg-danger p-1 text-white br-6"></i>
                                                </a>
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

</div>
