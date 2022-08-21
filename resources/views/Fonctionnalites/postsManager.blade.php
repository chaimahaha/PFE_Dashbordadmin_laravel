@extends('layouts.sidebar')
@section('title')
  Gestion des publications
@endsection
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fonctionnalités /</span> Gestion des publications</h4>
    <div class="card">
      <h5 class="card-header">Publications</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr class="table-danger">
              <th>Id</th>
              <th>Type</th>
              <th>Titre</th>
              <th>Auteurs</th>
              <th>Soumessionaire</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($auteurs as $aut)
            <tr class="tab">
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
              <strong>{{$aut->id}}</strong></td>
              <td>{{$aut->titre}}</td>
              <td>{{$aut->encadrant}}</td>
              <td>{{$aut->date}}</td>
              <td>{{Auth::user()->email}}</td>
              <td></td>
              <td>
                <div class="dropdown d-flex">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-edit-alt me-1" ></i> Edit</a>
                      @if(!$aut->trashed())
                    <a class="dropdown-item" href="{{url('delete-auteur?id='.$aut->id)}}" >
                      <i class="bx bx-trash me-1" id="hide"></i> Delete</a>
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
    <a href="addpost" role="button" class="btn btn-primary">Ajouter</a>
      </div>
     
@endsection