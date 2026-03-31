<div class="container">
    <div class=" widget-content widget-content-area">
        <div class="col-12">
            <div class="layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="statbox widget box box-shadow">
                                                <label for="quote_number">
                                                    {{__('warrantymodule::insurance.quote_number')}}:
                                                </label>
                                                <input type="text" readonly id="quote_number"
                                                       class="form-control"
                                                       value="{{ $insurance->id }}">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="company_name">
                                                    <b>{{__('warrantymodule::insurance.company_name')}}:</b>
                                                </label>
                                                <input type="text" readonly id="company_name"
                                                       class="form-control"
                                                       value="{{ $insurance->merchant->company_name ?? '' }}">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="company_account">
                                                    <b>{{__('warrantymodule::insurance.company_account')}}:</b>
                                                </label>
                                                <input type="text" readonly id="company_account"
                                                       class="form-control"
                                                       value="{{ $insurance->merchant->account_number ?? '' }}">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="created_at">
                                                    <b>{{__('warrantymodule::insurance.sent_at')}}:</b>
                                                </label>
                                                <input type="date" readonly id="created_at"
                                                       class="form-control"
                                                       value="{{ $insurance->created_at ? $insurance->created_at->toDateString() : '' }}">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="user_notes">
                                                    {{__('warrantymodule::insurance.user_notes')}}:
                                                </label>
                                                <textarea readonly id="user_notes" rows="4"
                                                          class="form-control">{{ $insurance->user_notes }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="statbox widget box box-shadow">
                                                <label for="usage_date">
                                                    {{__('warrantymodule::insurance.usage_date')}}:
                                                </label>
                                                <input type="date" readonly id="usage_date"
                                                       class="form-control"
                                                       value="{{ $insurance->usage_date ? $insurance->usage_date->toDateString() : '' }}">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="user_name">
                                                    <b>{{__('warrantymodule::insurance.user_name')}}:</b>
                                                </label>
                                                <input type="text" readonly id="user_name"
                                                       class="form-control"
                                                       value="{{ $insurance->user_name }}">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="phone">
                                                    <b>{{__('warrantymodule::insurance.phone')}}:</b>
                                                </label>
                                                <input type="text" readonly id="phone"
                                                       class="form-control"
                                                       value="{{ $insurance->phone ? ($insurance->phone_code->code ?? '') : '' }} {{ $insurance->phone }}">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="email">
                                                    <b>{{__('warrantymodule::insurance.email')}}:</b>
                                                </label>
                                                <input type="text" readonly id="email"
                                                       class="form-control"
                                                       value="{{ $insurance->email }}">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="dummy_text_1">
                                                    <b>{{__('warrantymodule::insurance.dummy_text_1')}}:</b>
                                                </label>
                                                <input type="text" readonly id="dummy_text_1"
                                                       class="form-control"
                                                       value="{{ $insurance->dummy_text_1 }}">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="dummy_text_2">
                                                    <b>{{__('warrantymodule::insurance.dummy_text_2')}}:</b>
                                                </label>
                                                <input type="text" readonly id="dummy_text_2"
                                                       class="form-control"
                                                       value="{{ $insurance->dummy_text_2 }}">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="dummy_text_3">
                                                    <b>{{__('warrantymodule::insurance.dummy_text_3')}}:</b>
                                                </label>
                                                <input type="text" readonly id="dummy_text_3"
                                                       class="form-control"
                                                       value="{{ $insurance->dummy_text_3 }}">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-xl-4 col-lg-4 col-12">
                            <form class="col-12">
                                <div class="row mt-3">

                                    <div class="col-md-12 text-center">
                                        <h2 class="legend">{{__('warrantymodule::insurance.status')}}
                                            <i class="flaticon-file"></i>
                                        </h2>
                                    </div>

                                    <div class="col-lg-12 text-center mb-4">
                                        <div class="statbox widget box box-shadow">
                                            <div class="switch-toggle switch-2 switch-candy w-100 mt-4">
                                                @if($insurance->isClosed())
                                                    <input id="closed" class="status-switch"
                                                           name="status" type="radio" disabled checked/>
                                                    <label
                                                        for="closed">{{__('warrantymodule::insurance.closed')}}</label>

                                                    <input id="applicable" class="status-switch"
                                                           name="status" type="radio" value="1" disabled/>
                                                    <label
                                                        for="applicable">{{__('warrantymodule::insurance.activated')}}</label>
                                                @else
                                                    <input id="applicable" class="status-switch"
                                                           name="status" type="radio" value="1" disabled
                                                        {{ $insurance->status == 1 ? 'checked' : '' }}/>
                                                    <label
                                                        for="applicable">{{__('warrantymodule::insurance.activated')}}</label>

                                                    <input id="pending" class="status-switch"
                                                           name="status" type="radio" value="0" disabled
                                                        {{ $insurance->status == 0 ? 'checked' : '' }}/>
                                                    <label
                                                        for="pending">{{__('warrantymodule::admin.pending')}}</label>

                                                    <input id="not_applicable" class="status-switch"
                                                           name="status" type="radio" value="2" disabled
                                                        {{ $insurance->status === 2 ? 'checked' : '' }}/>
                                                    <label
                                                        for="not_applicable">{{__('warrantymodule::insurance.rejected')}}</label>
                                                @endif

                                                <a></a>
                                            </div>
                                        </div>
                                    </div>

                                    @if($insurance->isClosed())
                                        @if($insurance->isUsed())
                                            <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                                 style="{{ $insurance->status == 1 ? '' : 'display: none' }}">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="replied_at">
                                                        {{__('warrantymodule::sms_warranty.sms_warranty')}}:
                                                    </label>
                                                    <input type="text" disabled
                                                           value="{{ $insurance->getRespondedWarranty()->first()->id }}"
                                                           class="form-control" autocomplete="off">
                                                </div>
                                                <div class="statbox widget box box-shadow">
                                                    <label for="replied_at">
                                                        {{__('warrantymodule::sms_warranty.status')}}:
                                                    </label>
                                                    <input type="text" disabled
                                                           value="{{ __('warrantymodule::sms_warranty.'.$insurance->getRespondedWarranty()->first()->status_locale) }}"
                                                           class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                                 style="{{ $insurance->status == 1 ? '' : 'display: none' }}">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="replied_at">
                                                        {{__('warrantymodule::insurance.replied_at')}}:
                                                    </label>
                                                    <input name="replied_at" id="replied_at" type="date"
                                                           readonly
                                                           disabled
                                                           value="{{ $insurance->replied_at ? $insurance->replied_at->toDateString() : '' }}"
                                                           class="form-control" autocomplete="off">
                                                </div>

                                                <div class="statbox widget box box-shadow">
                                                    <label for="application_number">
                                                        {{__('warrantymodule::insurance.expire_date'),':'}}
                                                    </label>
                                                    <input name="expire_date" id="expire_date" type="date"
                                                           readonly
                                                           disabled
                                                           value="{{ $insurance->expire_date ? $insurance->expire_date->toDateString() : '' }}"
                                                           class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                             style="{{ $insurance->status == 1 ? '' : 'display: none' }}">
                                            <div class="statbox widget box box-shadow">
                                                <label for="replied_at">
                                                    {{__('warrantymodule::insurance.replied_at')}}:
                                                </label>
                                                <input name="replied_at" id="replied_at" type="date" readonly
                                                       disabled
                                                       value="{{ $insurance->replied_at ? $insurance->replied_at->toDateString() : '' }}"
                                                       class="form-control" autocomplete="off">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="application_number">
                                                    {{__('warrantymodule::insurance.expire_date'),':'}}
                                                </label>
                                                <input name="expire_date" id="expire_date" type="date" readonly
                                                       disabled
                                                       value="{{ $insurance->expire_date ? $insurance->expire_date->toDateString() : '' }}"
                                                       class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4 input-control status-tab"
                                             id="store-reason-cont"
                                             style="{{ $insurance->status == 0 ? '' : 'display: none' }}">
                                            <div class="statbox widget box box-shadow">
                                                <label for="store_reason">
                                                    {{__('warrantymodule::insurance.store_reason')}}:
                                                </label>
                                                <textarea name="store_reason" id="store_reason" class="form-control"
                                                          data-validate-func="{{ is_null($insurance->is_applicable) ? 'required' : '' }}"
                                                          data-validate-arg="6" readonly
                                                          data-validate-hint="{{__('warrantymodule::admin.rreaseon')}} "
                                                          placeholder="{{__('warrantymodule::insurance.store_reason')}}"
                                                          rows="2">{{  $insurance->store_reason }}</textarea>
                                                @if ($errors->has('store_reason'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'store_reason'])
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4 input-control status-tab"
                                             id="reason-cont"
                                             style="{{ ($insurance->status == 2) ? '' : 'display: none' }}">
                                            <div class="statbox widget box box-shadow">
                                                <label for="reason">
                                                    {{__('warrantymodule::insurance.reason')}}:
                                                </label>
                                                <textarea name="reason" id="reason" class="form-control"
                                                          data-validate-func="{{ ($insurance->is_applicable === 0) ? 'required' : '' }}"
                                                          data-validate-arg="6" readonly
                                                          data-validate-hint="{{__('warrantymodule::admin.rreaseon')}} "
                                                          placeholder="{{__('warrantymodule::insurance.reason')}}"
                                                          rows="2">{{  $insurance->reason }}</textarea>
                                                @if ($errors->has('reason'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'reason'])
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <h2 class="legend">{{__('usermodule::admin.attachment')}}
                                <i class="flaticon-attachment"></i>
                            </h2>
                        </div>
                        @php
                            $notAvailable = __('skudomodule::insurance.image_not_available');
                            $attachments = [
                                [
                                    'label' => 'صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي)',
                                    'media' => $insurance->front_image,
                                ],
                                [
                                    'label' => __('skudomodule::insurance.device_back_image'),
                                    'media' => $insurance->device_back_image,
                                ],
                                [
                                    'label' => __('skudomodule::insurance.back_image'),
                                    'media' => $insurance->back_image,
                                ],
                                [
                                    'label' => 'صورة الفاتورة',
                                    'media' => $insurance->invoice_image,
                                ],
                            ];
                        @endphp

                        @foreach($attachments as $att)
                            <div class="col-lg-6 mb-3">
                                <label>{{ $att['label'] }}</label>
                                <div class="custom-file-container__image-preview product-list-img">
                                    @if(!empty($att['media']))
                                        @if(is_video($att['media']))
                                            <video controls style="width: 100%; max-height: 300px;">
                                                <source src="{{asset('images/warranty/'.$att['media'])}}" type="video/mp4">
                                                <source src="{{asset('images/warranty/'.$att['media'])}}" type="video/quicktime">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <img src="{{asset('images/warranty/'.$att['media'])}}" alt=""/>
                                        @endif
                                    @else
                                        <div class="text-muted text-center py-4" style="width: 100%;">{{ $notAvailable }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        {{-- warranty_image intentionally not shown for Skudo insurance to match client UI --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




