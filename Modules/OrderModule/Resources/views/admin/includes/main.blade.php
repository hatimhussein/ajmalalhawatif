<section style="height:100%;">
    <div class="row">
        <div class="col-xl-12 col-lg-11 col-11">
            <div class="statbox widget box box-shadow">
                <div class="row mb-4 mt-3">
                    <label>{{__('ordermodule::admin.user_id')}}</label>
                    <select name="user_id" data-validate-func="required" data-validate-arg="6"
                            id="user_id" class="disabled-results form-control u-info custom-select" required>
                        <option disabled selected value="">{{__('ordermodule::admin.user_id')}}</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">
                                {{($is_merchant == 0) ? $user->first_name.' '.$user->last_name : $user->company_name}}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="user_price" id="user_price">
                </div>
                <div class="row">
                    @include('ordermodule::admin.includes.shipping_address')
                    @include('ordermodule::admin.includes.shipping_methods')
                </div>
            </div>
        </div>
    </div>
</section>
