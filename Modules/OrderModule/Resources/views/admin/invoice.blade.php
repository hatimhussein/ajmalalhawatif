<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('ordermodule::admin.invoice')}}</title>
    @include('commonmodule::includes.css')
    <style type="text/css">
        @media only screen and (max-width: 600px) {
            table[class="contenttable"] {
                width: 320px !important;
                border-width: 3px !important;
            }

            table[class="tablefull"] {
                width: 100% !important;
            }

            table[class="tablefull"] + table[class="tablefull"] td {
                padding-top: 0px !important;
            }

            table td[class="tablepadding"] {
                padding: 15px !important;
            }
        }

    </style>
</head>
@if(App::getLocale()=='en')

    <body style="margin:0; border: none; background:#f5f5f5;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
        <tr>
            <td align="center" valign="top">
                <table class="contenttable" border="0" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff"
                       style="border-width: 8px; border-style: solid; border-collapse: separate; border-color:#ececec; margin-top:40px; font-family:sans-serif">
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td bgcolor="#f15a23" align="center"
                                        style="padding:16px 10px; line-height:24px; color:#ffffff; font-weight:bold">
                                        {{__('ordermodule::admin.invoice')}}</td>
                                </tr>
                                <tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="tablepadding"
                            style="border-top:1px solid #eaeaea;border-bottom:1px solid #eaeaea;padding:13px 20px;">
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                <tr>
                                    <td
                                        style="font-size:13px; font-family:sans-serif; color:#676767" align="left">
                                        <span style="color:#707070">{{__('ordermodule::admin.order_id')}}: </span><a
                                            style="outline:none; color:#f15a23; text-decoration:none;"
                                            href="#">{{$order->id}}</a></td>
                                    <td style="font-size:13px; font-family:sans-serif; color:#676767"
                                        align="right"><span
                                            style="color:#707070">{{__('ordermodule::admin.date')}}: </span><span
                                            style="color:#000000;display:inline-block">{{$order->created_at}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size:13px; font-family:sans-serif; color:#676767" align="left">
                                        <span
                                            style="color:#707070">{{__('ordermodule::admin.shipping_time')}}: </span><a
                                            style="outline:none; color:#f15a23; text-decoration:none;"
                                            href="#">{{$order->delivery_time}}</a></td>
                                    <td style="font-size:13px; font-family:sans-serif; color:#676767"
                                        align="right"><span style="color:#707070">{{__('ordermodule::admin.payment_type')}}: </span><span
                                            style="color:#000000;display:inline-block">{{__('ordermodule::payment.'.$order->payment_type)}}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                            <tr>
                                                <td class="tablepadding"
                                                    style="border-bottom:1px solid #eaeaea;padding:13px 20px;font-size:13.5px;text-align:center;line-height:1.5;color:#676767;font-family:sans-serif">
                                                    <table width="100%" cellpadding="0"
                                                           cellspacing="0" border="0">
                                                        <tbody>
                                                        <tr>
                                                            <td><span
                                                                    style="color:#909090"> {{$order->user->first_name . ' ' . $order->user->last_name}} </span>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="tablefull" width="50%" cellpadding="0" cellspacing="0"
                                               border="0" align="left">
                                            <tbody>
                                            <tr>
                                                <td class="tablepadding" style="padding:20px">
                                                    <table width="100%" align="left" cellpadding="0"
                                                           cellspacing="0" border="0">
                                                        <tbody>
                                                        <tr>
                                                            <td
                                                                style="font-size:13.5px; font-family:sans-serif; line-height:1.5;color:#000000;text-align:center">
                                                                <span
                                                                    style="color:#909090">{{__('ordermodule::admin.shipping_address')}}</span><br>
                                                                @if($order->userAddresses->getGovernment!=null)
                                                                    {!! LanguageHelper::nameTranslate($order->userAddresses->getGovernment) !!}
                                                                    /
                                                                @endif
                                                                @if($order->userAddresses->getcity!=null)
                                                                    {!! LanguageHelper::nameTranslate($order->userAddresses->getcity) !!}
                                                                    /
                                                                @endif
                                                                @if($order->userAddresses->getZone!=null)
                                                                    {!! LanguageHelper::nameTranslate($order->userAddresses->getZone) !!}
                                                                    /
                                                            @endif
                                                            {{$order->userAddresses->address}}
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="tablefull" width="50%" cellpadding="0" cellspacing="0"
                                               border="0" align="left">
                                            <tbody>
                                            <tr>
                                                <td class="tablepadding" style="padding:20px">
                                                    <table width="100%" align="left" cellpadding="0"
                                                           cellspacing="0" border="0">
                                                        <tbody>
                                                        <tr>

                                                            <td
                                                                style="font-size:13.5px; font-family:sans-serif; line-height:1.5;color:#000000;text-align:center">
                                                                <span
                                                                    style="color:#909090">{{__('ordermodule::admin.mobile')}} </span><br>
                                                                {{$order->user->phone}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="tablepadding" style="padding:20px;">
                            <table class=""
                                   style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;">
                                <thead>
                                <tr>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:center;padding:7px;color:#222222">
                                        #
                                    </td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">
                                        {{__('ordermodule::admin.product_name')}}</td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:center;padding:7px;color:#222222">
                                        {{__('ordermodule::admin.quantity')}}</td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:center;padding:7px;color:#222222">
                                        {{__('ordermodule::admin.price')}}</td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:center;padding:7px;color:#222222">
                                        {{__('ordermodule::admin.total')}}</td>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($order->products as $product)
                                    <tr>
                                        <td style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:center;padding:7px">{{$product->id}}</td>
                                        <td
                                            style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                                            {{$product->name_en}}</td>
                                        <td
                                            style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:center;padding:7px">
                                            {{$product->pivot->quantity}}</td>
                                        <td
                                            style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:center;padding:7px">
                                            {{$product->pivot->item_price}}</td>
                                        <td
                                            style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                                            {{$product->pivot->item_price * $product->pivot->quantity}} {{$order->order_currency}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4"
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                                        <b>{{__('ordermodule::admin.subtotal')}}:</b></td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                                        {{$order->sub_total}} {{$order->order_currency}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                                        <b>{{__('ordermodule::admin.shipping_cost')}}:</b></td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                                        {{$order->shipping}} {{$order->order_currency}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                                        <b>{{__('ordermodule::admin.discount')}}:</b></td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                                        {{$order->discount}} {{$order->order_currency}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                                        <b>{{__('ordermodule::admin.total')}}:</b></td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                                        {{$order->total}} {{$order->order_currency}}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    </body>
@else
    <body style="margin:0; border: none; background:#f5f5f5">
    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
        <tr>
            <td align="center" valign="top">
                <table class="contenttable" border="0" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff"
                       style="border-width: 8px; border-style: solid; border-collapse: separate; border-color:#ececec; margin-top:40px; font-family:Arial, Helvetica, sans-serif">
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td bgcolor="#f15a23" align="center"
                                        style="padding:16px 10px; line-height:24px; color:#ffffff; font-weight:bold">
                                        {{__('ordermodule::admin.invoice')}}</td>
                                </tr>
                                <tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="tablepadding"
                            style="border-top:1px solid #eaeaea;border-bottom:1px solid #eaeaea;padding:13px 20px;">
                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                <tr>
                                    <td
                                        style="font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#676767"
                                        align="right">
                                        <span style="color:#707070">{{__('ordermodule::admin.order_id')}}: </span><a
                                            style="outline:none; color:#f15a23; text-decoration:none;"
                                            href="#">{{$order->id}}</a></td>
                                    <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#676767"
                                        align="left"><span
                                            style="color:#707070">{{__('ordermodule::admin.date')}}: </span><span
                                            style="color:#000000;display:inline-block">{{$order->created_at}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#676767"
                                        align="right">
                                        <span
                                            style="color:#707070">{{__('ordermodule::admin.shipping_time')}}: </span><a
                                            style="outline:none; color:#f15a23; text-decoration:none;"
                                            href="#">{{$order->delivery_time}}</a></td>
                                    <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#676767"
                                        align="left"><span style="color:#707070">{{__('ordermodule::admin.payment_type')}}: </span><span
                                            style="color:#000000;display:inline-block">{{__('ordermodule::payment.'.$order->payment_type)}}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="tablepadding"
                                                    style="border-bottom:1px solid #eaeaea;padding:13px 20px;font-size:13.5px; font-family:Arial, Helvetica, sans-serif; line-height:1.5;color:#676767">
                                                    <table width="100%" align="center" cellpadding="0"
                                                           cellspacing="0" border="0">
                                                        <tbody>
                                                        <tr>
                                                            <td><span
                                                                    style="color:#909090"> {{$order->user->first_name . ' ' . $order->user->last_name}} </span>
                                                            </td>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="tablefull" width="50%" cellpadding="0" cellspacing="0"
                                               border="0" align="left">
                                            <tbody>
                                            <tr>
                                                <td class="tablepadding" style="padding:20px">
                                                    <table width="100%" align="left" cellpadding="0"
                                                           cellspacing="0" border="0">
                                                        <tbody>
                                                        <tr>
                                                            <td
                                                                style="font-size:13.5px; font-family:Arial, Helvetica, sans-serif; line-height:1.5;color:#000000">
                                                                <span
                                                                    style="color:#909090">{{__('ordermodule::admin.shipping_address')}}</span><br>
                                                                @if($order->userAddresses->getGovernment!=null)
                                                                    {!! LanguageHelper::nameTranslate($order->userAddresses->getGovernment) !!}
                                                                    /
                                                                @endif
                                                                @if($order->userAddresses->getcity!=null)
                                                                    {!! LanguageHelper::nameTranslate($order->userAddresses->getcity) !!}
                                                                    /
                                                                @endif
                                                                @if($order->userAddresses->getZone!=null)
                                                                    {!! LanguageHelper::nameTranslate($order->userAddresses->getZone) !!}
                                                                    /
                                                            @endif
                                                            {{$order->userAddresses->address}}
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="tablefull" width="50%" cellpadding="0" cellspacing="0"
                                               border="0" align="left">
                                            <tbody>
                                            <tr>
                                                <td class="tablepadding" style="padding:20px">
                                                    <table width="100%" align="left" cellpadding="0"
                                                           cellspacing="0" border="0">
                                                        <tbody>
                                                        <tr>

                                                            <td
                                                                style="font-size:13.5px; font-family:Arial, Helvetica, sans-serif; line-height:1.5;color:#000000">
                                                                <span
                                                                    style="color:#909090">{{__('ordermodule::admin.mobile')}} </span><br>
                                                                {{$order->user->phone}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="tablepadding" style="padding:20px;">
                            <table class=""
                                   style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;">
                                <thead>
                                <tr>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:center;padding:7px;color:#222222">
                                        #
                                    </td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">
                                        {{__('ordermodule::admin.product_name')}}</td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:center;padding:7px;color:#222222">
                                        {{__('ordermodule::admin.quantity')}}</td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:center;padding:7px;color:#222222">
                                        {{__('ordermodule::admin.price')}}</td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:center;padding:7px;color:#222222">
                                        {{__('ordermodule::admin.total')}}</td>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($order->products as $product)
                                    <tr>
                                        <td style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:center;padding:7px">{{$product->id}}</td>
                                        <td
                                            style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                                            {{$product->name_en}}</td>
                                        <td
                                            style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:center;padding:7px">
                                            {{$product->pivot->quantity}}</td>
                                        <td
                                            style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:center;padding:7px">
                                            {{$product->pivot->item_price}}</td>
                                        <td
                                            style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                                            {{$product->pivot->item_price * $product->pivot->quantity}} {{$order->order_currency}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4"
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                                        <b>{{__('ordermodule::admin.subtotal')}}:</b></td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                                        {{$order->sub_total}} {{$order->order_currency}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                                        <b>{{__('ordermodule::admin.shipping_cost')}}:</b></td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                                        {{$order->shipping}} {{$order->order_currency}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                                        <b>{{__('ordermodule::admin.discount')}}:</b></td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                                        {{$order->discount}} {{$order->order_currency}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                                        <b>{{__('ordermodule::admin.total')}}:</b></td>
                                    <td
                                        style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                                        {{$order->total}} {{$order->order_currency}}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    </body>
@endif


<script type="text/javascript">
    window.print();

</script>

</html>






