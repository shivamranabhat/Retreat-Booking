<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
<<<<<<< HEAD
                                <h4 class="card-title">Add New Accommodation</h4>
=======
                                <h4 class="card-title">Accommodation</h4>
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                            </div>
                            <div class="back">
                                <a href="{{ route('accommodations') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                            <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left" />
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-3">
                            <form action="{{ route('accommodation.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-outline mb-4">
<<<<<<< HEAD
                                    <label class="form-label" for="name">Accommodation Name</label>
=======
                                    <label class="form-label" for="name">Name</label>
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" required />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <div class="row" id="image-preview-area">
                                        <!-- Previews will be inserted here -->
                                    </div>
                                    <label class="form-label">Images</label>
                                    <input class="form-control @error('images.*') is-invalid @enderror" type="file" name="images[]" accept="image/*" multiple onchange="this.previewImages()" />
                                    @error('images.*')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror                                    
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        required>{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="location">Location</label>
                                    <input type="text" name="location" id="location"
                                        class="form-control @error('location') is-invalid @enderror"
                                        value="{{ old('location') }}" />
                                    @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="contact">Contact</label>
                                    <input type="text" name="contact" id="contact"
                                        class="form-control @error('contact') is-invalid @enderror"
                                        value="{{ old('contact') }}" />
                                    @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

<<<<<<< HEAD
                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-3">Add Accommodation</button>
=======
                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-3">Create</button>
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('input[type="file"]').addEventListener('change', function(event) {
            const files = event.target.files;
            const previewArea = document.getElementById('image-preview-area');
            previewArea.innerHTML = ''; // Clear previous previews

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgContainer = document.createElement('div');
                    imgContainer.classList.add('col-1'); // Bootstrap classes for column size

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.classList.add('img-fluid', 'rounded'); // Bootstrap classes for responsiveness and rounding

                    imgContainer.appendChild(img); // Append image to the container
                    previewArea.appendChild(imgContainer); // Append the container to the preview area
                };
                reader.readAsDataURL(file); // Convert image to base64 string
            });
        });
    </script>
</x-app-layout>
