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
                        <form>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" id="name" class="form-control" value="{{ $inquiry->name }}" readonly>
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" class="form-control" value="{{ $inquiry->email }}" readonly>
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="people">People</label>
                                <input type="number" id="people" class="form-control" value="{{ $inquiry->people }}" readonly>
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="start_date">Start Date</label>
                                <input type="date" id="start_date" class="form-control" value="{{ $inquiry->start_date }}" readonly>
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="end_date">End Date</label>
                                <input type="date" id="end_date" class="form-control" value="{{ $inquiry->end_date }}" readonly>
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="room_type">Room Type</label>
                                <input type="text" id="room_type" class="form-control" value="{{ $inquiry->roomType->name ?? 'N/A' }}" readonly>
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="package">Package</label>
                                <input type="text" id="package" class="form-control" value="{{ $inquiry->package->title ?? 'N/A' }}" readonly>
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="message">Message</label>
                                <textarea id="message" class="form-control" rows="3" readonly>{{ $inquiry->message }}</textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
