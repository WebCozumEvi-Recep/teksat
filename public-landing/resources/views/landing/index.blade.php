<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $product->name ?? 'Product' }} | {{ $domain->domain ?? '' }}</title>
  <style>
    body { font-family: Inter, Arial, sans-serif; margin: 0; background: #F5F7F8; color: #111827; }
    .container { max-width: 920px; margin: 24px auto; padding: 24px; background: white; border-radius: 14px; }
    .btn { display: inline-block; background: #0B7A33; color: white; padding: 12px 18px; border-radius: 10px; text-decoration: none; }
  </style>
</head>
<body>
  <div class="container">
    <h1>{{ $product->name ?? 'Product' }}</h1>
    <p>{{ $product->description ?? 'Single-product landing page.' }}</p>
    <strong>Price: {{ number_format($product->price ?? 0, 2) }}</strong>
    <div style="margin-top:16px">
      <a class="btn" href="#order">Order with Cash on Delivery</a>
    </div>
  </div>
</body>
</html>
