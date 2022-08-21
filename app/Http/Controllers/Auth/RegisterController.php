<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'image' => ['required','file','mimes:jpeg,png','max:5000'],
            'phone' => ['required', 'string', 'max:11'],
            'position' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            
        ]);
    }
        public function store(Request $request)
    {
        $file=$request->file('image');
        $imagename = uniqid() . '_' . time(). '.' . $file->extension();    
        $path = public_path() .'/user_image';
        $request->image->move($path, $imagename);
        $image = $imagename;
           $user = new User();
            //$image = "image".uniqid().'.'.$request->file('image')->extension();
                //$request->file('image')->storeAs("public/event_image",$image);
            $user->name = $request->name;
            $user->image =$image;
            $user->surname = $request->surname;
            $user->phone = $request->phone;
            $user->position = $request->position;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); 
            $user->save();
            $this->guard()->login($user);
            return redirect('/')->with('status', 'Welcome Admin');
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
            'name' => $data['name'],
            'surname'=>$data['surname'],
            'image' =>$data['image'],
            'phone'=>$data['phone'],
            'position'=>$data['position'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'confirmedpassword' => Hash::make($data['password']),
        ]);
    }
   
    public function show()
    {
        $users = User::all();

        return View('Fonctionnalites.userManager',compact('users'));
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
            ->with('success', 'User deleted successfully');
    }
    function editUser($id){
        $users = User::find($id);
        return view('UpdatedForms.editUser',compact('users'));
    }
    public function update(Request $request)
    {
        
        $id=$request->id;
        $name = $request->input('name');
        $surname = $request->input('surname');
        
        $phone = $request->input('phone');
        $position = $request->input('position');
        $email = $request->input('email');
        $isUpdateSuccess= User::where('id',$id) ->update([  'name'=>$name,
                                                            'surname'=>$surname,
                                                            'phone'=>$phone,
                                                            'position'=>$position,
                                                            'email'=>$email
                                                            ]);
        return redirect('userManager')->with('status', 'User was updated');
    }
}
