<div class="row mb-4 mt-3 parent_select">
    <label>{{__('ordermodule::admin.category')}}</label>
    <select name="parent_id" data-validate-func="required" data-validate-arg="6"
            id="parent_id" class="disabled-results form-control custom-select " required>
        <option disabled selected value="">{{__('ordermodule::admin.category')}}</option>
        @foreach($categories as $category)
            <option
                value="{{$category->id}}">{!! LanguageHelper::nameTranslate($category)!!}</option>
        @endforeach
    </select>

    @if ($errors->has('parent_id'))
        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'parent_id'])
    @endif
</div>
<div class="row mb-4 mt-3" id="product_select">
    <label>{{__('ordermodule::admin.products')}}</label>
    <select name="productSelection" data-validate-func="required" data-validate-arg="6"
            id="productSelection" class="disabled-results form-control custom-select" required>
        <option disabled selected value="">{{__('ordermodule::admin.products')}}</option>

    </select>
</div>

<div class="widget-content" id="product_table">
    <div class="table-responsive">
        <table class="table table-bordered table-hover mb-4" id="Table1">
            <thead>
            <tr>
                <th></th>
                <th>{{__('ordermodule::admin.name')}}</th>
                <th>{{__('ordermodule::admin.combination')}}</th>

                <th>{{__('ordermodule::admin.quantity')}}</th>
                <th>{{__('ordermodule::admin.price')}}</th>


                <th class="text-center"></th>
            </tr>
            </thead>
            <tbody id="products_table">

            </tbody>
        </table>
    </div>
</div>
