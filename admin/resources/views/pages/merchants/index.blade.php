@extends('layouts.master')

@section('title') Pengelolaan Pengguna @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Pengguna @endslot
@slot('li_1') Pengelolaan @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <h4 class="card-title">Pengelolaan Merchant</h4>
                                <p class="card-title-desc">Disini kamu bisa mengelola merchant yang telah mendaftar pada aplikasi Pityu</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row float-right">
                                <a href="{{ route('merchants.create') }}">
                                    <button class="btn btn-primary">Tambah Merchant</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($merchants as $merchant)
                        <tr>
                            <td>{{ $merchant->name }}</td>
                            <td>{{ $merchant->longitude }}</td>
                            <td>{{ $merchant->latitude }}</td>
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