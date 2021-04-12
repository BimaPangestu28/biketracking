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
                        <div class="col-12">
                            <div class="row">
                                <h4 class="card-title">Buat Voucher Baru</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <p class="card-title-desc">Disini kamu bisa voucher baru untuk aplikasi Pityu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="custom-validation" action="{{ route('vouchers.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="merchant">Merchant</label>
                        <select name="merchant_id" id="merchant" class="form-control">
                            @foreach($merchants as $merchant)
                            <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="Type something" />
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required placeholder="Type something" />
                    </div>

                    <div class="form-group">
                        <label>Point Redeem</label>
                        <input type="number" name="point_redeem" class="form-control" required placeholder="Type something" />
                    </div>

                    <div class="form-group">
                        <label>Valid until</label>
                        <input type="date" name="valid_until" class="form-control" required placeholder="Type something" />
                    </div>

                    <button class="btn btn-primary form-control">Buat Merchant Baru</button>
                </form>
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