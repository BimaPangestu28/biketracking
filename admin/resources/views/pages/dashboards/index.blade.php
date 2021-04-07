@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Dashboard @endslot
@slot('title_li') Welcome to Pityu Dashboard @endslot
@endcomponent

<div class="row">
    <div class="col-xl-12 mb-3">
        <div class="row">
            <div class="col-xl-4">
                <label>Pilih rentang tanggal</label>
                <div>
                    <div class="input-daterange input-group" data-provide="datepicker">
                        <input type="text" class="form-control" name="start" />
                        <input type="text" class="form-control" name="end" />
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <label for="">&nbsp;</label>
                <div>
                    <button id="filter" class="btn btn-primary form-control">Filter berdasarkan rentang tanggal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="avatar-sm font-size-20 mr-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <div class="font-size-16 mt-2">Total Pengguna</div>
                    </div>
                </div>
                <h4 class="mt-4" id="total-user">{{ $total_users }}</h4>
                <div class="row">
                    <div class="col-7">
                        <!-- <p class="mb-0"><span class="text-success mr-2">0.28%<i class="mdi mdi-arrow-up"></i> </span></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="avatar-sm font-size-20 mr-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <div class="font-size-16 mt-2">Total Perjalanan</div>
                    </div>
                </div>
                <h4 class="mt-4" id="total-user"><span id="total-trip">{{ $total_trips }}</span></h4>
                <div class="row">
                    <div class="col-7">
                        <!-- <p class="mb-0"><span class="text-success mr-2">0.28%<i class="mdi mdi-arrow-up"></i> </span></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="avatar-sm font-size-20 mr-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <div class="font-size-16 mt-2" id="total-trip">Total Jarak</div>
                    </div>
                </div>
                <h4 class="mt-4"><span id="total-distance">{{ $total_distances }}</span> KM</h4>
                <div class="row">
                    <div class="col-7">
                        <!-- <p class="mb-0"><span class="text-success mr-2">0.28%<i class="mdi mdi-arrow-up"></i> </span></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="avatar-sm font-size-20 mr-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <div class="font-size-16 mt-2" id="total-trip">Total BBM Dihemat</div>
                    </div>
                </div>
                <h4 class="mt-4"><span id="total-fuel">{{ $total_fuel_reduce }}</span> Liter</h4>
                <div class="row">
                    <div class="col-7">
                        <!-- <p class="mb-0"><span class="text-success mr-2">0.28%<i class="mdi mdi-arrow-up"></i> </span></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Statistik Total Pengguna</h4>

                <div id="line-chart-total-users" class="apex-charts"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Statistik Total Perjalanan</h4>

                <div id="line-chart-total-trips" class="apex-charts"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Statistik Total Jarak</h4>

                <div id="line-chart-total-distances" class="apex-charts"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Statistik Total BBM Di Hemat</h4>

                <div id="line-chart-total-fuel" class="apex-charts"></div>
            </div>
        </div>
    </div> -->
</div>
<!-- end row -->
@endsection

@section('script')
<!-- plugin js -->
<script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<!-- jquery.vectormap map -->
<script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

<!-- Calendar init -->
<script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>
@endsection