<x-app-layout>
    <style>
        #room-types-dropdown {
            transition: max-height 0.3s ease-in-out;
        }
    </style>

    <div class="container-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Accommodation</h4>
                        </div>
                        <div class="back">
                            <a href="{{ route('accommodations') }}" class="btn btn-primary btn-icon">
                                <i class="btn-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                        <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" />
                                    </svg>
                                </i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body mt-3">
                        <form action="{{ route('accommodation.update', $accommodation->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Accommodation Name -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Accommodation Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $accommodation->name) }}" required />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Existing Images Preview and Upload New Images -->
                            <div class="form-outline mb-4">
                                <label class="form-label">Images</label>
                                <div class="row" id="image-preview-area">
                                    <!-- Display Existing Images -->
                                    @foreach($accommodation->images as $image)
                                    <div class="col-2 mb-2">
                                        <img src="{{ asset('storage/'.$image->path) }}" class="img-fluid rounded" style="width: 100px;" alt="Existing Image">
                                    </div>
                                    @endforeach
                                </div>
                                <input class="form-control @error('images.*') is-invalid @enderror" type="file" name="images[]" accept="image/*" multiple />
                                @error('images.*')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="description">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $accommodation->description) }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="location">Location</label>
                                <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror"
                                    value="{{ old('location', $accommodation->location) }}" />
                                @error('location')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Contact -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="contact">Contact</label>
                                <input type="text" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror"
                                    value="{{ old('contact', $accommodation->contact) }}" />
                                @error('contact')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Room Types Dropdown -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="room_types">Room Types</label>
                                <div id="room-types-container" class="relative">
                                    <div id="selected-room-types" class="form-control bg-gray-200 p-2 rounded border cursor-pointer">
                                        <span id="selected-room-types-text">Select Room Types</span>
                                    </div>

                                    <!-- Dropdown Menu -->
                                    <div id="room-types-dropdown" class="absolute w-full bg-white border rounded shadow-lg mt-1 p-4 hidden">
                                        @foreach($dropdownData['room_types'] as $roomType)
                                        <label class="flex items-center space-x-4 text-lg font-semibold">
                                            <input type="checkbox" name="room_types[]" value="{{ $roomType->id }}" aria-label="Room Type {{ $roomType->name }}"
                                                {{ in_array($roomType->id, old('room_types', $accommodation->room_types->pluck('id')->toArray())) ? 'checked' : '' }} class="h-5 w-5">
                                            <span>{{ $roomType->name }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                @error('room_types')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mb-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle Room Types Dropdown
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('room-types-dropdown');
            const selectedRoomTypes = document.getElementById('selected-room-types');
            
            if (selectedRoomTypes.contains(event.target)) {
                dropdown.classList.toggle('hidden');
            } else if (!dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Update Selected Room Types Text
        const checkboxes = document.querySelectorAll('#room-types-dropdown input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectedTexts = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.parentElement.textContent.trim());
                
                document.getElementById('selected-room-types-text').textContent = selectedTexts.length ? selectedTexts.join(', ') : 'Select Room Types';
            });
        });
    </script>
</x-app-layout>
