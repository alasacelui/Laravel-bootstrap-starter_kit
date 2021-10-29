@extends('layouts.user.userdashboard')

@section('content')
<main class="content">
    <div class="container-fluid pe-5">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3 class="txt_default"><strong>My</strong> Dashboard</h3>
            </div>
        </div>
        <!--
        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex align-self-stretch">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card bg_navy_blue">
                                <div class="card-body d-flex and flex-column">
                                    <a href="#" class="card-title mb-4 text-white text-decoration-none">Total Barangay</a>
                                    <h1 class="mt-1 mb-3 text-white"></h1>0</h1>
                                </div>
                            </div>
                            <div class="card bg_green">
                                <div class="card-body d-flex and flex-column">
                                    <a href="#" class="card-title mb-4 text-white text-decoration-none">Total Residents</a>
                                    <h1 class="mt-1 mb-3 text-white">0</h1>
                                </div>
                            </div>
                            <div class="card bg_navy_blue">
                                <div class="card-body d-flex and flex-column">
                                    <a href="#" class="card-title mb-4 text-white text-decoration-none">Total Events</a>
                                    <h1 class="mt-1 mb-3 text-white">0</h1>
                                </div>
                            </div>
                            <div class="card bg_green">
                                <div class="card-body d-flex and flex-column">
                                    <a href="#" class="card-title mb-4 text-white text-decoration-none">Total Health Issues</a>
                                    <h1 class="mt-1 mb-3 text-white">0}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card bg_navy_blue">
                                <div class="card-body d-flex and flex-column">
                                    <a href="#" class="card-title mb-4 text-white text-decoration-none">Total Barangay Admin</a>
                                    <h1 class="mt-1 mb-3 text-white">0</h1>
                                </div>
                            </div>
                            <div class="card bg_green">
                                <div class="card-body d-flex and flex-column">
                                    <a href="#}" class="card-title mb-4 text-white text-decoration-none">Total Health Profile</a>
                                    <h1 class="mt-1 mb-3 text-white">0</h1>
                                </div>
                            </div>
                            <div class="card bg_navy_blue">
                                <div class="card-body d-flex and flex-column">
                                    <a href="#" class="card-title mb-4 text-white text-decoration-none">Total Pending Events</a>
                                    <h1 class="mt-1 mb-3 text-white">0</h1>
                                </div>
                            </div>
                            <div class="card bg_green">
                                <div class="card-body d-flex and flex-column">
                                    <a href="#" class="card-title mb-4 text-white text-decoration-none">Total Canceled Events</a>
                                    <h1 class="mt-1 mb-3 text-white">0</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-7 d-flex align-self-stretch">
                <div class="card flex-fill w-100">
                    <div class="card-header bg_navy_blue">
                        <h5 class="card-title mb-0 text-white">Map Summary <i class="fas fa-map-marker-alt text-danger ms-1"></i></h5>
                    </div>
                    <div class="card-body py-3 d-flex and flex-column vh-50" id="mapid">
                           {{--Display Map Summary--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="chart chart-sm">
                    <canvas id="chart_total_residents_by_barangay">
                        {{--Display Total Residents by Barangay--}}
                    </canvas>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="chart chart-sm">
                        <canvas id="chart_total_health_issues_by_barangay">
                            {{--Display Total Health Issues By Barangay--}}
                        </canvas>
                    </div>
                  </div>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Activity Logs</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-center">
                            <a class="txt_default" href="#">View all</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Our Brgy. Admins <i class="fas fa-user-cog ms-1"></i> </h5>
                    </div>
                    <div class="card-body px-4">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="d-none d-xl-table-cell">Gender</th>
                                    <th class="d-none d-xl-table-cell">Registed At</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Calendar</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="chart">
                                <div id="datetimepicker-dashboard"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
</main>
@endsection


@section('script')
{{-- <script src="{{ asset('js/shared/statistic.js') }}"></script> --}}

<script>



</script>

@endsection

