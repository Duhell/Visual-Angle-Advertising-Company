<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .page-break {
            page-break-after: always;
        }

        .w-fit {
            width: fit-content;
        }

        .h-8 {
            height: 2rem;
        }

        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .text-xs {
            font-size: 0.75rem
                /* 12px */
            ;
            line-height: 1rem
                /* 16px */
            ;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-2xl {
            font-size: 1.5rem
                /* 24px */
            ;
            line-height: 2rem
                /* 32px */
            ;
        }

        .w-full {
            width: 100%;
        }

        .overflow-x-auto {
            overflow-x: auto;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;

        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #1d1d1d;
            color: white;
        }

        .pending{
            color: rgb(238, 25, 25);
        }

        .paid{
            color: rgb(87, 202, 87);
        }
    </style>
</head>

<body>
    <div class="w-full">
        <span  class="text-xs font-semibold" style="width: 100%;opacity:.7;">ORDER ID: {{ $customer->OrderTrackNumber }}</span>
        <span class="font-semibold {{ $customer->OrderStatus ? "" : "pending" }}" style="margin-left: 640px;opacity:.7;font-size:12px;">{{ $customer->OrderStatus ? "Paid" : "Pending" }}</span>
        </div>
        <h3 style="margin-block: 1rem;" class="text-2xl">CUSTOMER RECEIPT</h3>

        <div style="margin-bottom: 3rem;">
            <div class="w-full overflow-x-auto">
                <div style="display: flex;justify-content:space-between;align-items:center;width:640px;">
                    <p style="font-weight:600;font-size:1.4rem;">Orders</p>
                </div>
                <table id="customers">
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                    </tr>
                    @foreach ($orders as $order )
                    <tr wire:key='{{ $order->id }}'>
                        <td>{{ $order->Product }}</td>
                        <td>{{ $order->Quantity }}</td>
                        <td>Php {{ $order->Price }}</td>
                        <td>Php {{ $order->SubTotal }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div style="display: flex;justify-content:end;">
            <div style="display:flex;justify-content:end;flex-direction:column;gap:6px;">
                <div style="display: flex; align-items:center; justify-content:space-between;">
                    <span style="font-size: 12px;font-weight:600;">Sub Total:</span>
                    <span style="font-size: 12px;">Php {{ $customer->OrderSubtotal }}</span>
                </div>

                <div style="display: flex; align-items:center; justify-content:space-between;">
                    <span style="font-size: 12px;font-weight:600;">Shipping Fee:</span>
                    <span style="font-size: 12px;">Php {{ $customer->OrderShippingFee }}</span>
                </div>

                <div style="display: flex; align-items:center; justify-content:space-between;">
                    <span style="font-size: 12px;font-weight:600;">Total:</span>
                    <span style="font-size: 12px;">Php {{ $customer->OrderTotal }}</span>
                </div>
            </div>
        </div>

        <div style="margin-block: 3rem;">
            <p class="font-semibold text-sm">Order Information</p>
            <hr>
            <div style="opacity: .8; margin-top:1rem;" class="text-xs font-semibold">
                <p>CUSTOMER: {{ $customer->FullName }}</p>
                <p>LOCATION: {{ $customer->Street }} {{ $customer->City }}, {{ $customer->Province }},{{ $customer->PostCode }},{{ $customer->Country }}</p>
                <p>ORDER DATE: {{ $customer->OrderDate }}</p>
                <br>
            </div>
        </div>

        <hr>
        <p style="font-size:12px; opacity:.7;font-weight:600;">Visual Angle Advertising Company </p>

        {{-- <div class=".page-break ">Thank you for purchasing...</div> --}}
    </div>
</body>

</html>
