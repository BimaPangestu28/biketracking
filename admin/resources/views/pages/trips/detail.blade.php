@extends('layouts.master')

@section('title') Detail Perjalanan @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Perjalanan @endslot
@slot('li_1') Detail @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Pengelolaan Detail Perjalanan</h4>
                <p class="card-title-desc">Disini kamu bisa melihat detail perjalanan perjalanan yang telah mendaftar pada aplikasi Pityu
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Category</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Distance (KM)</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($trips as $trip)
                        <tr>
                            <td>{{ $trip->user->name }}</td>
                            <td>{{ $trip->category->name }}</td>
                            <td>{{ $trip->start }}</td>
                            <td>{{ $trip->end }}</td>
                            <td>{{ $trip->distance }}</td>
                            <td>{{ $trip->time }}</td>
                            <td>
                                <a href="{{ route('trips.detail') }}">
                                    <button class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection

@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection