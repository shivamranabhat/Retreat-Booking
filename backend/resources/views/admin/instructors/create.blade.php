<x-app-layout>
@section('content')
    <h1>Add Instructor</h1>
    <form action="{{ route('instructors.store') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Experience (Years):</label>
            <input type="number" name="experience" value="{{ old('experience') }}">
            @error('experience') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Address:</label>
            <input type="text" name="address" value="{{ old('address') }}">
            @error('address') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Phone Number:</label>
            <input type="text" name="phone_number" value="{{ old('phone_number') }}">
            @error('phone_number') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Add Instructor</button>
    </form>
@endsection
</x-app-layout>