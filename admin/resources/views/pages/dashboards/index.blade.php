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
                    <button class="btn btn-primary form-control">Filter berdasarkan rentang tanggal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">

        @component('common-components.dashboard-widget')

        @slot('title') Total Pengguna @endslot
        @slot('iconClass') mdi mdi-account-multiple-outline @endslot
        @slot('price') {{ $total_users }} @endslot
        @slot('percentage') 0.28% @endslot
        @slot('pClass') progress-bar bg-primary @endslot
        @slot('pValue') 62 @endslot

        @endcomponent

    </div>

    <div class="col-xl-3">
        @component('common-components.dashboard-widget')

        @slot('title') Total Perjalanan @endslot
        @slot('iconClass') mdi mdi-account-multiple-outline @endslot
        @slot('price') {{ $total_trips }} @endslot
        @slot('percentage') 0.16% @endslot
        @slot('pClass') progress-bar bg-success @endslot
        @slot('pValue') 62 @endslot

        @endcomponent
    </div>

    <div class="col-xl-3">
        @component('common-components.dashboard-widget')

        @slot('title') Total Jarak @endslot
        @slot('iconClass') mdi mdi-account-multiple-outline @endslot
        @slot('price') {{ $total_distances }} KM @endslot
        @slot('percentage') 0.16% @endslot
        @slot('pClass') progress-bar bg-success @endslot
        @slot('pValue') 62 @endslot

        @endcomponent
    </div>

    <div class="col-xl-3">
        @component('common-components.dashboard-widget')

        @slot('title') Total BBM Dihemat @endslot
        @slot('iconClass') mdi mdi-account-multiple-outline @endslot
        @slot('price') {{ $total_fuel_reduce }} Liter @endslot
        @slot('percentage') 0.16% @endslot
        @slot('pClass') progress-bar bg-success @endslot
        @slot('pValue') 62 @endslot

        @endcomponent
    </div>

    <div class="col-xl-6">
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
    </div>
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