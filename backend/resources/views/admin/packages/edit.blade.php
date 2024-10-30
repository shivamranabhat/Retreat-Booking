<x-app-layout>
    <style>
        .ck-editor__editable {
<<<<<<< HEAD
            min-height: 300px;
=======
            min-height: 150px;
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
            height: auto;
        }
    </style>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit Package</h4>
                            </div>
                            <div class="back">
<<<<<<< HEAD
                                <a href="{{ route('packages') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                            <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left" />
=======
                                <a href="{{ route('packages') }}"
                                    class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25"
                                            fill="none" stroke="currentColor">
                                            <path
                                                d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z"
                                                data-name="Left" />
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
<<<<<<< HEAD
                            <form action="{{ route('package.update', $package->slug) }}" method="POST" enctype="multipart/form-data">
=======
                            <form action="{{ route('package.update', $package->slug) }}" method="POST"
                                enctype="multipart/form-data">
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                @csrf
                                @method('PUT')

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="title">Title</label>
<<<<<<< HEAD
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $package->title) }}" required />
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="row">
                                    <div class="d-flex flex-wrap" id="image-preview-area" style="gap: 10px;">
                                        <!-- Previews will be inserted here -->
=======
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $package->title) }}" required />
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="d-flex flex-wrap" id="image-preview-area" style="gap: 10px;">
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                        @if (!empty($package->images))
                                        @php $images = json_decode($package->images, true); @endphp
                                        @foreach ($images as $image)
                                        <div class="image-container">
<<<<<<< HEAD
                                            <img src="{{ asset('storage/' . $image) }}" style="width: 100px;" class="img-fluid rounded" />
=======
                                            <img src="{{ asset('storage/' . $image) }}" style="width: 100px;"
                                                class="img-fluid rounded" />
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row align-items-end">
                                    <div class="form-outline mb-3">
<<<<<<< HEAD
                                        <label class="form-label" for="images">Upload Images</label>
                                        <input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple />
=======
                                        <label class="form-label" for="images">Gallery Images</label>
                                        <input type="file" name="images[]" id="images"
                                            class="form-control @error('images') is-invalid @enderror" accept="image/*"
                                            multiple />
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                        @error('images') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="locations_id">Location</label>
<<<<<<< HEAD
                                    <select name="locations_id" id="locations_id" class="form-control @error('locations_id') is-invalid @enderror">
                                        <option value="">Select Location</option>
                                        @foreach($dropdownData['locations'] as $location)
                                        <option value="{{ $location->id }}" {{ $location->id == old('locations_id', $package->locations_id) ? 'selected' : '' }}>{{ $location->name }}</option>
=======
                                    <select name="locations_id" id="locations_id"
                                        class="form-control @error('locations_id') is-invalid @enderror">
                                        <option value="">Select Location</option>
                                        @foreach($dropdownData['locations'] as $location)
                                        <option value="{{ $location->id }}" {{ $location->id == old('locations_id',
                                            $package->locations_id) ? 'selected' : '' }}>{{ $location->name }}</option>
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                        @endforeach
                                    </select>
                                    @error('locations_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="categories_id">Category</label>
<<<<<<< HEAD
                                    <select name="categories_id" id="categories_id" class="form-control @error('categories_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach($dropdownData['categories'] as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('categories_id', $package->categories_id) ? 'selected' : '' }}>{{ $category->name }}</option>
=======
                                    <select name="categories_id" id="categories_id"
                                        class="form-control @error('categories_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach($dropdownData['categories'] as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('categories_id',
                                            $package->categories_id) ? 'selected' : '' }}>{{ $category->name }}</option>
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                        @endforeach
                                    </select>
                                    @error('categories_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
<<<<<<< HEAD

                                @php
                                $fields = [
                                'summary',
                                'features',
                                'description',
                                'highlights',
                                'itinerary',
                                'terms_and_conditions',
                                'included',
                                'not_included'
                                ];
                                @endphp

                                @foreach ($fields as $field)
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="{{ $field }}">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                                    <textarea name="{{ $field }}" id="{{ $field }}" class="form-control @error($field) is-invalid @enderror">{{ old($field, $package->$field) }}</textarea>
                                    @error($field) <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                @endforeach


                                <div class="form-outline mb-3">
                                    <label class="form-label" for="instructors_id">Instructor</label>
                                    <select name="instructors_id" id="instructors_id" class="form-control @error('instructors_id') is-invalid @enderror">
                                        <option value="">Select Instructor</option>
                                        @foreach($dropdownData['instructors'] as $instructor)
                                        <option value="{{ $instructor->id }}" {{ $instructor->id == old('instructors_id', $package->instructors_id) ? 'selected' : '' }}>{{ $instructor->name }}</option>
=======
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-column flex-wrap align-items-start" style="gap: 3rem">
                                            <div class="d-flex mt-3 flex-wrap align-items-center">
                                                <div class="d-flex flex-wrap align-items-center mb-4 mb-sm-0">
                                                    <h4 class="me-2 h4">Package</h4>
                                                    <span> - In/Exclusion</span>
                                                </div>
                                            </div>
                                            <ul class="d-flex nav nav-pills mb-5 profile-tab nav-slider gap-3"
                                                data-toggle="slider-tab" id="profile-pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-decoration-none show active"
                                                        data-bs-toggle="tab" href="#inclusion" role="tab"
                                                        aria-selected="true">Inclusions </a>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-decoration-none" data-bs-toggle="tab"
                                                        href="#exclusion" role="tab" aria-selected="false">Exclusions</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="tab-content h-100">
                                            <div id="inclusion" class="tab-pane fade active show" role="tabpanel">
                                                <div class="row w-100 header-title d-flex justify-content-between">
                                                    <h4 class="col-lg-8 card-title">Inclusion</h4>
                                                    <p>List the inclusions</p>
                                                </div>
                                                <div class="body mt-2">
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="number_of_inclusions">Type the
                                                            number for inclusion you want to create:</label>
                                                        <div class="d-flex gap-3">
                                                            <input class="form-control" type="number"
                                                                id="number_of_inclusions" min="1">
                                                            <button type="button"
                                                                class="btn btn-sm btn-dark btn-block rounded-pill"
                                                                id="generate-inclusions">Generate</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-outline mb-3">
                                                        <div id="inclusions">
                                                            @forelse($package->inclusions as $index =>
                                                            $inclusion)
                                                            <div class="form-outline mb-3">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                    <label class="form-label"
                                                                        for="inclusion_{{ $index }}">Inclusion {{
                                                                        $index + 1 }}</label>
                                                                    {{--
                                                                    <livewire:admin.delete-activity :itinerary="$itinerary"
                                                                        :activity="$activity" /> --}}
                                                                </div>
                                                                <input class="form-control" type="text"
                                                                    name="inclusions[{{ $index }}][title]"
                                                                    id="title_{{ $index }}" value="{{ $inclusion->inclusion }}">
                                                                <input type="hidden" name="inclusions[{{ $index }}][id]"
                                                                    value="{{ $inclusion->id }}">
                                                            </div>
                                                            @empty
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div id="exclusion" class="tab-pane fade" role="tabpanel">
                                                <div class="row w-100 header-title d-flex justify-content-between">
                                                    <h4 class="col-lg-8 card-title">Exclusion</h4>
                                                    <p>List the exclusions</p>
                                                </div>
                                                <div class="body mt-2">
                                                    <div class="form-outline mb-5">
                                                        <label class="form-label" for="number_of_exclusions">Type the number of exclusions you want to create:</label>
                                                        <div class="d-flex gap-3">
                                                            <input class="form-control" type="number" id="number_of_exclusions" min="1">
                                                            <button type="button" class="btn btn-sm btn-dark btn-block rounded-pill" id="generate-exclusions">Generate</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-outline mb-3">
                                                        <div id="exclusions">
                                                            @forelse($package->exclusions as $index =>
                                                            $exclusion)
                                                            <div class="form-outline mb-3">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                    <label class="form-label"
                                                                        for="exclusion_{{ $index }}">Exclusion {{
                                                                        $index + 1 }}</label>
                                                                    {{--
                                                                    <livewire:admin.delete-activity :itinerary="$itinerary"
                                                                        :activity="$activity" /> --}}
                                                                </div>
                                                                <input class="form-control" type="text"
                                                                    name="exclusions[{{ $index }}][title]"
                                                                    id="title_{{ $index }}" value="{{ $exclusion->exclusion }}">
                                                                <input type="hidden" name="exclusions[{{ $index }}][id]"
                                                                    value="{{ $exclusion->id }}">
                                                            </div>
                                                            @empty
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="instructors_id">Instructor</label>
                                    <select name="instructors_id" id="instructors_id"
                                        class="form-control @error('instructors_id') is-invalid @enderror">
                                        <option value="">Select Instructor</option>
                                        @foreach($dropdownData['instructors'] as $instructor)
                                        <option value="{{ $instructor->id }}" {{ $instructor->id ==
                                            old('instructors_id', $package->instructors_id) ? 'selected' : '' }}>{{
                                            $instructor->name }}</option>
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                        @endforeach
                                    </select>
                                    @error('instructors_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="accommodations_id">Accommodation</label>
<<<<<<< HEAD
                                    <select name="accommodations_id" id="accommodations_id" class="form-control @error('accommodations_id') is-invalid @enderror">
                                        <option value="">Select Accommodation</option>
                                        @foreach($dropdownData['accommodations'] as $accommodation)
                                        <option value="{{ $accommodation->id }}" {{ $accommodation->id == old('accommodations_id', $package->accommodations_id) ? 'selected' : '' }}>{{ $accommodation->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('accommodations_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="start_date">Starting Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $package->start_date) }}" required />
=======
                                    <select name="accommodations_id" id="accommodations_id"
                                        class="form-control @error('accommodations_id') is-invalid @enderror">
                                        <option value="">Select Accommodation</option>
                                        @foreach($dropdownData['accommodations'] as $accommodation)
                                        <option value="{{ $accommodation->id }}" {{ $accommodation->id ==
                                            old('accommodations_id', $package->accommodations_id) ? 'selected' : ''
                                            }}>{{ $accommodation->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('accommodations_id') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="start_date">Starting Date</label>
                                    <input type="date" name="start_date" id="start_date"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        value="{{ old('start_date', $package->start_date) }}" required />
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                    @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="end_date">End Date</label>
<<<<<<< HEAD
                                    <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $package->end_date) }}" required />
=======
                                    <input type="date" name="end_date" id="end_date"
                                        class="form-control @error('end_date') is-invalid @enderror"
                                        value="{{ old('end_date', $package->end_date) }}" required />
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                                    @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="days">Days</label>
                                    <input type="number" name="days" id="days" class="form-control" readonly />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="price">Package Price</label>
<<<<<<< HEAD
                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $package->price) }}" required />
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-3">Update</button>
=======
                                    <input type="number" name="price" id="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        value="{{ old('price', $package->price) }}" required />
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                @php
                                $fields = [
                                'summary',
                                'features',
                                'highlights',
                                'itinerary',
                                'terms_and_conditions',
                                ];
                                @endphp

                                @foreach ($fields as $field)
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="{{ $field }}">{{ ucfirst(str_replace('_', ' ',
                                        $field)) }}</label>
                                    <textarea name="{{ $field }}" id="{{ $field }}"
                                        class="form-control @error($field) is-invalid @enderror">{{ old($field, $package->$field) }}</textarea>
                                    @error($field) <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                @endforeach
                               
                                <button type="submit"
                                    class="btn btn-primary btn-block rounded-pill mb-3">Update</button>
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
<<<<<<< HEAD
=======
            document.getElementById('generate-inclusions').addEventListener('click', function() {
                let numberOfInclusions = parseInt(document.getElementById('number_of_inclusions').value);
                let inclusionsContainer = document.getElementById('inclusions');
                let existingInclusionsCount = inclusionsContainer.children.length;

                for (let i = 0; i < numberOfInclusions; i++) {
                    let index = existingInclusionsCount + i;
                    let inclusionHTML = `
                    <div class="form-outline" data-inclusion-index="${index}">
                        <label class="form-label" for="inclusion_${index}">Inclusion ${index + 1}</label>
                        <input class="form-control" type="text" name="inclusions[${index}][title]" id="inclusion_title_${index}">
                    </div>`;
                    inclusionsContainer.insertAdjacentHTML('beforeend', inclusionHTML);
                }
            });
            document.getElementById('generate-exclusions').addEventListener('click', function() {
                let numberOfExclusions = parseInt(document.getElementById('number_of_exclusions').value);
                let exclusionsContainer = document.getElementById('exclusions');
                let existingExclusionsCount = exclusionsContainer.children.length;

                for (let i = 0; i < numberOfExclusions; i++) {
                    let index = existingExclusionsCount + i;
                    let exclusionHTML = `
                    <div class="form-outline" data-exclusion-index="${index}">
                        <label class="form-label" for="exclusion_${index}">Exclusion ${index + 1}</label>
                        <input class="form-control" type="text" name="exclusions[${index}][title]" id="exclusion_title_${index}">
                    </div>`;
                    exclusionsContainer.insertAdjacentHTML('beforeend', exclusionHTML);
                }
            });


>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
            document.addEventListener('DOMContentLoaded', function() {
                const startDateInput = document.getElementById('start_date');
                const endDateInput = document.getElementById('end_date');
                const daysInput = document.getElementById('days');

                function calculateDays() {
                    const startDate = new Date(startDateInput.value);
                    const endDate = new Date(endDateInput.value);

                    if (startDate && endDate && endDate >= startDate) {
                        const differenceInTime = endDate - startDate;
                        const differenceInDays = differenceInTime / (1000 * 3600 * 24) + 1; // Adding 1 to include both start and end date
                        daysInput.value = differenceInDays;
                    } else {
                        daysInput.value = 0;
                    }
                }

                // Call the function initially to set days from the loaded values
                calculateDays();

                startDateInput.addEventListener('change', calculateDays);
                endDateInput.addEventListener('change', calculateDays);
            });



            document.getElementById('images').addEventListener('change', function(event) {
                const files = event.target.files;
                const previewArea = document.getElementById('image-preview-area');
                previewArea.innerHTML = ''; // Clear previous previews

                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imgContainer = document.createElement('div');
                        imgContainer.classList.add('image-container');

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.classList.add('img-fluid', 'rounded');

                        imgContainer.appendChild(img);
                        previewArea.appendChild(imgContainer);
                    };
                    reader.readAsDataURL(file); // Convert image to base64 string
                });
            });




            document.addEventListener('DOMContentLoaded', function() {
                const fieldsToInit = ['summary',
                    'features',
                    'description',
                    'highlights',
                    'itinerary',
                    'terms_and_conditions',
                    'included',
                    'not_included'
                ];

                function initializeCKEditor(fieldId) {
                    CKEDITOR.ClassicEditor.create(document.getElementById(fieldId), {
                        ckfinder: {
<<<<<<< HEAD
                            uploadUrl: "{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
=======
                            uploadUrl: "{{route('package.upload',['_token'=>csrf_token()])}}",
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
                        },
                        height: 500,
                        toolbar: {
                            items: [
                                'heading', '|',
                                'bold', 'italic', 'strikethrough', 'underline', '|',
                                'bulletedList', 'numberedList', 'todoList', '|',
                                'outdent', 'indent', '|',
                                'undo', 'redo',
                                '-',
                                'fontSize', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                                'alignment', '|',
                                'link', 'uploadImage', 'blockQuote', 'htmlEmbed', 'insertTable', '|', 'horizontalLine'
                            ],
                            shouldNotGroupWhenFull: true
                        },
                        list: {
                            properties: {
                                styles: true,
                                startIndex: true,
                                reversed: true
                            }
                        },
                        heading: {
                            options: [{
                                    model: 'paragraph',
                                    title: 'Paragraph'
                                },
                                {
                                    model: 'heading1',
                                    view: 'h1',
                                    title: 'Heading 1'
                                },
                                {
                                    model: 'heading2',
                                    view: 'h2',
                                    title: 'Heading 2'
                                },
                                {
                                    model: 'heading3',
                                    view: 'h3',
                                    title: 'Heading 3'
                                },
                                {
                                    model: 'heading4',
                                    view: 'h4',
                                    title: 'Heading 4'
                                },
                                {
                                    model: 'heading5',
                                    view: 'h5',
                                    title: 'Heading 5'
                                },
                                {
                                    model: 'heading6',
                                    view: 'h6',
                                    title: 'Heading 6'
                                }
                            ]
                        },
                        fontSize: {
                            options: [10, 12, 14, 'default', 18, 20, 22],
                            supportAllValues: true
                        },
                        htmlSupport: {
                            allow: [{
                                name: /.*/,
                                attributes: true,
                                classes: true,
                                styles: true
                            }]
                        },
                        htmlEmbed: {
                            showPreviews: true
                        },
                        link: {
                            decorators: {
                                addTargetToExternalLinks: true,
                                defaultProtocol: 'https://',
                                toggleDownloadable: {
                                    mode: 'manual',
                                    label: 'Downloadable',
                                    attributes: {
                                        download: 'file'
                                    }
                                }
                            }
                        },
                        removePlugins: [
                            'AIAssistant',
                            'CKBox',
                            'CKFinder',
                            'EasyImage',
                            'MultiLevelList',
                            'RealTimeCollaborativeComments',
                            'RealTimeCollaborativeTrackChanges',
                            'RealTimeCollaborativeRevisionHistory',
                            'PresenceList',
                            'Comments',
                            'TrackChanges',
                            'TrackChangesData',
                            'RevisionHistory',
                            'Pagination',
                            'WProofreader',
                            'MathType',
                            'SlashCommand',
                            'Template',
                            'DocumentOutline',
                            'FormatPainter',
                            'TableOfContents',
                            'PasteFromOfficeEnhanced',
                            'CaseChange'
                        ]
                    });
                }

                fieldsToInit.forEach(fieldId => {
                    const fieldElement = document.getElementById(fieldId);
                    if (fieldElement) {
                        initializeCKEditor(fieldId);
                    }
                });
            });
        </script>
        @endpush
    </div>
</x-app-layout>