@extends('MembreDashboard.Fonctionnalites.layouts.sidebar')
@section('title')
Editer Membre {{$users->id}}
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container ">
        <div class="card mt-3 border-dark  " >
            <div class="card-header text-center ">
                <div id="success"></div>
                    <h1 class="well h3" style="color:#22577E">Mettre à jour du compte membre </h1>
                    <hr>
                </div>
            <div class="container">
        <div class="col mt-2 me-2">  
<form action="/update-user{{$users->id}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT')
    <div class="col-sm-10 mt-3 mx-2">
        <div class="row">
            <div class="col-sm-6 form-group">
                <label class="fw-bold">Nom</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="nom" placeholder="Enter First Name Here.." class="form-control mt-2 " value="{{$users->nom}}"  >
            </div>
            <div class="col-sm-6 form-group">
                <label class="fw-bold">Prénom</label>
                <span class="obligatoryFieldMark">*</span>
                 <input type="text" name="prenom" placeholder="Enter Last Name Here.." class="form-control mt-2"  value="{{$users->prenom}}" ><br>
            </div>
        </div>	
                              
        <div class="form-group">
            <label class="fw-bold">CIN</label>
            <input type="text" name="cin" placeholder="CIN" class="form-control mt-2"  id="cin"  value={{$users->cin}} ><br>
        </div>
      
        <div class="row">
                              
            <div class="col-sm-6 form-group">
                <label class="fw-bold">Num passport (étranger)</label>
                <input type="text" name="numpassport" placeholder="Num passport" class="form-control mt-2"  value={{$users->numpassport}} ><br>
            </div>
      
            <div class="col-sm-6 form-group">
                <label class="fw-bold">CNRPS</label>
                <input type="text" name="cnrps" placeholder="CNRPS" class="form-control mt-2"  value={{$users->cnrps}} ><br>
            </div>
        </div>
        <label class="fw-bold">Genre</label><span class="obligatoryFieldMark">*</span><br><br>
                              
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="feminin"  {{ ($users->gender)== "feminin" ? 'checked' : '' }}>
            <label class="form-check-label fw-light" for="female" > Féminin</label>
            <span class="obligatoryFieldMark">*</span>
        </div>
      
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="masculin" {{ ($users->gender)== "masculin" ? 'checked' : '' }}>
            <label class="form-check-label fw-light" for="male" >Masculin</label>
            <span class="obligatoryFieldMark">*</span>
        </div>
        <br>
                                              
            <label class="mr-sm-4 fw-bold" for="inlineFormCustomSelect">Grade</label>
            <span class="obligatoryFieldMark">*</span>
            <select  name="grade" class="custom-select"  selected>
                <option>{{$users->grade}}</option>
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
        
            <div class="col-sm-12 form-group"><br>
                <label class="fw-bold">Email</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="email" class="form-control mt-2" placeholder="Votre E-mail" value={{$users->email}} >
            </div><br>
            <div class="col-sm-12 form-group">
                <label class="fw-bold">Photo (Image JPG/PNG, Taille maximale: 1024 ko)</label>
                <input type="file" name="photo" class="form-control mt-2" >
                <img src="{{url('user_image/'.$users->photo)}} "alt="..." style="border-radius: 50%" width="70px" height="70px">
            </div>                             
        <div class="row">
            <div class="col-sm-12 form-group"><br>
                <label class="fw-bold">Spécialité</label>
                <input type="text" name="specialite" placeholder="Enter Designation Here.." class="form-control mt-2"  value={{$users->specialite}}  >
            </div>
        <div class="col-sm-6 form-group"><br>
            <label class="fw-bold">Diplome</label>
            <input type="text" name="diplome" placeholder="Enter Designation Here.." class="form-control mt-2"   value={{$users->diplome}} >
        </div>		
        </div>    
        <div class="from-group "><br>
            <label for="datedenaissance" class="control-label required fw-bold ">Date de naissance</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="date" class="form-control mt-2" name="date" id="datedenaissance" value={{$users->date}}>
        </div><br>
        <div class="form-group">
            <label class="fw-bold">Fonction administrative</label>
            <input type="text" name="fctadmin" placeholder="Fonction administrative" class="form-control mt-2"  value={{$users->fctadmin}} ><br>
        </div>                     
        <div class="row">
            <div class="col-sm-6 form-group">
                <label class="fw-bold">H-index (Scopus)</label>
                <input type="text" name="scopus" placeholder="H-index (Scopus)" class="form-control mt-2" value={{$users->scopus}} ><br>
            </div>
            <div class="col-sm-6 form-group">
                <label class="fw-bold">Identification ORCID</label>
                <input type="text" name="orcid" placeholder="Identification ORCID" class="form-control mt-2" value={{$users->orcid}} ><br>
            </div>
        </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label class="fw-bold">Tél Mobile</label>
                    <input type="text" name="tel" placeholder="Enter Phone Number Here.." class="form-control mt-2" value={{$users->tel}} > 
                </div>
                <div class="col-sm-6 form-group">
                    <label class="fw-bold">Tél Fax</label>
                    <input type="text" name="telfax" placeholder="Enter Phone Number Here.." class="form-control mt-2" id ="tel" value={{$users->telfax}}  > 
                </div>		
            </div>
            <div class="from-group ">
                <label for="datedenaissance" class="control-label required fw-bold ">Date du dernier diplôme</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="date" class="form-control mt-2" name="datediplome" id="datediplome" value={{$users->datediplome}}   >
            </div><br>
        </div>
        </div>	                  
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" name="submit">Submit</button>	
        </div>
        </div>
</form> 
</div>
</div>
</div>
</div>
<form action="defineadmin{{$users->id}}" method="post">
    @csrf_field
    @method('PUT')
<input type="text" name="is_admin" style="display: none" value={{$users->is_admin}}>
</form>
@endsection