 <div class="card">

                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar-sm font-size-20 mr-3">
                                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                                    <i class="{{$iconClass}}"></i>
                                                </span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-size-16 mt-2">{{$title}}</div>
                                        </div>
                                    </div>
                                    <h4 class="mt-4">{{ $price }}</h4>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="mb-0"><span class="text-success mr-2"> {{ $percentage }} <i class="mdi mdi-arrow-up"></i> </span></p>
                                        </div>
                                        <div class="col-5 align-self-center">
                                            <div class="progress progress-sm">
                                                <div class="{{$pClass}}" role="progressbar" style="width: 62%" aria-valuenow="{{$pValue}}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>