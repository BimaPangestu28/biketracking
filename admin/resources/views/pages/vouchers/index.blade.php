@extends('layouts.master')

@section('title') Pengelolaan Voucher @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Voucher @endslot
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
                                <h4 class="card-title">Pengelolaan Voucher</h4>
                                <p class="card-title-desc">Disini kamu bisa mengelola voucher yang telah terdaftar pada aplikasi Pityu
                                </p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row float-right">
                                <a href="{{ route('vouchers.create') }}">
                                    <button class="btn btn-primary">Buat Voucher</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Merchant</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Point Redeem</th>
                            <th>Valid Until</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($vouchers as $voucher)
                        <tr>
                            <td>{{ $voucher->merchant->name }}</td>
                            <td>{{ $voucher->name }}</td>
                            <td><img width="300px" src="{{ url($voucher->image) }}" alt="Voucher"></td>
                            <td>{{ $voucher->point_redeem }}</td>
                            <td>{{ date('d F Y', strtotime($voucher->valid_until)) }}</td>
                            <td>
                                <form action="{{ route('vouchers.delete', $voucher->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete" />
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
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