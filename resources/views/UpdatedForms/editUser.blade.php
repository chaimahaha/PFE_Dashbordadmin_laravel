@extends('layouts.sidebar')
@section('title')
Editer utilisateur
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h4 class="fw-bold py-3 mb-4" >
                <span class="text-muted fw-light">Fonctionnalités </span>
                 <span class="text-muted fw-light" > /</span>
                <a  class="text-muted fw-light" href="userManager"> Gestion des utilisateurs </a>
                <span class="text-muted fw-light" > /</span> Editer Utilisateur</h4>
          </div><!-- /.col -->
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-15">
              <div class="card">
  
                  <div class="card-body">
                      <form method="POST" action="/update-user{{$users->id}}" name="register-form" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="row mb-3">
                              <label for="name" class="col-md-4 col-form-label text-md-end" style='color:#0645f3; font-size:15px; font-family:MV Boli;'>{{ __('Nom') }}</label>
  
                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$users->name}}" placeholder="Nom" required autocomplete="name" autofocus>
  
                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="surname" class="col-md-4 col-form-label text-md-end" style='color:#0645f3; font-size:15px; font-family:MV Boli;'>{{ __('Prenom') }}</label>
  
                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$users->surname}}" placeholder="Prenom" required  autofocus>
  
                                  @error('surname')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="phone" class="col-md-4 col-form-label text-md-end" style='color:#0645f3; font-size:15px; font-family:MV Boli;'>{{ __('Téléphone') }}</label>
  
                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$users->phone}}" placeholder="+216..." required  autofocus>
  
                                  @error('phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="position" class="col-md-4 col-form-label text-md-end" style='color:#0645f3; font-size:15px; font-family:MV Boli;'>{{ __('Position') }}</label>
                              <div class="col-md-6">
                                      <input id="name" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{$users->position}}" placeholder="Co-administrateur1,Co-administrateur2.." required  autofocus>                                            
                                  @error('position')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="email" class="col-md-4 col-form-label text-md-end" style='color:#0645f3; font-size:15px; font-family:MV Boli;'>{{ __('Addresse mail ') }}</label>
  
                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$users->email}}" placeholder="....@mail.com" required autocomplete="email">
  
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
        
                          <div class="row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-info">
                                      {{ __('Editer') }}
                                  </button>
                              </div>
                          </div>
                     
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection