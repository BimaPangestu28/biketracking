@extends('layouts.master')

@section('title') Colors @endsection

@section('content')

     @component('common-components.breadcrumb')
         @slot('title') Colors  @endslot
         @slot('li_1') UI Elements  @endslot
     @endcomponent

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="color-box bg-primary p-4 rounded">
                                        <h5 class="my-2 text-white">#3b5de7</h5>
                                    </div>
                                    <h5 class="mb-0 mt-3 text-primary">Primary</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="color-box bg-success p-4 rounded">
                                        <h5 class="my-2 text-white">#45cb85</h5>
                                    </div>
                                    <h5 class="mb-0 mt-3 text-success">Success</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="color-box bg-info p-4 rounded">
                                        <h5 class="my-2 text-white">#0caadc</h5>
                                    </div>
                                    <h5 class="mb-0 mt-3 text-info">Info</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="color-box bg-warning p-4 rounded">
                                        <h5 class="my-2 text-white">#eeb902</h5>
                                    </div>
                                    <h5 class="mb-0 mt-3 text-warning">Warning</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="color-box bg-danger p-4 rounded">
                                        <h5 class="my-2 text-white">#ff715b</h5>
                                    </div>
                                    <h5 class="mb-0 mt-3 text-danger">Danger</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="color-box bg-dark p-4 rounded">
                                        <h5 class="my-2 text-light">#343a40</h5>
                                    </div>
                                    <h5 class="mb-0 mt-3 text-dark">Dark</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="color-box bg-secondary p-4 rounded">
                                        <h5 class="my-2 text-light">#9095ad</h5>
                                    </div>
                                    <h5 class="mb-0 mt-3 text-muted">Secondary</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    @endsection