<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit Instructor</h4>
                            </div>
                            <div class="back">
                                <a href="{{ route('instructors') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                            <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left" />
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form action="{{ route('instructor.update', $instructor->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Name Field -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $instructor->name }}" required />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image Upload and Preview -->
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="form-label" for="imagePreview">New Image</label><br>
                                            <img id="imagePreview" src="#" alt="Image Preview" width="150" style="display:none;" />
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label" for="currentImage">Current Image</label><br>
                                            @if ($instructor->image)
                                            <img src="{{ asset('storage/' . $instructor->image) }}" alt="Instructor Image" width="150">
                                            @else
                                            <p>No image available</p>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label" for="image">Image</label>
                                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)" />
                                        </div>
                                        <div class="col-6">
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="image_alt">Image Alt</label>
                                                <input type="text" name="image_alt" id="image_alt"
                                                    class="form-control @error('image_alt') is-invalid @enderror {{ $errors->has('image_alt') ? 'error' : '' }}"
                                                    value="{{ old('image_alt', $instructor->image_alt) }}" />
                                                @error('image_alt')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Experience Field -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="experience">Experience</label>
                                    <input type="number" name="experience" id="experience"
                                        class="form-control @error('experience') is-invalid @enderror"
                                        value="{{ $instructor->experience }}" required />
                                    @error('experience')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description Field -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        required>{{ $instructor->description }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Address Field -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" name="address" id="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ $instructor->address }}" required />
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Phone Number Field -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        value="{{ $instructor->phone_number }}" required />
                                    @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Preview the Image Before Upload -->
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block'; // Show the preview
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = "#";
                imagePreview.style.display = 'none'; // Hide the preview if no file selected
            }
        }
    </script>
</x-app-layout>