<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Contacts</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('contactDetails')}}"
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
                            <form method="POST" action="{{ route('contactDetail.store') }}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="phone">Contact Number</label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror {{ $errors->has('phone') ? 'error' : '' }}"
                                        value="{{ old('phone') }}" />
                                    @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror {{ $errors->has('email') ? 'error' : '' }}"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="facebook_link">Facebook Link</label>
                                    <textarea name="facebook_link" id="facebook_link"
                                        class="form-control @error('facebook_link') is-invalid @enderror {{ $errors->has('facebook_link') ? 'error' : '' }}"
                                        rows="1">{{ old('facebook_link') }}</textarea>
                                    @error('facebook_link')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="insta_link">Instagram Link</label>
                                    <textarea name="insta_link" id="insta_link"
                                        class="form-control @error('insta_link') is-invalid @enderror {{ $errors->has('insta_link') ? 'error' : '' }}"
                                        rows="1">{{ old('insta_link') }}</textarea>
                                    @error('insta_link')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                                 <div class="form-outline mb-4">
                                    <label class="form-label" for="whatsapp_link">Whatsapp Link</label>
                                    <textarea name="whatsapp_link" id="whatsapp_link"
                                        class="form-control @error('whatsapp_link') is-invalid @enderror {{ $errors->has('whatsapp_link') ? 'error' : '' }}"
                                        rows="1">{{ old('whatsapp_link') }}</textarea>
                                </div>
                               
                                <button type="submit"
                                    class="btn btn-primary btn-block rounded-pill mb-4">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>