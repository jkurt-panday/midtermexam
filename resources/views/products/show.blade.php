<div>
    <h1>{{ $product->product }}</h1>
    <h2>{{ $product->description }}</h2>
    <h2>{{ $product->unit }}</h2>
    <h2>{{ $product->price }}</h2>
    <hr>
    <br>
    <a href="{{ route('products.index') }}">Back to Index</a>
</div>
