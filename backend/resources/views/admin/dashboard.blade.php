<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div class="row">
            {{-- <div class="col-sm-12">
                <div class="card">
                    <div class="card-body w-50 mx-auto">
                   
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-12 col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Total Visitors</h4>
                        <p class="fs-1">{{ $totalVisits }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Total Registed Users</h4>
                        <p class="fs-1">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Total Packages Listed</h4>
                        <p class="fs-1">{{ $totalPackages }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Booking Status</h4>
                        <canvas id="bookingChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data for the pie chart (replace these with your actual data)
        const pendingCount = {{ $pendingBookings }};
        const approvedCount = {{ $approvedBookings }};
        const declinedCount = {{ $declinedBookings }};

        // Check if there is any data to display
        if (pendingCount === 0 && approvedCount === 0 && declinedCount === 0) {
            document.getElementById('bookingChart').parentElement.innerHTML = `
                <h5>No Packages</h5>
                <p style="color: #888;">There are currently no booking data available.</p>
            `;
        } else {
            // Chart.js setup
            const ctx = document.getElementById('bookingChart').getContext('2d');
            const bookingChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Pending', 'Approved', 'Declined'],
                    datasets: [{
                        data: [pendingCount, approvedCount, declinedCount],
                        backgroundColor: ['#FFC107', '#28A745', '#DC3545'],
                        borderColor: '#fff',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        },
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    }
                }
            });
        }
    </script>
</x-app-layout>