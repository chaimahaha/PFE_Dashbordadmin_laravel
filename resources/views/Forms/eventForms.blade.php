@extends('layouts.sidebar')
@section('content')
<form class="m-1" action="{{Route('posts.store')}}" method="POST">

  {{@csrf_field()}}
    <div class="mb-3">
      <label class="form-label" for="name">Nom</label>
      <input type="text" class="form-control" id="name" placeholder="Nom de l'evenement" name="nom" />
    </div>
    <div class="mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea
          id="description"
          class="form-control"
          placeholder="Décrire votre evénement... "
          name="description"
        ></textarea>
      </div>
    <div class="mb-3">
      <label class="form-label" for="basic-default-company">Date</label>
      <input type="date" class="form-control" id="start"  />
    </div>
    <div class="mb-3">
      <label class="form-label" for="basic-default-email">Image</label>
      <div class="input-group input-group-merge">
        <input
          type="file"
          id="formFile"
          class="form-control"
        />
      </div>
        <div class="mt-2">
            <input type="submit" class="btn btn-primary" name="submit" value="Send">
        </div>
    </form>
  @endsection