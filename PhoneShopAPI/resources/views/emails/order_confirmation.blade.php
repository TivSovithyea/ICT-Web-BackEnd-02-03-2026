<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Thank you for your order!</h2>
    <p>Hi {{ $order->user->username ?? 'Customer' }},</p>
    <p>Your order (ID: {{ $order->id }}) has been successfully placed on {{ $order->date }}.</p>
    <h3>Order Details:</h3>
    <ul>
        @foreach($order->details as $item)
            <li>Product ID: {{ $item->product_id }} | Qty: {{ $item->quantity }} | Price: ${{ $item->price }}</li>
        @endforeach
    </ul>
    <p><strong>Discount Applied:</strong> ${{ $order->discount }}</p>
    <p><strong>Payment Status:</strong> {{ $order->payment_status }}</p>
    <p><strong>Remarks:</strong> {{ $order->remarks }}</p>
</body>
</html>
