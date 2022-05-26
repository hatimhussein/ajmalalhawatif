<form class="warranty_form mt-5" action="{{url('admin/update-config-insurance')}}" method="POST">
    @csrf
    @php($parent = $configCategorires->where('key','warranty')->first())
    <input type="hidden" name="category_id" value="{{ $parent->id }}">
    <div class="content">
        <h3>{{__('warrantymodule::warranty.warranty_card')}}: </h3>
        <div class="row flex-row justify-content-center">
            @foreach($parent->where('key','warranty')->first()->configs as $key=>$config)
                @include('configmodule::admin.tabs.warranty_option', ['config' => $config, 'localeFile' => 'warranty'])
            @endforeach
        </div>
    </div>
    <div class="col-xl-12 text-center mb-3 mt-2">
        <button type="submit"
                class="btn btn-md pr-5 pl-5 btn-success">{{__('configmodule::admin.update')}}</button>
    </div>
</form>


<form class="warranty_form mt-5" action="{{url('admin/update-config-insurance')}}" method="POST">
    @csrf
    @php($parent = $configCategorires->where('key','sms_warranty')->first())
    <input type="hidden" name="category_id" value="{{ $parent->id }}">
    <div class="content">
        <h3>{{__('warrantymodule::sms_warranty.sms_warranty')}}: </h3>
        <div class="row flex-row justify-content-center">
            @foreach($parent->configs ?? [] as $key=>$config)
                @include('configmodule::admin.tabs.warranty_option', ['config' => $config, 'localeFile' => 'sms_warranty'])
            @endforeach
        </div>
    </div>
    <div class="col-xl-12 text-center mb-3 mt-2">
        <button type="submit"
                class="btn btn-md pr-5 pl-5 btn-success">{{__('configmodule::admin.update')}}</button>
    </div>
</form>

<form class="warranty_form mt-5" action="{{url('admin/update-config-insurance')}}" method="POST">
    @csrf
    @php($parent = $configCategorires->where('key','insurance')->first())
    <input type="hidden" name="category_id" value="{{ $parent->id }}">
    <div class="content">
        <h3>{{__('warrantymodule::insurance.insurance')}}: </h3>
        <div class="row flex-row justify-content-center">
            @foreach($parent->configs as $key=>$config)
                @include('configmodule::admin.tabs.warranty_option', ['config' => $config, 'localeFile' => 'insurance'])
            @endforeach
        </div>
    </div>
    <div class="col-xl-12 text-center mb-3 mt-2">
        <button type="submit"
                class="btn btn-md pr-5 pl-5 btn-success">{{__('configmodule::admin.update')}}</button>
    </div>
</form>
