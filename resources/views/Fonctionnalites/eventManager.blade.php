@extends('layouts.sidebar')
@section('title')
  Gestion des évenements
@endsection
@section('content')
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fonctionnalités /</span> Gestion des evènements</h4>
              <div class="card">
                <h5 class="card-header">Utilisateurs</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table ">
                    <thead>
                      <tr class="table-info">
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($events as $event)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$event->id}}</strong></td>
                        <td>{{$event->titre}}</td>
                        <td><img src="{{url('event_image/'.$event->image)}}" alt="" width="30px" height="30px"/></td>
                        <td>{{$event->description}}</td>
                        <td>
                          <div class="dropdown d-flex">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('/edit-event'.$event->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                @if(!$event->trashed())
                              <a class="dropdown-item" href="{{url('delete-event?id='.$event->id)}};"
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
                <a href="add_event" role="button" class="btn btn-primary">Ajouter</a>
                </div>
@endsection