<div>
    <h2>Products form</h2>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
    
        <label for="product">Product:</label>
        <input type="text" name="product" id="product" value="{{ old('product', $product->product) }}">
        @error('product') <span style="color: red;">{{ $message }}</span> @enderror
        <br>
    
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="{{ old('description', $product->description) }}">
        @error('description') <span style="color: red;">{{ $message }}</span> @enderror
        <br>
    
        <label for="unit">Unit:</label>
        <input type="number" name="unit" id="unit" value="{{ old('unit', $product->unit) }}">
        @error('unit') <span style="color: red;">{{ $message }}</span> @enderror
        <br>
    
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}">
        @error('price') <span style="color: red;">{{ $message }}</span> @enderror
        <br><br>
    
        <button type="submit">Update Product</button>
        <a href="{{ route('products.index') }}">Cancel</a>
    </form>
</div>