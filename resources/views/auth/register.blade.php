@extends('AdminDashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: rgb(42, 165, 69); text-align:center; font-size:20px">S&apos;inscrire</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.form') }}" name="register-form" enctype="multipart/form-data">
                        @csrf
                            <div class="container ">
                                <div class="card mt-3 border-dark  " >
                                    <div class="card-header text-center ">
                                        <div id="success"></div>
                                            <h1 class="well h3" style="color:#22577E">Création du compte membre </h1>
                                            <hr>
                                        </div>
                                    <div class="container">
                                <div class="col mt-2 me-2">  
                        <form action="/store-mem" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        
                            <div class="col-sm-10 mt-3 mx-2">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label class="fw-bold">Nom</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="text" name="nom" placeholder="Enter First Name Here.." class="form-control mt-2 "   >
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="fw-bold">Prénom</label>
                                        <span class="obligatoryFieldMark">*</span>
                                         <input type="text" name="prenom" placeholder="Enter Last Name Here.." class="form-control mt-2" ><br>
                                    </div>
                                </div>	
                                                      
                                <div class="form-group">
                                    <label class="fw-bold">CIN</label>
                                    <input type="text" name="cin" placeholder="CIN" class="form-control mt-2"  id="cin" ><br>
                                </div>
                              
                                <div class="row">
                                                      
                                    <div class="col-sm-6 form-group">
                                        <label class="fw-bold">Num passport (étranger)</label>
                                        <input type="text" name="numpassport" placeholder="Num passport" class="form-control mt-2" ><br>
                                    </div>
                              
                                    <div class="col-sm-6 form-group">
                                        <label class="fw-bold">CNRPS</label>
                                        <input type="text" name="cnrps" placeholder="CNRPS" class="form-control mt-2" ><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label class="fw-bold">Genre</label><span class="obligatoryFieldMark">*</span><br><br>                                                     
                                         <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="feminin"  >
                                                <label class="form-check-label fw-light" for="female" > Féminin</label>
                                                <span class="obligatoryFieldMark">*</span>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="male" value="masculin" >
                                                <label class="form-check-label fw-light" for="male" >Masculin</label>
                                                <span class="obligatoryFieldMark">*</span>
                                            </div>
                                            <br>
                                    </div>
                                    <div class="col-sm-6 form-group">                                
                                        <label class="mr-sm-4 fw-bold" for="inlineFormCustomSelect">Grade</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <select  name="grade" class="custom-select"  selected>
                                            <option value="Professeur">Professeur</option>
                                            <option value="Maître de conférence">Maître de conférence</option>
                                            <option value="Docteur">Docteur</option>
                                            <option value="Chercheur en thèse">Chercheur en thèse</option>
                                            <option value="Chercheur en mastère">Chercheur en mastère</option>
                                            <option value="Ingénieur ">Ingénieur </option>
                                            <option value="Assistant">Assistant</option>
                                            <option value="Maître Assistant">Maître Assistant</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-6 form-group"><br>
                                    <label class="fw-bold">Email</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="email" class="form-control mt-2" placeholder="Votre E-mail">
                                </div><br>
                                <div class="col-sm-6 form-group"><br>
                                    <label class="fw-bold" >Mot de passe</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="password-confirm" class="fw-bold">Confirmer Mot de passe *</label>
                                    <input id="password-confirm" type="password" class="form-control mt-2" name="password_confirmation" placeholder="confirmer mot de passe" required autocomplete="new-password">
                                </div><br> 
                                <div class="col-sm-6 form-group">
                                    <label class="fw-bold">Photo </label>
                                    <input type="file" name="photo" class="form-control mt-2"  >
                                </div>  <br>     
                            </div>
                                          
                                               
                                <div class="row">
                                <div class="col-sm-6 form-group"><br>
                                    <label class="fw-bold">Spécialité</label>
                                    <input type="text" name="specialite" placeholder="Enter Designation Here.." class="form-control mt-2"  >
                                </div>
                                <div class="col-sm-6 form-group"><br>
                                    <label class="fw-bold">Diplome</label>
                                    <input type="text" name="diplome" placeholder="Enter Designation Here.." class="form-control mt-2"  >
                                </div>		
                                </div>    
                                <div class="from-group "><br>
                                    <label for="datedenaissance" class="control-label required fw-bold ">Date de naissance</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="date" class="form-control mt-2" name="date" id="datedenaissance" value="">
                                </div><br>
                                <div class="form-group">
                                    <label class="fw-bold">Fonction administrative</label>
                                    <input type="text" name="fctadmin" placeholder="Fonction administrative" class="form-control mt-2"  ><br>
                                </div>                     
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label class="fw-bold">H-index (Scopus)</label>
                                        <input type="text" name="scopus" placeholder="H-index (Scopus)" class="form-control mt-2" ><br>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="fw-bold">Identification ORCID</label>
                                        <input type="text" name="orcid" placeholder="Identification ORCID" class="form-control mt-2" ><br>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="fw-bold">Tél Mobile</label>
                                            <input type="text" name="tel" placeholder="Enter Phone Number Here.." class="form-control mt-2" > 
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="fw-bold">Tél Fax</label>
                                            <input type="text" name="telfax" placeholder="Enter Phone Number Here.." class="form-control mt-2" id ="tel" > 
                                        </div>		
                                    </div>
                                    <div class="from-group ">
                                        <label for="datedenaissance" class="control-label required fw-bold ">Date du dernier diplôme</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="date" class="form-control mt-2" name="datediplome" id="datediplome"  >
                                    </div><br>
                                </div>
                                </div>	                  
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 m-4 ">
                                <button type="submit" class="btn btn-primary">
                                    S&apos;inscrire
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
