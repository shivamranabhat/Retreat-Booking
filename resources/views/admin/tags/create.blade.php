<x-app-layout>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Tags</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('tags')}}" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor"><path  d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left"/></svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form method="POST" action="{{ route('tag.store') }}">
                                @csrf
                                <div class="form-outline mb-3">
                                    <div class="row">
                                        <div class="col-12 col-lg-9 col-xl-9 mb-3 mb-md-0 mb-lg-0 mb-xl-0">
                                           <label class="form-label" for="type">Select page</label>
                                        <select class="form-select @error('page_id') is-invalid @enderror {{ $errors->has('page_id') ? 'error' : '' }}" name="page_id" id="page_id">
                                            <option value="" disabled selected>Select a page</option>
                                            @forelse ($pages as $page)
                                                <option value="{{ $page->id }}" class="text-capitalize">{{ $page->name }}</option>
                                            @empty
                                                <option value="#" class="text-capitalize">No page found</option>
                                            @endforelse
                                        </select>
                                       </div>
                                       <div class="col-12 col-lg-3 col-xl-3">
                                        <label class="form-label" for="title">Search Page</label>
                                        <input type="text" class="form-control" id="page_search" placeholder="Search for a page">
                                       </div>
                                    </div>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="tag_name">Tag Name</label>
                                    <input type="text" name="tag_name" id="tag_name" class="form-control @error('tag_name') is-invalid @enderror {{ $errors->has('tag_name') ? 'error' : '' }}"
                                        value="{{ old('tag_name') }}" />
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror {{ $errors->has('title') ? 'error' : '' }}"
                                        value="{{ old('title') }}" />
                                </div>
        
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="meta_description">Meta Description</label>
                                    <textarea class="form-control @error('meta_description') is-invalid @enderror {{ $errors->has('meta_description') ? 'error' : '' }}" id="meta_description" name="meta_description" rows="2" placeholder="Eg: description1, description2, description3">{{ old('meta_description') }}</textarea>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="meta_keywords">Meta keywords</label>
                                    <textarea class="form-control @error('meta_keywords') is-invalid @enderror {{ $errors->has('meta_keywords') ? 'error' : '' }}" id="meta_keywords" name="meta_keywords" rows="2" placeholder="Eg: keyword1, keyword2, keyword3">{{ old('meta_keywords') }}</textarea>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="canonical_tag">Canonical Link</label>
                                    <textarea class="form-control @error('canonical_tag') is-invalid @enderror {{ $errors->has('canonical_tag') ? 'error' : '' }}" id="canonical_tag" name="canonical_tag" rows="2">{{ old('canonical_tag') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-4">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script src="{{ asset('assets/js/dropdownSearch.js') }}"></script>
        @endpush
</x-app-layout>
