@extends('layouts.master')

@section('title') Pengelolaan Merchant @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Merchant @endslot
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
                                <h4 class="card-title">Buat Merchant Baru</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <p class="card-title-desc">Disini kamu bisa membuat merchant baru untuk aplikasi Pityu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="custom-validation" action="{{ route('merchants.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="Type something" />
                    </div>

                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" required placeholder="Type something" />
                    </div>

                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" required placeholder="Type something" />
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required placeholder="Type something" />
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