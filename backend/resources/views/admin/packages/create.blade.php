<x-app-layout>
    <style>
        .ck-editor__editable {
            min-height: 300px;
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
                                <h4 class="card-title">Add New Package</h4>
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
                            <form action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required />
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="row" id="image-preview-container"></div>
                                <div class="row align-items-end">
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="images">Images</label>
                                        <input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple required />
                                        @error('images') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="location_id">Location</label>
                                    <select name="location_id" id="location_id" class="form-control @error('location_id') is-invalid @enderror">
                                        <option value="">Select Location</option>
                                        @foreach($dropdownData['locations'] as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('location_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                @php
                                $fields = ['summary', 'features', 'description', 'benefits', 'program', 'facilities',
                                'included',
                                'not_included'];
                                @endphp

                                @foreach ($fields as $field)
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="{{ $field }}">{{ ucfirst($field) }}</label>
                                    <textarea name="{{ $field }}" id="{{ $field }}" class="form-control @error($field) is-invalid @enderror">{{ old($field) }}</textarea>
                                    @error($field) <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                @endforeach

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="instructor_id">Instructor</label>
                                    <select name="instructor_id" id="instructor_id" class="form-control @error('instructor_id') is-invalid @enderror">
                                        <option value="">Select Instructor</option>
                                        @foreach($dropdownData['instructors'] as $instructor)
                                        <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('instructor_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="accommodation_id">Accommodation</label>
                                    <select name="accommodation_id" id="accommodation_id" class="form-control @error('accommodation_id') is-invalid @enderror">
                                        <option value="">Select Accommodation</option>
                                        @foreach($dropdownData['accommodations'] as $accommodation)
                                        <option value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('accommodation_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="start_date">Starting Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required />
                                    @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" required />
                                    @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="days">Days</label>
                                    <input type="number" name="days" id="days" class="form-control" readonly />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="price">Package Price</label>
                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required />
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>


                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-3">Create</button>
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
                const fieldsToInit = ['summary', 'features', 'description', 'benefits', 'program', 'facilities',
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