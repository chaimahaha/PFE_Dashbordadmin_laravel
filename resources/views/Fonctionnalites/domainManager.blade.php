@extends('layouts.sidebar')
@section('title')
  Gestion des domaines
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fonctionnalités /</span> Gestion des domaines</h4>
    <div class="card">
      <h5 class="card-header">Domaines de recherche</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr class="table-info text-center">
              <th>id</th>
              <th class="col-12 ">Informations & Actions</th>
            </tr>
          </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($domaines as $dom)
                <tr>
                  <td><strong>{{$dom->id}}</strong></td>
                  <td>
                      <div class="row">
                        <div class="col-12 col-md-12d-flex align-items-stretch flex-column " >
                          <div class="card bg-light d-flex flex-fill" >
                            <div class="card-body ">
                              <div class="row" >
                                <div class="col-7"  >
                                  <h1 class="lead" style="color: rgb(47, 15, 228)"><strong> {{$dom->titre}}</strong><b></b></h1>
                                  <div class="dropdown d-flex position-absolute top-0 end-0 ">
                                    <button type="button" class="btn  dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu ">
                                      <a class="dropdown-item" href="{{url('/edit-dom'.$dom->id)}}"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                      @if(!$dom->trashed())
                                        <a class="dropdown-item" href="{{url('delete-dom?id='.$dom->id)}};"
                                        ><i class="bx bx-trash me-1"></i> Delete</a>
                                      @endif
                                    </div>
                                  </div>
                                  <p class="text-muted text-sm mt-1"><b> {{$dom->description}}</b></p>
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
<div class="mt-2">
    <a href="adddom" role="button" class="btn btn-primary">Ajouter</a>
    </div>
@endsection