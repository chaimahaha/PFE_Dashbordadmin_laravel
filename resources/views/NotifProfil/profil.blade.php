@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0">{{Auth::user()->name}}</h3>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28 mt-2"><span class="display-26 text-secondary me-2 font-weight-600">Position:</span> Administrateur</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span>{{Auth::user()->email}}</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Website:</span> www.setit.rnu.tn/</li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> 507 - 541 - 4567</li>
                                </ul>
                                <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                    <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection