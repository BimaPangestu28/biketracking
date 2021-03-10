@extends('layouts.master')

@section('title') Calendar @endsection

@section('css')
<!-- Plugin css -->
<link href="{{URL::asset('/libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

    @component('common-components.breadcrumb')
         @slot('title') Calendar  @endslot
     @endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id='calendar'></div>

                <div style='clear:both'></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('script')
<!-- plugin js -->
<script src="{{URL::asset('/libs/moment/moment.min.js')}}"></script>
<script src="{{URL::asset('/libs/fullcalendar/fullcalendar.min.js')}}"></script>

<!-- Calendar init -->
<script src="{{URL::asset('/js/pages/calendar.init.js')}}"></script>
@endsection