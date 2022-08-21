@extends('layouts.sidebar')
@section('title')
  Gestion des actualités
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fonctionnalités /</span> Gestion des actualités</h4>
    <div class="card">
      <h5 class="card-header">Utilisateurs</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr class="table-danger">
              <th>Id</th>
              <th>Titre</th>
              <th>Image</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach( $actualities as $act)
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
              <strong>{{$act->id}}</strong></td>
              <td>{{$act->titre}}</td>
              <td><img src="{{url('actuality_image/'.$act->image)}}" alt="" width="30px" height="30px"/></td>
              <td>{{$act->description}}</td>
              <td>
                <div class="dropdown d-flex">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('/edit-act'.$act->id)}}"
                      ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      @if(!$act->trashed())
                    <a class="dropdown-item" href="{{url('delete-act?id='.$act->id)}};"
                      ><i class="bx bx-trash me-1"></i> Delete</a>
                      @endif
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
<div class="mt-2">
    <a href="addact" role="button" class="btn btn-primary">Ajouter</a>
    </div>
@endsection