<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title">Pending Inquiries</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="light">
                                        <th>S.N.</th>
                                        <th>Email</th>
                                        <th>No.of Guests</th>
                                        <th>Package</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pendingInquiries as $inquiry)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $inquiry->email }}</td>
                                        <td>{{ $inquiry->people }}</td>
                                        <td>{{ $inquiry->package->title ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('inquiry.show', $inquiry->slug) }}"
                                                class="btn btn-primary btn-sm">View</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No inquiry found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>