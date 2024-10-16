<x-app-layout>
@section('content')
<div class="container">
    <h1>Instructors</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('instructors.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search by name, address, or phone" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>

    <!-- Add New Instructor Button -->
    <a href="{{ route('instructors.create') }}" class="btn btn-primary mb-3">Add New Instructor</a>

    <!-- Instructors Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Experience</th>
                <th>Description</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instructors as $instructor)
                <tr>
                    <td>{{ $instructor->name }}</td>
                    <td>
                        @if ($instructor->image)
                            <img src="{{ $instructor->image }}" alt="{{ $instructor->name }}" style="width: 50px; height: 50px;">
                        @endif
                    </td>
                    <td>{{ $instructor->experience }}</td>
                    <td>{{ $instructor->description }}</td>
                    <td>{{ $instructor->address }}</td>
                    <td>{{ $instructor->phone_number }}</td>
                    <td>
                        <a href="{{ route('instructors.edit', $instructor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('instructors.destroy', $instructor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Optional: Pagination -->
    {{-- $instructors->links() --}}
</div>
@endsection
</x-app-layout>