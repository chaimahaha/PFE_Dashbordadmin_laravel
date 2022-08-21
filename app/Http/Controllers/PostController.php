<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
  public function store(Request $request)
  {
     $request->validate([
        'nom'=>'required',
        'description'=>'required'
     ]);
     echo'sucess';
  }
  
}
