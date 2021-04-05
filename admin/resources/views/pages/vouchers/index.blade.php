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

                <h4 class="card-title">Pengelolaan Pengguna</h4>
                <p class="card-title-desc">Disini kamu bisa mengelola pengguna yang telah mendaftar pada aplikasi Pityu
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Merchant</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Point Redeem</th>
                            <th>Valid Until</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($vouchers as $voucher)
                        <tr>
                            <td>{{ $voucher->merchant->name }}</td>
                            <td>{{ $voucher->name }}</td>
                            <td><img src="{{ $voucher->image }}" alt="Voucher"></td>
                            <td>{{ $voucher->point_redeem }}</td>
                            <td>{{ $voucher->valid_until }}</td>
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