<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest');
    }
    */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            "nom"=>"required",
            "prenom" => "required",
            "cin" => "nullable",
            "numpassport"=>"nullable",
            "cnrps" =>"nullable",
            "gender" => "nullable|in:feminin,masculin",
            "grade"=>"in:Professeur,Maître de conférence,Docteur,Chercheur en thèse,Chercheur en mastère,Ingénieur,Assistant,Maître Assistant,Autre",
            "email"=>"required",
            "password"=>"required",
            "photo" => "file|mimes:jpeg,png|max:5000",
            "specialite"=>"nullable",
            "diplome"=>"nullable",
            "date" => "nullable",
            "fctadmin"=>"nullable",
            "scopus"=>"nullable",
            "orcid"=>"nullable",
            "tel"=>"nullable",
            "telfax"=>"nullable",
            "datediplome"=>"nullable",
        ]);
    }
        public function store(Request $request)
    {
        if($request->hasFile('photo'))
            {
                $photoname = uniqid() . '_' . time(). '.' . $request->photo->extension();
                $path = public_path() .'/user_image';
                $request->photo->move($path, $photoname);
                $photo = $photoname;
            }else{
            $photo = '--';
            }
        $user= new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->cin = $request->cin;
        $user->numpassport = $request->numpassport ;
        $user->cnrps = $request -> cnrps;
        $user->gender = $request->input('gender');
        $user-> grade = $request-> input('grade');
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 
        $user->photo = $photo;
        $user-> specialite= $request->specialite;
        $user->  diplome= $request-> diplome;
        $user->date = $request->date;
        $user->fctadmin = $request->fctadmin;
        $user-> scopus= $request-> scopus;
        $user->orcid =$request->orcid;
        $user->tel=$request->tel;
        $user->telfax = $request->telfax;
        $user->datediplome = $request -> datediplome;
        $user->save();
        if($user->is_admin) return back()-> with('status','Vous avez ajouter un nouveau membre');
        else
        $this->guard()->login($user);
        
        return redirect('membreHome')->with('status', 'Welcome Membre');
       
            //return redirect()->route('home');
        
    }

    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'cin'=>$data['cin'],
            'numpassport' => $data['numpassport'],
            'cnrps'=> $data['cnrps'],
            'gender'=> $data['gender'],
            'grade'=>$data['grade'],
            'email'=>$data['email'],
            'password' => Hash::make($data['password']),
            'confirmedpassword' => Hash::make($data['password']),
            'photo'=>$data['photo'],
            'specialite'=>$data['specialite'],
            'diplome'=>$data['diplome'],
            'date'=>$data['date'],
            'fctadmin'=>$data['fctadmin'],
            'scopus'=>$data['scopus'],
            'orcid'=>$data['orcid'],
            'tel'=>$data['tel'],
            'telfax'=>$data['telfax'],
            'datediplome'=>$data['datediplome']
        ]);
    }
   
    public function show()
    {
        $users = User::all();
        return View('AdminDashboard.Fonctionnalites.userManager',compact('users'));
        //compact t3adi les données lel vue

    }
    function deleteUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        User::find($request->id)->delete();
        return back()
            ->with('status', 'User deleted successfully');
    }
    function editUser($id){
        $users = User::find($id);
        if(Auth::user()->is_admin)
        return view('AdminDashboard.UpdatedForms.editMem',compact('users'));
        else return view('MembreDashboard.UpdatedForms.editMem',compact('users'));
    }
    public function update(Request $request)
    {
        
        $id=$request->id;
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $cin = $request->input('cin');
        $numpassport = $request->input('numpassport');
        $cnrps = $request -> input('cnrps');
        $gender = $request->input('gender');
        $grade = $request-> input('grade');
        $email = $request->input('email');
        if($request->hasFile('photo'))
        {   $path = public_path().'/user_image';
            if(File::exists($path)){
                File::delete($path);
                }
                else $photo=$request->photo;
            $file=$request->file('photo');
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move($path,$filename);
            $photo=$request->input('filename');
        }
        
        $specialite= $request->input('specialite');
        $diplome= $request-> input('diplome');
        $date = $request->input('date');
        $fctadmin = $request->input('fctadmin');
        $scopus= $request-> input('scopus');
        $orcid =$request->input('orcid');
        $tel=$request->input('tel');
        $telfax = $request->input('telfax');
        $datediplome = $request -> input('datediplome');
        $isUpdateSuccess= User::where('id',$id) ->update([ 'nom'=>$nom,
                                                                'prenom'=>$prenom,
                                                                'cin'=>$cin,
                                                                'numpassport'=>$numpassport,
                                                                'cnrps'=>$cnrps,
                                                                'gender'=>$gender,
                                                                'grade'=>$grade,
                                                                'email'=>$email,
                                                                'photo'=>$filename,
                                                                'specialite'=>$specialite,
                                                                'diplome'=>$diplome,
                                                                'date'=>$date,
                                                                'fctadmin'=>$fctadmin,
                                                                'scopus'=>$scopus ,
                                                                'orcid'=>$orcid  ,
                                                                'tel'=>$tel  ,
                                                                'telfax'=>$telfax  ,
                                                                'datediplome'=>$datediplome  ,
                                                            ]);
        if(Auth::user()->is_admin)
            return redirect('profil')->with('status', 'user was updated');
        else return redirect('profil')->with('status','Your profile undergone some modifications');
    }
public function index (){
    return view('AdminDashboard.Forms.addUser');
}
public function defineAdmin($id){
    
    $user=User::findOrFail($id);
    if(!$user->is_admin){
        $user->is_admin=true;
        $user->save();
        return redirect()->back()->with('status','Vous avez definir '.$user->prenom.' ' .$user->nom.' tant qu \' administrateur');    
    }
    else 
    return redirect()->back()->with('status','cet utilisateur est actuellement définie comme un administrateur ');
   
}
public function retireAdmin($id){
    
    $user=User::findOrFail($id);
    if($user->is_admin){
        $user->is_admin=false;
        $user->save();
        return redirect()->back()->with('status','Vous avez retirer '.$user->prenom.' ' .$user->nom.' en tant qu \'administrateur');
    }
    else 
    return redirect()->back()->with('status','cet utilisateur est actuellement définie comme un membre ');
}

}