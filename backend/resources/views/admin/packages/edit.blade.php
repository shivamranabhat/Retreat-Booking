<x-app-layout>
    <style>
        .ck-editor__editable {
            min-height: 300px;
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
                                <a href="{{ route('packages') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                            <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left" />
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form action="{{ route('package.update', $package->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $package->title) }}" required />
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="row">
                                    <div class="d-flex flex-wrap" id="image-preview-area" style="gap: 10px;">
                                        <!-- Previews will be inserted here -->
                                        @if (!empty($package->images))
                                        @php $images = json_decode($package->images, true); @endphp
                                        @foreach ($images as $image)
                                        <div class="image-container">
                                            <img src="{{ asset('storage/' . $image) }}" style="width: 100px;" class="img-fluid rounded" />
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row align-items-end">
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="images">Upload Images</label>
                                        <input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple />
                                        @error('images') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="locations_id">Location</label>
                                    <select name="locations_id" id="locations_id" class="form-control @error('locations_id') is-invalid @enderror">
                                        <option value="">Select Location</option>
                                        @foreach($dropdownData['locations'] as $location)
                                        <option value="{{ $location->id }}" {{ $location->id == old('locations_id', $package->locations_id) ? 'selected' : '' }}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('locations_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="categories_id">Category</label>
                                    <select name="categories_id" id="categories_id" class="form-control @error('categories_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach($dropdownData['categories'] as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('categories_id', $package->categories_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

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
                                        @endforeach
                                    </select>
                                    @error('instructors_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="accommodations_id">Accommodation</label>
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
                                    @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $package->end_date) }}" required />
                                    @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="days">Days</label>
                                    <input type="number" name="days" id="days" class="form-control" readonly />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="price">Package Price</label>
                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $package->price) }}" required />
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
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
                            uploadUrl: "{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
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