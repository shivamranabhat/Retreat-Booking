<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Inquiry View</h4>
                        </div>
                        <div class="back">
                            @if($inquiry->status == 'Pending')
                            <a href="{{ route('inquiry.pending') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                <i class="btn-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                        <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left" />
                                    </svg>
                                </i>
                            </a>
                            @elseif($inquiry->status == 'Accepted')
                            <a href="{{ route('inquiry.accepted') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                <i class="btn-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                        <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left" />
                                    </svg>
                                </i>
                            </a>
                            @elseif($inquiry->status == 'Declined')
                            <a href="{{ route('inquiry.declined') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                <i class="btn-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                        <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left" />
                                    </svg>
                                </i>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Name</label>
                                <p>{{ $inquiry->name }}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Email</label>
                                <p>{{ $inquiry->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Room Type</label>
                                <p>{{ $inquiry->roomType->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label">People</label>
                                <p>{{ $inquiry->people }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Start Date</label>
                                <p>{{ $inquiry->start_date }}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label">End Date</label>
                                <p>{{ $inquiry->end_date }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Package</label>
                                <p>{{ $inquiry->package->title ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label class="form-label">Message</label>
                                <p>{{ $inquiry->message }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        @if($inquiry->status == 'Pending')
                        <form action="{{ route('inquiry.changeStatus', ['inquiry' => $inquiry->id, 'status' => 'Accepted']) }}" method="POST" class="me-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        <form action="{{ route('inquiry.changeStatus', ['inquiry' => $inquiry->id, 'status' => 'Declined']) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Decline</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
