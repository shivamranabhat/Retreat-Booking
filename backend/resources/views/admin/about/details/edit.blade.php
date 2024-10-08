<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Details</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('details')}}"
                                    class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
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
                            <form method="POST" action="{{ route('detail.update',$details->slug) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror {{ $errors->has('title') ? 'error' : '' }}"
                                        value="{{ $details->title }}" />
                                    @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="customer_count">Customer Count</label>
                                    <input type="text" name="customer_count" id="customer_count"
                                        class="form-control @error('customer_count') is-invalid @enderror {{ $errors->has('customer_count') ? 'error' : '' }}"
                                        value="{{ $details->customer_count  }}" />
                                    @error('customer_count')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="image-area">
                                        <div id="imageContainer"
                                            class="d-flex flex-column flex-md-row flex-lg-row flex-xl-row gap-3 flex-wrap">
                                            @foreach(json_decode($details->image) as $imagePath)
                                            <img src="{{ asset('storage/' . $imagePath) }}" alt="Image" width="80">
                                            @endforeach
                                        </div>
                                    </div>
                                    <label class="form-label" for="image">Customer Images</label>
                                    <input class="form-control" type="file" id="gallery_image" name="image[]"
                                        multiple />
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror {{ $errors->has('description') ? 'error' : '' }}">{{ $details->description }}</textarea>
                                    @error('desscription')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="btn btn-primary btn-block rounded-pill mb-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/js/imagePreview.js') }}"></script>
        @endpush
</x-app-layout>