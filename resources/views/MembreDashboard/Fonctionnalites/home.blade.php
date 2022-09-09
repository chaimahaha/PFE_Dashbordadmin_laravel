@extends('MembreDashboard.Fonctionnalites.layouts.sidebar')
@section('title')
    Bienvenue {{Auth::user()->prenom}}
@endsection