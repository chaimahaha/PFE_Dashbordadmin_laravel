@extends('AdminDashboard.layouts.sidebar')
@section('title')
  Gestion des utilisateurs
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fonctionnalités /</span> Gestion des utilisateurs</h4>
  <div class="card">
    <h5 class="card-header">Membres</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="table-ligh text-center">
            <th>id</th>
            <th class="col-12 text-justify">Informations & Actions</th>
          </tr>
        </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($users as $user)
              <tr>
                <td><strong>{{$user->id}}</strong></td>
                <td>
                    <div class="row">
                      <div class="col-12 col-md-12d-flex align-items-stretch flex-column " >
                        <div class="card bg-light d-flex flex-fill" >
                          <div class="card-body " style="background-color:rgba(4, 40, 243, 0.014) ">
                            <div class="row" >
                              <div class="col-7"  >
                                <h2 class="lead">{{$user->grade}}<b></b></h2>
                                <div class="dropdown d-flex position-absolute top-0 end-0 ">
                                  <button type="button" class="btn  dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu ">
                                    <a class="dropdown-item" href="{{url('/edit-user'.$user->id)}}"
                                      ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                      @if(!$user->trashed())
                                      <a class="dropdown-item" href="{{url('delete-user?id='.$user->id)}};"
                                      ><i class="bx bx-trash me-1"></i> Delete</a>
                                      @endif
                                      <form action="{{'defineadmin/'.$user->id}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-light bi bi-person-plus-fill ">Definir tant qu'administrateur</button>
                                      </form>
                                      <form action="{{'retireadmin/'.$user->id}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-light">Retirer tant qu'administrateur</button>
                                      </form>
                                  </div>
                                </div>
                                <h5 class="text-sm mt-1" style="font-family: Georgia, 'Times New Roman', Times, serif; color:blue">{{$user->nom}} {{$user->prenom}}</h5>
                                <p class="= text-sm mt-1"><b>{{$user->specialite}} </b></p>
                                <ul class="ml-2 mb-0  fa-ul text-muted">
                                  <li style="color: rgb(1, 72, 119)"><span class="fa-li"><i class="fa fa-envelope" aria-hidden="true"></i> </span>Mail : {{$user->email}}</li>
                                  <li style="color: rgb(1, 72, 119)"><span class="fa-li"><i class="fa fa-phone" aria-hidden="true"></i> </span> Phone #:{{$user->tel}}</li>
                                </ul>
                              </div>
                              <div class="col-3 text-center">
                               <img src="{{url('user_image/'.$user->photo)}} "alt="..." style="border-radius: 50%" width="100px" height="100px">
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
  <a href="adduser" role="button" class="btn btn-primary">Ajouter</a>
</div>
@endsection