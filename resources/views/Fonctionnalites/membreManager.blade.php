@extends('layouts.sidebar')
@section('title')
  Gestion des membres
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fonctionnalités /</span> Gestion des membres</h4>
  <div class="card">
    <h5 class="card-header">Membres</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="table-ligh text-center">
            <th>id</th>
            <th class="col-12 ">Informations & Actions</th>
          </tr>
        </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($membres as $mem)
              <tr>
                <td><strong>{{$mem->id}}</strong></td>
                <td>
                    <div class="row">
                      <div class="col-12 col-md-12d-flex align-items-stretch flex-column " >
                        <div class="card bg-light d-flex flex-fill" >
                          <div class="card-body " style="background-color:rgba(4, 40, 243, 0.014) ">
                            <div class="row" >
                              <div class="col-7"  >
                                <h2 class="lead">{{$mem->grade}}<b></b></h2>
                                <div class="dropdown d-flex position-absolute top-0 end-0 ">
                                  <button type="button" class="btn  dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu ">
                                    <a class="dropdown-item" href="{{url('/edit-mem'.$mem->id)}}"
                                      ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                      @if(!$mem->trashed())
                                      <a class="dropdown-item" href="{{url('delete-mem?id='.$mem->id)}};"
                                      ><i class="bx bx-trash me-1"></i> Delete</a>
                                    @endif
                                  </div>
                                </div>
                                <p class="= text-sm mt-1"><b>{{$mem->specialite}} </b></p>
                                <ul class="ml-2 mb-0  fa-ul text-muted">
                                  <li style="color: rgb(1, 72, 119)"><span class="fa-li"><i class="fa fa-envelope" aria-hidden="true"></i> </span>Mail : {{$mem->mail}}</li>
                                  <li style="color: rgb(1, 72, 119)"><span class="fa-li"><i class="fa fa-phone" aria-hidden="true"></i> </span> Phone #:{{$mem->tel}}</li>
                                </ul>
                              </div>
                              <div class="col-3 text-center">
                               <img src="{{url('membre_image/'.$mem->photo)}} "alt="..." style="border-radius: 50%" width="100px" height="100px">
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      
                      </div>
                      
                    </div>
                   
                  </div>
                </td>
              </tr>
              @endforeach    
            </tbody>
      </table>  
    </div>
  </div>
</div>
<div>
  <a href="addmem" role="button" class="btn btn-primary">Ajouter</a>
</div>
@endsection