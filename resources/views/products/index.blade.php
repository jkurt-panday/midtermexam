<div>
    <h1>Products Index</h1>

    @if(session('success'))
        <div style="padding: 10px; background: green; color: white;">
        {{-- <div class="p-10 bg-green-400 text-white"> --}}
            {{ session('success') }}
        </div>
    @endif

    <h2>Products form</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
    
        <label for="product">Product:</label>
        <input type="text" name="product" id="product" value="{{ old('product') }}">
        @error('product') <span style="color: red;">{{ $message }}</span> @enderror
        <br>
    
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}">
        @error('description') <span style="color: red;">{{ $message }}</span> @enderror
        <br>
    
        <label for="unit">Unit:</label>
        <input type="number" name="unit" id="unit" value="{{ old('unit') }}">
        @error('unit') <span style="color: red;">{{ $message }}</span> @enderror
        <br>
    
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ old('price') }}">
        @error('price') <span style="color: red;">{{ $message }}</span> @enderror
        <br><br>
    
        <button type="submit">Add Product</button>
        <a href="{{ route('products.index') }}">Cancel</a>
    </form>
    
    {{-- display products --}}

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->unit }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}">Show</a>
                        <a href="{{ route('products.edit', $product) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?!')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>