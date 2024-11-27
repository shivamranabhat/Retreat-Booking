<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Review Details</h4>
                            </div>
                            <div class="back">
                                <a href="{{ route('reviews') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                            <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left"/>
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <div class="mb-4">
                                <h5><strong>Review Title:</strong> {{ $review->title }}</h5>
                                <p><strong>Review Content:</strong> {{ $review->description }}</p>
                                <p><strong>Rating:</strong> {{ $review->rating }}</p>
                                <p><strong>Package:</strong> {{ $review->package->name ?? 'N/A' }}</p>
                                <p><strong>User:</strong> {{ $review->user->name ?? 'N/A' }}</p>
                                <p><strong>Review Date:</strong> {{ $review->created_at->format('F j, Y') }}</p>
                            </div>
                            <div class="mt-3">                                
                                <form action="{{ route('reviews.destroy', $review->slug) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                </form>
                                <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Back to Reviews</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</x-app-layout>
