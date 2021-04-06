@extends('layouts.master')

@section('title') Pengelolaan Kategori Perjalanan @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Kategori Perjalanan @endslot
@slot('li_1') Pengelolaan @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <h4 class="card-title">Pengelolaan Kategori Perjalanan</h4>
                                <p class="card-title-desc">Disini kamu bisa mengelola kategori perjalanan yang telah mendaftar pada aplikasi Pityu
                                </p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row float-right">
                                <a href="{{ route('trips.categories.create') }}">
                                    <button class="btn btn-primary">Buat Kategori Perjalanan</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td><img src="{{ url($category->image) }}" alt="{{ $category->name }}"></td>
                            <td>
                                <form action="{{ route('trips.categories.delete', $category->id) }}" method="post">
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