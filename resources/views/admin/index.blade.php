@extends('admin.layouts.main')
@section('title', 'Dashboard')
@section('section')
    @php
        $breadcrumbs = [
            [ 'name' => 'Dashboard', 'url' => route('admin.dashboard') ], 
            ['name' => '', 'url' => '']
        ];
    @endphp

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>100</h3>
                            <p>Total Pending Orders</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-truck"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>100</h3>
                            <p>Total Shipped Orders</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-truck"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>100</h3>
                            <p>Total Delivered Orders</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-truck"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>100</h3>
                            <p>Total Cancel Orders</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-truck"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>

            {{-- for chart --}}
            {{-- <div class="row mt-5">
                <div class="col-12 col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body pt-0">
                            <div style="width: 80%; margin: auto;">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </section>

    {{-- for chart js if needed in future --}}
    {{-- <script src="{{ asset('admin_asset/chart.js') }}"></script>
    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Total Sales',
                    data: @json($data['data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '₹' + value;
                            }
                        }
                    }
                }
            }
        });
    </script> --}}

@endsection
