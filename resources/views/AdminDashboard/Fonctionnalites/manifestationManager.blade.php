@extends('AdminDashboard.layouts.sidebar')
@section('title')
  Gestion des manifestations
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fonctionnalités /</span> Gestion des manifestations</h4>
              <div class="card">
                <h5 class="card-header">Conférence</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="table-secondary">
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Lieu</th>
                        <th>Classe</th>
                        <th>Prix Participation(Dt)</th>
                        <th>Date Début</th>
                        <th>Date Fin</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($manifestations as $manif)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
                          <strong>{{$manif->id}}</strong></td>
                          <td>{{$manif->titre}}</td>
                          <td>{{$manif->lieu}}</td>
                          <td>{{$manif->class}}</td>
                          <td>{{$manif->prix}}</td>
                          <td>{{$manif->date_start}}</td>
                          <td>{{$manif->date_end}}</td>
                        <td>
                          <div class="dropdown d-flex">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('/edit-conf'.$manif->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              @if(!$manif->trashed())
                              <a class="dropdown-item" href="{{url('delete-manif?id='.$manif->id)}};"
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
                <a href="addconf" role="button" class="btn btn-primary">Ajouter</a>
              </div>
              <div class="card my-4">
                <h5 class="card-header">Formation</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="table-warning">
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Lieu</th>
                        <th>Formateur</th>
                        <th>Prix (Dt)</th>
                        <th>Date Début</th>
                        <th>Date Fin</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($formations as $forma)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
                          <strong>{{$forma->id}}</strong></td>
                          <td>{{$forma->titre}}</td>
                          <td>{{$forma->lieu}}</td>
                          <td>{{$forma->formateur}}</td>
                          <td>{{$forma->prix}}</td>
                          <td>{{$forma->date_start}}</td>
                          <td>{{$forma->date_end}}</td>
                        <td>
                          <div class="dropdown d-flex">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('/edit-forma'.$forma->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              @if(!$forma->trashed())
                              <a class="dropdown-item" href="{{url('delete-forma?id='.$forma->id)}};"
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
                <a href="addform" role="button" class="btn btn-primary">Ajouter</a>
              </div>
@endsection