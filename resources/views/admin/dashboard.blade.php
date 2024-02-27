@extends('layouts.backend.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
    <div class="container-fluid py-4">
        <div class="row  mt-n2">
            <div class="col-xl-8 col-lg-7">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card overflow-hidden">
                            <div class="card-header p-3 pb-0">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Visitors</p>
                                <h5 class="font-weight-bolder mb-0">
                                    5,927
                                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="chart">
                                    <canvas id="chart-line-1" class="chart-canvas" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-sm-0 mt-4">
                        <div class="card overflow-hidden">
                            <div class="card-header p-3 pb-0">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Income</p>
                                <h5 class="font-weight-bolder mb-0">
                                    $130,832
                                    <span class="text-success text-sm font-weight-bolder">+90%</span>
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="chart">
                                    <canvas id="chart-line-2" class="chart-canvas" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">Transactions</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <i class="far fa-calendar-alt me-2"></i>
                                <small>23 - 30 March 2021</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                                            <span class="text-xs">27 March 2020, at 12:30 PM</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold ms-auto">
                                        - $ 2,500
                                    </div>
                                </div>
                                <hr class="horizontal dark mt-3 mb-2" />
                            </li>
                            <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Apple</h6>
                                            <span class="text-xs">23 March 2020, at 04:30 AM</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold ms-auto">
                                        + $ 2,000
                                    </div>
                                </div>
                                <hr class="horizontal dark mt-3 mb-2" />
                            </li>
                            <li class="list-group-item border-0 justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Partner #22213</h6>
                                            <span class="text-xs">19 March 2020, at 02:50 AM</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold ms-auto">
                                        + $ 1,400
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mt-sm-0 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">Revenue</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <i class="far fa-calendar-alt me-2"></i>
                                <small>01 - 07 June 2021</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">via PayPal</h6>
                                            <span class="text-xs">07 June 2021, at 09:00 AM</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold ms-auto">
                                        + $ 4,999
                                    </div>
                                </div>
                                <hr class="horizontal dark mt-3 mb-2" />
                            </li>
                            <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Partner #90211</h6>
                                            <span class="text-xs">07 June 2021, at 05:50 AM</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold ms-auto">
                                        + $ 700
                                    </div>
                                </div>
                                <hr class="horizontal dark mt-3 mb-2" />
                            </li>
                            <li class="list-group-item border-0 justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Services</h6>
                                            <span class="text-xs">07 June 2021, at 07:10 PM</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold ms-auto">
                                        - $ 1,800
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
{{--<script src="{{ asset('assets/backend/js/core/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/backend/js/core/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/backend/js/plugins/perfect-scrollbar.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/backend/js/plugins/smooth-scrollbar.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/backend/js/plugins/fullcalendar.min.js') }} "></script>--}}
{{--<!-- Kanban scripts -->--}}
{{--<script src="{{ asset('assets/backend/js/plugins/dragula/dragula.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/backend/js/plugins/jkanban/jkanban.js') }} "></script>--}}
{{--<script src="{{ asset('assets/backend/js/plugins/chartjs.min.js') }} "></script>--}}
<script>
    var ctx1 = document.getElementById("chart-line-1").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.02)');
    gradientStroke1.addColorStop(0.2, 'rgba(130, 94, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)'); //purple colors

    var ctx2 = document.getElementById("chart-line-2").getContext("2d");

    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Visitors",
                tension: 0.5,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                borderWidth: 2,
                backgroundColor: gradientStroke1,
                data: [50, 45, 60, 60, 80, 65, 90, 80, 100],
                maxBarThickness: 6,
                fill: true
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#9ca2b7'
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#9ca2b7'
                    }
                },
            },
        },
    });

    new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Income",
                tension: 0.5,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                borderWidth: 2,
                backgroundColor: gradientStroke1,
                data: [60, 80, 75, 90, 67, 100, 90, 110, 120],
                maxBarThickness: 6,
                fill: true
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            return '$' + value;
                        },
                        display: true,
                        padding: 10,
                        color: '#9ca2b7'
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#9ca2b7'
                    }
                },
            },
        },
    });
</script>
{{--<script>--}}
{{--    var win = navigator.platform.indexOf('Win') > -1;--}}
{{--    if (win && document.querySelector('#sidenav-scrollbar')) {--}}
{{--        var options = {--}}
{{--            damping: '0.5'--}}
{{--        }--}}
{{--        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);--}}
{{--    }--}}
{{--</script>--}}
{{--<script async defer src="https://buttons.github.io/buttons.js"></script>--}}
{{--<script src="{{ asset('assets/backend/js/argon-dashboard.min.js?v=2.0.5') }}"></script>--}}
@endpush
</html>
