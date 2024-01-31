<!DOCTYPE html>
<html>

<head>
    <title>Payment Receipt</title>
</head>

<body>

    <h2>Payment Receipt</h2>

    <p><strong>Transaction ID:</strong> {{ $data['transaction_id'] }}</p>

    <h3>Products:</h3>
    @foreach ($data['products'] as $product)
    <p><strong>Name:</strong> {{ $product['name'] }}, <strong>Price:</strong> ${{ $product['price'] }}</p>
    @endforeach

    <p><strong>Total Price:</strong> ${{ $data['total_price'] }}</p>

</body>

</html>