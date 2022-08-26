@extends('MembreDashboard.Fonctionnalites.layouts.sidebar')
@section('title')
    Hello {{Auth::user()->prenom}}
@endsection