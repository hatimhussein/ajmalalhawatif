<section style="height:100%;">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="statbox widget box box-shadow">
                @include('ordermodule::admin.includes.order_products')
                <div class="card-body">
                    <h3 data-toggle="collapse" class="btn btn-info" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        {{__('ordermodule::checkout.discount_code')}}
                        <span class="icon-plus plus"></span>
                    </h3>
                    <div class="collapse-block collapse " id="collapseExample">
                        <div class="discount">
                            <div class="discount-form">
                                <label class="coupon-div" for="coupon_code">
                                    {{__('ordermodule::checkout.enter_code')}}
                                </label>
                                <p class="mb-2">
                                    <span class="usr-work-position">
                                        <input class="form-control" id="coupon_code"
                                               type="text" name="coupon_code" value=""
                                               autocomplete="off">
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- preview Modal --}}
<div class="modal fade" id="order-preview-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Checkout</button>
            </div>
        </div>
    </div>
</div>
