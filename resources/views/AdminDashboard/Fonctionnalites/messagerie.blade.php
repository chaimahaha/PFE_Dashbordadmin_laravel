@extends('AdminDashboard.layouts.sidebar')
@section('title')
  Messagerie
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Messagerie /</span></h4>
  <div class="card">
    <h5 class="card-header">Messages</h5>
    @foreach ($messages as $msg)
        <div class="table-responsive text-nowrap">
          {{--@foreach($users as $user)--}}
         <span class="text-muted fw-light"> {{\App\Models\User::findOrFail($msg->id_user)->nom}} {{\App\Models\User::findOrFail($msg->id_user)->prenom}}:</span> 
         
         {{$msg->msg}}
    </div> <hr> <br>
    @endforeach
    
  </div>
</div>
@endsection