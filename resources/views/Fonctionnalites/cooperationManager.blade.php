@extends('layouts.sidebar')
@section('title')
  Gestion des coopérations
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fonctionnalités /</span> Gestion des coopérations</h4>
    <div class="card">
      <h5 class="card-header">Coopérations</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr class="table-info">
              <th>Id</th>
              <th>Type</th>
              <th>Institution</th>
              <th>Intervenant</th>
              <th>Date debut</th>
              <th>Date fin</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($cooperations as $coop)
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
              <strong>{{$coop->id}}</strong></td>
              <td>{{$coop->type}}</td>
              <td>{{$coop->institution}}</td>
              <td>{{$coop->intervenantnat}}, {{$coop->intervenantin}}</td>
              <td>{{$coop->date_start}}</td>
              <td>{{$coop->date_end}}</td>
              <td>
                <div class="dropdown d-flex">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('/edit-coop'.$coop->id)}}">
                      <i class="bx bx-edit-alt me-1"></i> Edit</a>
                      @if(!$coop->trashed())
                    <a class="dropdown-item" href="{{url('delete-coop?id='.$coop->id)}};">
                      <i class="bx bx-trash me-1"></i> Delete</a>
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
    <a href="addcoop" role="button" class="btn btn-primary">Ajouter</a>
</div>

@endsection