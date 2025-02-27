<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <p>Hi {{ $order->firstname }}  {{ $order->lastname }}</p>
    <p>Your order has been successfully placed.</p>
    <br>

    <table style="width: 600px; text-align:right">
        <thead>
            <tr>
                <th style="text-align: center;">Image</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: center;">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
                <tr>
                    <td style="text-align: center;"><img src="{{ asset('assets/imgs/shop') }}/{{ $item->product->image }}" width="100"></td>
                    <td style="text-align: center;">{{ $item->product->name }}</td>
                    <td style="text-align: center;">{{ $item->quantity }}</td>
                    <td style="text-align: center;">${{ $item->price * $item->quantity }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="border-top:1px solid #ccc;"></td>
                <td style="font-size: 15px; font-weight: bold; border-top:1px solid #ccc;text-align: center;">Subtotal : ${{ $order->subtotal }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight: bold;text-align: center;">Tax : ${{ $order->tax }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight: bold;text-align: center;">Shipping : Free Shipping</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 22px; font-weight: bold;text-align: center;">Total : ${{ $order->total }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>