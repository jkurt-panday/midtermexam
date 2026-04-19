<div>
    <h2>Student blade</h2>

    {{-- todo sa actions napud --}}

    @if(session('success'))
        <div style="padding: 10px; background: green; color: white;">
        {{-- <div class="p-10 bg-green-400 text-white"> --}}
            {{ session('success') }}
        </div>
    @endif

    {{-- ? EDITING FORM --}}
    @if ($editStudent)
        <h2 class="text-xl font-bold">Edit Student: {{ $editStudent->fname }}</h2>
        <form action="{{ route('students.update', $editStudent) }}" method="POST">
            @csrf
            @method('PUT')

        <label for="student_num">Student NUM:</label>
            <input type="text" name="student_num" id="student_num" value="{{ old('student_num', $editStudent->student_num) }}">
            @error('student_num') <span style="color: red;">{{ $message }}</span> @enderror
            <br>
        
            <label for="fname">First name:</label>
            <input type="text" name="fname" id="fname" value="{{ old('fname', $editStudent->fname) }}">
            @error('fname') <span style="color: red;">{{ $message }}</span> @enderror
            <br>
        
            <label for="mname">Middle name:</label>
            <input type="text" name="mname" id="mname" value="{{ old('mname', $editStudent->mname) }}">
            @error('mname') <span style="color: red;">{{ $message }}</span> @enderror
            <br>

            <label for="lname">Last name:</label>
            <input type="text" name="lname" id="lname" value="{{ old('lname', $editStudent->lname) }}">
            @error('lname') <span style="color: red;">{{ $message }}</span> @enderror
            <br>

            <label for="sname">Suffix name:</label>
            <input type="text" name="sname" id="sname" value="{{ old('sname', $editStudent->sname) }}">
            @error('sname') <span style="color: red;">{{ $message }}</span> @enderror
            <br>
            
            <label for="birthdate">Birthdate:</label>
            <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', $editStudent->birthdate->format('Y-m-d')) }}">
            @error('birthdate') <span style="color: red;">{{ $message }}</span> @enderror
            <br>

            <div class="mt-4">
                <span class="text-gray-700">Gender</span>
                
                <div class="mt-2 space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="gender" value="Male" 
                            {{ old('gender', $editStudent->gender ?? '') == 'Male' ? 'checked' : '' }} 
                            class="form-radio text-blue-600">
                        <span class="ml-2">Male</span>
                    </label>

                    <label class="inline-flex items-center">
                        <input type="radio" name="gender" value="Female" 
                            {{ old('gender', $editStudent->gender ?? '') == 'Female' ? 'checked' : '' }} 
                            class="form-radio text-pink-600">
                        <span class="ml-2">Female</span>
                    </label>

                </div>

                @error('gender')
                    <p class="text-red-500 text-xs mt-1" style="color: red;">{{ $message }}</p>
                @enderror
            </div>
        
            <br>
            <button type="submit">Edit Student</button>
            <a href="{{ route('students.index') }}">Cancel</a>


        </form>

    {{--? ADDING FORM --}}
    @else
        <h2 class="text-xl font-bold">Add New Student</h2>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <label for="student_num">Student NUM:</label>
            <input type="text" name="student_num" id="student_num" value="{{ old('student_num') }}" placeholder="202******">
            @error('student_num') <span style="color: red;">{{ $message }}</span> @enderror
            <br>
        
            <label for="fname">First name:</label>
            <input type="text" name="fname" id="fname" value="{{ old('fname') }}" placeholder="Ex. Adam">
            @error('fname') <span style="color: red;">{{ $message }}</span> @enderror
            <br>
        
            <label for="mname">Middle name:</label>
            <input type="text" name="mname" id="mname" value="{{ old('mname') }}" placeholder="Ex. Jamal">
            @error('mname') <span style="color: red;">{{ $message }}</span> @enderror
            <br>

            <label for="lname">Last name:</label>
            <input type="text" name="lname" id="lname" value="{{ old('lname') }}" placeholder="Ex. Smith">
            @error('lname') <span style="color: red;">{{ $message }}</span> @enderror
            <br>

            <label for="sname">Suffix name:</label>
            <input type="text" name="sname" id="sname" value="{{ old('sname') }}" placeholder="Ex. 'Jr.', 'III'">
            @error('sname') <span style="color: red;">{{ $message }}</span> @enderror
            <br>
            
            <label for="birthdate">Birthdate:</label>
            <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate') }}">
            @error('birthdate') <span style="color: red;">{{ $message }}</span> @enderror
            <br>

            <div class="mt-4">
                <span class="text-gray-700">Gender</span>
                
                <div class="mt-2 space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="gender" value="Male" 
                            {{ old('gender') == 'Male' ? 'checked' : '' }} 
                            class="form-radio text-blue-600">
                        <span class="ml-2">Male</span>
                    </label>

                    <label class="inline-flex items-center">
                        <input type="radio" name="gender" value="Female" 
                            {{ old('gender') == 'Female' ? 'checked' : '' }} 
                            class="form-radio text-pink-600">
                        <span class="ml-2">Female</span>
                    </label>

                </div>

                @error('gender')
                    <p class="text-red-500 text-xs mt-1" style="color: red;">{{ $message }}</p>
                @enderror
            </div>
        
            <br>
            <button type="submit">Add Student</button>
            <a href="{{ route('students.index') }}">Cancel</a>


        </form>
    @endif

        

    <hr>

    <table>
        <thead>
            <tr>
                <td style="border: 1px solid black; padding: 15px">Student NUM</td>
                <td style="border: 1px solid black; padding: 15px">First name</td>
                <td style="border: 1px solid black; padding: 15px">Middle name</td>
                <td style="border: 1px solid black; padding: 15px">Last name</td>
                <td style="border: 1px solid black; padding: 15px">Suffix name</td>
                <td style="border: 1px solid black; padding: 15px">Birthdate</td>
                <td style="border: 1px solid black; padding: 15px">Gender</td>
                <td style="border: 1px solid black; padding: 15px">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->student_num }}</td>
                    <td>{{ $student->fname }}</td>
                    <td>{{ $student->mname }}</td>
                    <td>{{ $student->lname }}</td>
                    <td>{{ $student->sname }}</td>
                    <td>{{ $student->birthdate->format('M d, Y') }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>
                        <a href="{{ route('students.index', ['edit' => $student]) }}">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
