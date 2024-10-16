<x-app-layout>
@section('content')
    <h1>Edit Instructor</h1>
    <form action="{{ route('instructors.update', $instructor) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $instructor->name) }}">
            @error('name') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Experience (Years):</label>
            <input type="number" name="experience" value="{{ old('experience', $instructor->experience) }}">
            @error('experience') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Address:</label>
            <input type="text" name="address" value="{{ old('address', $instructor->address) }}">
            @error('address') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Phone Number:</label>
            <input type="text" name="phone_number" value="{{ old('phone_number', $instructor->phone_number) }}">
            @error('phone_number') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Update Instructor</button>
    </form>
@endsection
</x-app-layout>