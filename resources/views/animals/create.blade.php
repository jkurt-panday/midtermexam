<div>
    <h2>Add New Animal Record</h2>

    <form action="{{ route('animals.store') }}" method="POST">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name') <span style="color: red;">{{ $message }}</span> @enderror
        <br>

        <label for="species">Species:</label>
        <input type="text" name="species" id="species" value="{{ old('species') }}">
            @error('species') <span style="color: red;">{{ $message }}</span> @enderror
        <br>

        <label for="age">Age:</label>
        <input type="text" name="age" id="age" value="{{ old('age') }}">
            @error('age') <span style="color: red;">{{ $message }}</span> @enderror
        <br>

        <label for="habitat">Habitat:</label>
        <input type="text" name="habitat" id="habitat" value="{{ old('habitat') }}">
            @error('habitat') <span style="color: red;">{{ $message }}</span> @enderror
        <br>
        <br>

        <button type="submit">Add new animal</button>
        <a href="{{ route('animals.index') }}">Cancel</a>

    </form>

</div>
