<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Create Location</h4>
                        </div>
                        <div class="back">
                            <a href="{{ route('locations') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('location.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Location Name Input -->
                            <div class="form-outline mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Image and Image Alt Input with Preview -->
                            <div class="form-outline mb-3">
                                <div id="image-preview-area" class="mt-2">
                                    <img id="imageResult" src="#" style="width: 150px; display: none;">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage(event)" required>
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="image_alt">Image Alt</label>
                                        <input type="text" name="image_alt" id="image_alt" class="form-control @error('image_alt') is-invalid @enderror" value="{{ old('image_alt') }}" required>
                                        @error('image_alt')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Description Input -->
                            <div class="form-outline mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Preview Image -->
    @push('scripts')
    <script>
        function previewImage(event) {
            const image = document.getElementById('imageResult');
            image.src = URL.createObjectURL(event.target.files[0]);
            image.style.display = 'block';
        }
    </script>
    @endpush
</x-app-layout>
