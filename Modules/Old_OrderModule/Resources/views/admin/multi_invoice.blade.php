<!DOCTYPE html>
<html dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;

            -webkit-print-color-adjust: exact !important; /* Chrome, Safari */
            color-adjust: exact !important; /*Firefox*/
        }

        .wrapper {
            margin: 30px 0;
            position: relative;
        }

        .wrapper:before {
            content: ' ';
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0.05;
            background-image: url('/images/img/logo.svg');
            background-repeat: no-repeat;
            background-position: 50% 0;
            background-size: contain;
            z-index: -1;
        }

        /*
        .container {
            max-width: 95%;
            margin: 0 auto;
        }
        */
        header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border: 3px solid #000;
            padding: 5px 20px;
            border-radius: 15px;
        }

        header .header-mid {
            text-align: center;
        }

        header .logo img {
            width: 210px;
            margin: -40px 0 -50px;
        }

        header .header-right {
            text-align: right;
        }

        header .header-left {
            text-align: left;
        }

        header .title {
            margin-bottom: 10px;
        }

        header p {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .client-info, .invoice-bottom-info {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            text-align: right;
            margin: 20px 0;
        }

        .client-info p, .invoice-bottom-info p {
            font-weight: bold;
            margin-bottom: 6px;
        }

        .client-info span, .invoice-bottom-info span {
            font-weight: normal;
        }

        .invoice-bottom-info .barcode {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .invoice-bottom-info .invoice-qty {
            border: 1px solid #000;
            padding: 8px 10px;
        }

        .invoice-bottom-info .invoice-qty p {
            margin-bottom: 0;
        }


        .invoice-table table {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        .invoice-table table td, .invoice-table table th {
            border: 2px solid #000;
            padding: 8px;
            white-space: nowrap;
        }

        .invoice-table table th {
            background-color: #ccc;
            background: #ccc;
        }

        hr {
            border: 1px solid #000;
            margin: 5px 0;
        }

        footer {
            margin-top: 20px;
        }

        footer {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        footer p {
            font-weight: bold;
            margin-bottom: 10px;
        }

        footer .footer-content p:last-child {
            margin-bottom: 0;
        }

        @if(app()->isLocale('en'))
            footer {
            direction: ltr;
        }

        .invoice-bottom-info, .client-info {
            direction: ltr;
            text-align: left;
        }

        .invoice-table {
            direction: ltr;
        }

        .client-info {
            padding-right: 130px;
        }

        .invoice-bottom-info .invoice-qty {
            margin-right: -250px;
        }

        .invoice-bottom-info .info-left {
            margin-right: 40px;
        }

        header {
            direction: rtl;
        }

        @else
            .client-info {
            padding-left: 130px;
        }

        .invoice-bottom-info .invoice-qty {
            margin-left: -250px;
        }

        .invoice-bottom-info .info-left {
            margin-left: 40px;
        }
        @endif
    </style>
    <title>{{__('ordermodule::admin.invoice')}}</title>
</head>

<body>
@foreach($orders as $order)
    <div class="wrapper">
        <div class="container">
            <!-- header -->
            <header>
                <div class="header-right">
                    <h4 class="title">شركة أجمل الهواتف</h4>
                    <p>السجل التجاري: {{ $site_info->where('key', 'commercial_register')->first()->value_ar ?? '' }}</p>
                    <p>الرقم الضريبي: {{ $site_info->where('key', 'tax_number')->first()->value_ar ?? '' }}</p>
                    <p>البريد الالكتروني: sales@ajmalalhwatif.com</p>
                    <p>الموقع: Ajmalalhwatif.com</p>
                </div>
                <div class="header-mid">
                    <div class="logo">
                        <img src="{{ asset('images/img/logo.svg') }}" alt="Logo">
                    </div>
                    <h2>- {{__('ordermodule::invoice.purchase_invoice')}} -</h2>
                </div>
                <div class="header-left">
                    <h4 class="title">AJMAL ALHWATIF.CO</h4>
                    <p>C.R: {{ $site_info->where('key', 'commercial_register')->first()->value_ar ?? '' }}</p>
                    <p>Tax Number: {{ $site_info->where('key', 'tax_number')->first()->value_ar ?? '' }}</p>
                    <p>E-mail: sales@ajmalalhwatif.com</p>
                    <p>website: Ajmalalhwatif.com</p>
                </div>
            </header>

            <!-- client-info -->
            <div class="client-info">
                <div class="info-right">
                    <p>{{__('ordermodule::invoice.customer_name')}}: <span>{{ $order->user->name }}</span></p>
                    <p>{{__('usermodule::admin.phone')}}: <span>{{ $order->user->phone }}</span></p>
                    <p>{{__('usermodule::admin.email')}}: <span>{{ $order->user->email }}</span></p>
                    <p>{{__('usermodule::login.commercial_register')}}:
                        <span>{{ $order->user->commercial_register }}</span></p>
                    <p>{{__('usermodule::login.tax_number')}}: <span>{{ $order->user->tax_number }}</span></p>
                </div>
                <div class="info-mid">
                    <p>{{__('adminmodule::admin.account_number')}}: <span>{{ $order->user->account_number }}</span></p>
                    <p>{{__('ordermodule::invoice.order_number')}}: <span>{{ $order->id }}</span></p>
                    <p>{{__('ordermodule::checkout.payment_method')}}:
                        <span>{{__('ordermodule::payment.'.$order->payment_type)}}</span></p>
                    <p>{{__('adminmodule::admin.date')}}: <span>{{ $order->created_at->format('Y-m-d') }}</span></p>
                    <p>{{__('ordermodule::invoice.time')}}: <span>{{ $order->created_at->format('h:i:s') }}</span></p>
                </div>
                <div class="info-left">
                    <p>{{__('areamodule::area.country')}}: <span>{{ $order->userAddresses->getCountry->name }}</span>
                    </p>
                    <p>{{__('areamodule::area.zone')}}: <span>{{ $order->userAddresses->getZone->name }}</span>
                    </p>
                    <p>{{__('ordermodule::admin.address')}}: <span>{{ $order->userAddresses->address }}</span></p>
                </div>
            </div>

            <!-- invoice-table -->
            <div class="invoice-table">
                <table>
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>{{ __('productfeaturemodule::admin.parcode') }}</th>
                        <th>{{__('productmodule::admin.product_item_number')}}</th>
                        <th>{{__('ordermodule::order.product_name')}}</th>
                        <th>{{__('ordermodule::invoice.unit')}}</th>
                        <th>{{__('ordermodule::order.quantity')}}</th>
                        <th>{{__('productmodule::admin.price')}}</th>
{{--                        <th>{{__('ordermodule::invoice.tax')}}</th>--}}
                        <th>{{__('ordermodule::admin.total')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->item_number  }}</td>
                            <td>
                                <p class="desc-name" style="padding-bottom: 5px; border-bottom: 1px solid #000;">
                                    {{ $product->name_ar }}
                                </p>
                                <p class="desc-name" style="padding-top: 5px;">
                                    {{ $product->name_en }}
                                </p>
                            </td>
                            <td>قطعة</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ $product->pivot->item_price / (1+(($order->tax_percentage ?? 0)/100)) }}</td>
{{--                            <td>{{ $product->pivot->item_price - ($product->pivot->item_price / (1+(($order->tax_percentage ?? 0)/100))) }}</td>--}}
                            <td>{{ $product->pivot->quantity * ($product->pivot->item_price / (1+(($order->tax_percentage ?? 0)/100))) }} {{ $order->currency->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- invoice-bottom-info -->
            <div class="invoice-bottom-info">
                <div class="info-right">
                    <p>{{__('ordermodule::checkout.discount_code')}} :<span>{{ $order->coupon_code }}</span></p>
                    {{--                <p>اسم شركة الشحن / طريقة الاستلام: <span>بروتكشن برو</span></p>--}}
                    {{--                    <p>{{__('usermodule::admin.email')}} :<span>{{ $order->user->email }}</span></p>--}}
                    {{--                <p>رقم الشحنة: <span>{{ $order->ship_number }}</span></p>--}}
                    {{--                <p class="barcode">رقم التتبع : <img src="barcode.jpg" alt="Barcode"></p>--}}
                </div>
                <div class="info-mid">
                    <div class="invoice-qty">
                        <p>{{__('ordermodule::invoice.invoice_quantity')}} :
                            <span>{{ $order->products->sum('pivot.quantity') }} {{__('ordermodule::invoice.piece')}}</span>
                        </p>
                    </div>
                </div>
                <div class="info-left">

                    <?php $tot = $order->sub_total / (1+($order->tax_percentage/100))?>
                    <p>{{__('ordermodule::invoice.total_before_tax')}}:
                        <span>{{ $tot }} {{$order->currency->name}}</span></p>
                    <p>{{__('ordermodule::order.discount')}}: <span>{{ $order->discount }}</span></p>
                    <p>{{__('ordermodule::invoice.gift_wrapping_fee')}}: <span>{{ $order->gift_cost }}</span></p>
                    <p>{{__('ordermodule::invoice.shipping_fee')}}: <span>{{ $order->untaxed_shipping }}</span></p>
                    {{--                <p>رسوم الدفع عند التوصيل: <span>0.00</span></p>--}}
                    <p>{{__('ordermodule::checkout.order_tax')}}:
                        <?php $order_tax = ((((($tot - $order->discount) + $order->untaxed_shipping) * $order->tax_percentage) / 100))  ?>
                        <span>{{ $order_tax}}</span>
                    </p>
                    <?php $end_tot = ((((($tot - $order->discount) + $order->untaxed_shipping) * $order->tax_percentage) / 100) + (($tot - $order->discount) + $order->untaxed_shipping))  ?>
                    <p>{{__('ordermodule::invoice.total_after_tax')}} :
                        <span>{{ $end_tot }} {{$order->currency->name}}</span>
                    </p>
                </div>
            </div>

            <hr>

            <footer>
                <div class="footer-content">
                    <p>{{__('ordermodule::invoice.thanks_message')}}</p>
                    <p>{{__('ordermodule::invoice.unified_number')}}
                        : {{ explode(',', $site_info->where('key', 'hotline')->first()->value_ar)[0] }}</p>
                </div>
            </footer>

        </div>
    </div>
    @if(!$loop->last)
        <hr style="page-break-before: always;opacity: 0;width: 0;height: 0;margin: 0;">
    @endif
@endforeach

</body>


<script type="text/javascript">
    window.print();
</script>

</html>






