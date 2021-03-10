@extends('layouts.master')

@section('title') Starter Page @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Starter Page  @endslot
         @slot('li_1') Pages  @endslot
     @endcomponent

@endsection