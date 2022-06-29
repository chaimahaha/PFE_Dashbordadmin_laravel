@extends('layouts.sidebar')
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
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                        <td>Setit</td>
                        <td><img src="C:\Users\ASUS\Desktop\logosetit.jpg"></td>
                        <td>evenemeent en mai 2022</td>
                        <td>
                          <div class="dropdown d-flex">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="mt-2">
                <a href="formevent" role="button" class="btn btn-primary">Ajouter</a>
                </div>
@endsection