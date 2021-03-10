@extends('layouts.master')

@section('title') Form Editors @endsection

@section('css')
<!-- Summernote css -->
<link href="{{URL::asset('/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

   @component('common-components.breadcrumb')
         @slot('title') Form Editors  @endslot
         @slot('li_1') Forms  @endslot
     @endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Tinymce wysihtml5</h4>
                <p class="card-title-desc">Bootstrap-wysihtml5 is a javascript plugin that makes it easy to create simple, beautiful wysiwyg editors with the help of wysihtml5 and Twitter Bootstrap.</p>

                <form method="post">
                    <textarea id="elm1" name="area"></textarea>
                </form>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Summernote</h4>
                <p class="card-title-desc">Super simple wysiwyg editor on bootstrap</p>

                <div class="summernote">Hello Summernote</div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection

@section('script')

<!--tinymce js-->
<script src="{{URL::asset('/libs/tinymce/tinymce.min.js')}}"></script>
<!-- Summernote js -->
<script src="{{URL::asset('/libs/summernote/summernote.min.js')}}"></script>
<!-- init js -->
<script src="{{URL::asset('/js/pages/form-editor.init.js')}}"></script>

@endsection