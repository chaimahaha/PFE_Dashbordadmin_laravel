@extends('layouts.sidebar')
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
                <span class="text-muted fw-light" > /</span> Ajouter Utilisateur</h4>
          </div><!-- /.col -->
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
             



    <div class="container ">
    <div class="card mt-3 border-dark  " >
  
    <div class="container">
    <div class="col mt-2 me-2">
	
        <form action="insert_user.php" method="post" enctype="multipart/form-data">
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
								<input type="text" name="prenom" placeholder="Enter Last Name Here.." class="form-control mt-2"  ><br>
							</div>
						</div>	
                        
                        <div class="row">
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Email</label>
                                 <span class="obligatoryFieldMark">*</span>
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="....@mail.com" required autocomplete="email">

                                 @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
							</div>
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Mot de passe</label>
                 <span class="obligatoryFieldMark">*</span>
								<input type="password" name="mdp" placeholder="Enter Last Name Here.." class="form-control mt-2"  ><br>
                <ul>
                            <li><span class="password-check" class="fw-light ">Minimum 8 caractéres et maximum 15 caractéres.</span></li>
                            <li><span class="password-check" class="fw-light ">Compris au minimum une lettre en majuscule et une en minuscule.</span></li>
                            <li><span class="password-check" class="fw-light ">Compris au minimum un nombre. </span></li>
                            </ul>
              </div>
						</div>	

                        <div class="row">
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Date de naissance</label>
                                 <span class="obligatoryFieldMark">*</span>
								<input type="date" name="date" placeholder="Enter First Name Here.." class="form-control mt-2 "   >
							</div>
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Téléphone</label>
                                 <span class="obligatoryFieldMark">*</span>
								<input type="number" name="tel" placeholder="Enter Last Name Here.." class="form-control mt-2"  ><br>
							</div>
						</div>	
                        <div class="form-group">
                            <label class="fw-bold">CIN</label>
                            <input type="number" name="cin" placeholder="CIN" class="form-control mt-2"  id="cin"  ><br>
                        </div>
                        <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" name="submit">Submit</button>	
                        </div>
                        </form> 
</div>			</div>
             
</div>
	</div>
</div>
@endsection