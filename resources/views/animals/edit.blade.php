<div>
    <h2>Edit Animal Record: {{ $animal->name }}</h2>
    
    <form action="{{ route('animals.update', $animal) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $animal->name) }}">
            @error('name') <span style="color: red;">{{ $message }}</span> @enderror
        <br>

        <label for="species">Species:</label>
        <input type="text" name="species" id="species" value="{{ old('species', $animal->species) }}">
            @error('species') <span style="color: red;">{{ $message }}</span> @enderror
        <br>

        <label for="age">Age:</label>
        <input type="text" name="age" id="age" value="{{ old('age', $animal->age) }}">
            @error('age') <span style="color: red;">{{ $message }}</span> @enderror
        <br>

        <label for="habitat">Habitat:</label>
        <input type="text" name="habitat" id="habitat" value="{{ old('habitat', $animal->habitat) }}">
            @error('habitat') <span style="color: red;">{{ $message }}</span> @enderror
        <br>
        <br>

        <button type="submit">Add new animal</button>
        <a href="{{ route('animals.index') }}">Cancel</a>

    </form>

</div>
