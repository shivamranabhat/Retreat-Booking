<x-app-layout>
    <style>
        .ck-editor__editable {
            min-height: 150px;
            /* Set minimum height */
            height: auto;
            /* Allow it to grow */
        }
    </style>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Create Package</h4>
                            </div>
                            <div class="back">
                                <a href="{{ route('packages') }}"
                                    class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25"
                                            fill="none" stroke="currentColor">
                                            <path
                                                d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z"
                                                data-name="Left" />
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}" required />
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="row" id="image-preview-container"></div>
                                <div class="row align-items-end">
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="images">Gallery Images</label>
                                        <input type="file" name="images[]" id="images"
                                            class="form-control @error('images') is-invalid @enderror" accept="image/*"
                                            multiple required />
                                        @error('images') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="locations_id">Location</label>
                                    <select name="locations_id" id="locations_id"
                                        class="form-control @error('locations_id') is-invalid @enderror">
                                        <option value="">Select Location</option>
                                        @foreach($dropdownData['locations'] as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('location_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="categories_id">Category</label>
                                    <select name="categories_id" id="categories_id"
                                        class="form-control @error('categories_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach($dropdownData['categories'] as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="row mb-4">
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
                                                        aria-selected="true">Inclusion </a>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-decoration-none" data-bs-toggle="tab"
                                                        href="#exclusion" role="tab" aria-selected="false">Exclusion</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tab-content h-100">
                                            <div id="inclusion" class="tab-pane h-100 fade active show" role="tabpanel">
                                                <div class="row w-100 header-title d-flex justify-content-between">
                                                    <h4 class="col-lg-8 card-title">Inclusion</h4>
                                                    <p>List the inclusions</p>
                                                </div>
                                                <div class="body mt-2">
                                                    <div class="form-outline mb-5">
                                                        <label class="form-label" for="number_of_inclusions">Type the
                                                            number of inclusions you want to create:</label>
                                                        <div class="d-flex gap-3">
                                                            <input class="form-control" type="number"
                                                                id="number_of_inclusions" min="1">
                                                            <button type="button"
                                                                class="btn btn-sm btn-dark btn-block rounded-pill"
                                                                id="generate-inclusions">Generate</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <div id="inclusions"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="exclusion" class="tab-pane h-100 fade" role="tabpanel">
                                                <div class="row w-100 header-title d-flex justify-content-between">
                                                    <h4 class="col-lg-8 card-title">Exclusion</h4>
                                                    <p>List the exclusions</p>
                                                </div>
                                                <div class="body mt-2">
                                                    <div class="form-outline mb-5">
                                                        <label class="form-label" for="number_of_exclusions">Type the
                                                            number of exclusions you want to create:</label>
                                                        <div class="d-flex gap-3">
                                                            <input class="form-control" type="number"
                                                                id="number_of_exclusions" min="1">
                                                            <button type="button"
                                                                class="btn btn-sm btn-dark btn-block rounded-pill"
                                                                id="generate-exclusions">Generate</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <div id="exclusions"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @php
                                $fields = ['summary',
                                'features',
                                'description',
                                'highlights',
                                'itinerary',
                                'terms_and_conditions'];
                                @endphp



                                <div class="form-outline mb-3">
                                    <label class="form-label" for="instructors_id">Instructor</label>
                                    <select name="instructors_id" id="instructors_id"
                                        class="form-control @error('instructors_id') is-invalid @enderror">
                                        <option value="">Select Instructor</option>
                                        @foreach($dropdownData['instructors'] as $instructor)
                                        <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('instructor_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="accommodations_id">Accommodation</label>
                                    <select name="accommodations_id" id="accommodations_id"
                                        class="form-control @error('accommodations_id') is-invalid @enderror">
                                        <option value="">Select Accommodation</option>
                                        @foreach($dropdownData['accommodations'] as $accommodation)
                                        <option value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('accommodation_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        value="{{ old('start_date') }}" required />
                                    @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date"
                                        class="form-control @error('end_date') is-invalid @enderror"
                                        value="{{ old('end_date') }}" required />
                                    @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="days">Days</label>
                                    <input type="number" name="days" id="days" class="form-control" readonly />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="price">Package Price</label>
                                    <input type="number" name="price" id="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        value="{{ old('price') }}" required />
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
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
                                                        data-bs-toggle="tab" href="#inclusions" role="tab"
                                                        aria-selected="true">Inclusions </a>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-decoration-none" data-bs-toggle="tab"
                                                        href="#exclusions" role="tab" aria-selected="false">Exclusions</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="tab-content h-100">
                                            <div id="inclusion" class="tab-pane h-100 fade active show" role="tabpanel">
                                                <div class="row w-100 header-title d-flex justify-content-between">
                                                    <h4 class="col-lg-8 card-title">Inclusion</h4>
                                                    <p>List the inclusions</p>
                                                </div>
                                                <div class="body mt-2">
                                                    <div class="form-outline mb-5">
                                                        <label class="form-label" for="number_of_inclusions">Type the number of inclusions you want to create:</label>
                                                        <div class="d-flex gap-3">
                                                            <input class="form-control" type="number" id="number_of_inclusions" min="1">
                                                            <button type="button" class="btn btn-sm btn-dark btn-block rounded-pill" id="generate-inclusions">Generate</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <div id="inclusions"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div id="exclusion" class="tab-pane h-100 fade" role="tabpanel">
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
                                                    <div class="form-outline mb-4">
                                                        <div id="exclusions"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @foreach ($fields as $field)
                                <div class="form-outline mb-3">
                                    <label class="form-label text-capitalize" for="{{ $field }}">{{
                                        ucfirst(str_replace('_', ' ', $field)) }}</label>
                                    <textarea name="{{ $field }}" id="{{ $field }}"
                                        class="form-control @error($field) is-invalid @enderror">{{ old($field) }}</textarea>
                                    @error($field) <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                @endforeach
                                <button type="submit"
                                    class="btn btn-primary btn-block rounded-pill mb-3">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            document.getElementById('generate-inclusions').addEventListener('click', function() {
                let numberOfInclusions = document.getElementById('number_of_inclusions').value;
                let inclusionsContainer = document.getElementById('inclusions');
                inclusionsContainer.innerHTML = '';
                
                if (numberOfInclusions > 0) {
                    for (let i = 0; i < numberOfInclusions; i++) {
                        let inclusionHTML = `
                            <div class="form-outline mb-3">
                                <label class="form-label" for="inclusion_${i}">Inclusion ${i + 1}</label>
                                <textarea class="form-control" rows="1" name="inclusions[${i}][title]" id="inclusion_${i}"></textarea>
                            </div>`;
                        inclusionsContainer.insertAdjacentHTML('beforeend', inclusionHTML);
                    }
                }
            });

            document.getElementById('generate-exclusions').addEventListener('click', function() {
                let numberOfExclusions = document.getElementById('number_of_exclusions').value;
                let exclusionsContainer = document.getElementById('exclusions');
                exclusionsContainer.innerHTML = '';
                
                if (numberOfExclusions > 0) {
                    for (let i = 0; i < numberOfExclusions; i++) {
                        let exclusionHTML = `
                            <div class="form-outline mb-3">
                                <label class="form-label" for="exclusion_${i}">Exclusion ${i + 1}</label>
                                <textarea class="form-control" rows="1" name="exclusions[${i}][title]" id="exclusion_${i}"></textarea>
                            </div>`;
                        exclusionsContainer.insertAdjacentHTML('beforeend', exclusionHTML);
                    }
                }
            });
           
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

                startDateInput.addEventListener('change', calculateDays);
                endDateInput.addEventListener('change', calculateDays);
            });


            document.addEventListener('DOMContentLoaded', function() {
                const imageInput = document.getElementById('images');
                const imagePreviewContainer = document.getElementById('image-preview-container');

                imageInput.addEventListener('change', function() {
                    // Clear any previous previews
                    imagePreviewContainer.innerHTML = '';

                    // Loop through the selected files
                    Array.from(imageInput.files).forEach(file => {
                        // Ensure the file is an image
                        if (!file.type.startsWith('image/')) return;

                        // Create a FileReader to read the file
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            // Create a new image element
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('img-fluid', 'mb-2');
                            img.style.width = '100%';

                            // Create a div container for the image with col-1 class
                            const colDiv = document.createElement('div');
                            colDiv.classList.add('col-1', 'col-md-1'); // Responsive columns
                            colDiv.appendChild(img);

                            // Add the image preview to the container
                            imagePreviewContainer.appendChild(colDiv);
                        };
                        reader.readAsDataURL(file);
                    });
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
                            uploadUrl: "{{route('package.upload',['_token'=>csrf_token()])}}",
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