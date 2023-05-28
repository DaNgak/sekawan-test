@extends('layout.main.main')

@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-">Data Persewaan Transport Perusahaan</h1>
        <a href="{{ route('transport.export') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <em class="fas fa-download fa-sm text-white-50"></em>
            Export Transport Data
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ auth()->user()->role === "admin" ? route("transport.index") : route("transport.boss.index") }}" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"  >
                                Data Transport
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Total = {{ $total_transport }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <em class="fas fa-calendar fa-2x text-gray-300"></em>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ auth()->user()->role === "admin" ? route("order.index") : route("order.boss.index") }}" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Order</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Total = {{ $total_order }}</div>
                        </div>
                        <div class="col-auto">
                            <em class="fas fa-dollar-sign fa-2x text-gray-300"></em>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route("driver.index") }}" class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Data Driver
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        Total = {{ $total_driver }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <em class="fas fa-clipboard-list fa-2x text-gray-300"></em>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route("boss.index") }}" class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Data Boss (Atasan)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Data = {{ $total_boss }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <em class="fas fa-comments fa-2x text-gray-300"></em>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-5 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6
                        class="m-0 font-weight-bold text-primary"
                    >
                        Chart Kendaraan
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="min-height: 30rem">
                    <div class="pt-4 pb-2">
                        {!! $chart->container() !!}
                    </div>
                </div>
                <div class="mb-4 text-center small">
                    <span class="mr-2">
                        Total Kendaraan = {{ $total_transport }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
@endsection