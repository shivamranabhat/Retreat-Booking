<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Create Featured Package</h4>
                            </div>
                            <div class="back">
                                <a href="{{ route('featured_packages') }}"
                                   class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25"
                                             fill="none" stroke="currentColor">
                                            <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z"
                                                  data-name="Left" />
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form method="POST" action="{{ route('featured_package.store') }}">
                                @csrf
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="package_id">Package</label>
                                    <select class="form-control @error('package_id') is-invalid @enderror" id="package_id" name="package_id">
                                        <option value="">Select a Package</option>
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">
                                                {{ $package->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('package_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-4">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
