@extends('AdminDashboard.layouts.sidebar')
@section('title')
ABOUT ME 
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="{{url('user_image/'.Auth::user()->photo)}} "  alt="..." width="280px" height="280px">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0" style="text-transform: uppercase;">{{Auth::user()->prenom}} {{Auth::user()->nom}} </h3>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28 mt-2"><span class="display-26 text-secondary me-2 font-weight-600">Grade:</span> {{Auth::user()->grade}}</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span>{{Auth::user()->email}}</li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Telephone:</span> {{Auth::user()->tel}}</li>
                                </ul>
                                <div class="col-3">
                                    <a class="dropdown-item btn btn-info" href="{{url('/edit-user'.Auth::user()->id)}}"
                                        ><i class="bx bx-edit-alt me-1 "></i> Edit</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection