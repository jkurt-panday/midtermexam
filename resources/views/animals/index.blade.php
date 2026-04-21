<div>
    <h2>Zoo</h2>

    <a href="{{ route('animals.create') }}">Add new animals</a><br>

    @if(session('success'))
        <div style="padding: 10px; background: green; color: white;">
        {{-- <div class="p-10 bg-green-400 text-white"> --}}
            {{ session('success') }}
        </div>
    @endif

    <hr>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Species</th>
                <th>Age</th>
                <th>Habitat</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($animals as $animal)
                <tr>
                    <td>{{ $animal->name }}</td>
                    <td>{{ $animal->species }}</td>
                    <td>{{ $animal->age }}</td>
                    <td>{{ $animal->habitat }}</td>
                    <td>
                        <a href="{{ route('animals.show', $animal) }}">Show</a>
                        <a href="{{ route('animals.edit', $animal) }}">Edit</a>
                        <form action="{{ route('animals.destroy', $animal) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
