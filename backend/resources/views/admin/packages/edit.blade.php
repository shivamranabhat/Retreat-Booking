<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit Package: {{ $package->title }}</h4>
                            </div>
                            <div class="back">
                                <a href="{{ route('packages') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <!-- Back button icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                            <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left" />
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $package->title) }}" required />
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="row align-items-end">
                                    <div class="col-6 form-outline mb-3">
                                        <label class="form-label" for="images">Images</label>
                                        <input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple />
                                        @error('images') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                @php
                                $fields = ['summary', 'features', 'description', 'benefits', 'program', 'facilities'];
                                @endphp

                                @foreach ($fields as $field)
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="{{ $field }}">{{ ucfirst($field) }}</label>
                                    <textarea name="{{ $field }}" id="{{ $field }}" class="form-control @error($field) is-invalid @enderror">{{ old($field, $package->$field) }}</textarea>
                                    @error($field) <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                @endforeach

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="instructor_id">Instructor</label>
                                    <select name="instructor_id" id="instructor_id" class="form-control @error('instructor_id') is-invalid @enderror">
                                        <option value="">Select Instructor</option>
                                        @foreach($instructors as $instructor)
                                        <option value="{{ $instructor->id }}" {{ $instructor->id == $package->instructor_id ? 'selected' : '' }}>
                                            {{ $instructor->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('instructor_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="accommodation_id">Accommodation</label>
                                    <select name="accommodation_id" id="accommodation_id" class="form-control @error('accommodation_id') is-invalid @enderror">
                                        <option value="">Select Accommodation</option>
                                        @foreach($accommodations as $accommodation)
                                        <option value="{{ $accommodation->id }}" {{ $accommodation->id == $package->accommodation_id ? 'selected' : '' }}>
                                            {{ $accommodation->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('accommodation_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="location_id">Location</label>
                                    <select name="location_id" id="location_id" class="form-control @error('location_id') is-invalid @enderror">
                                        <option value="">Select Location</option>
                                        @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ $location->id == $package->location_id ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('location_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $package->slug) }}" required />
                                    @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
        <script>
            // Initialize CKEditor for the necessary fields
            const fieldsToInit = ['summary', 'features', 'description', 'benefits', 'program', 'facilities'];
            fieldsToInit.forEach(fieldId => {
                ClassicEditor.create(document.getElementById(fieldId), {
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                    },
                    toolbar: { /* toolbar configuration */ }
                });
            });
        </script>
        <script src="{{ asset('assets/js/imagePreview.js?v=').time() }}"></script>
        @endpush
    </div>
</x-app-layout>
