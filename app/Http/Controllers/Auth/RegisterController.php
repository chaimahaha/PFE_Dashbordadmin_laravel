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
    public function __construct()
    {
        $this->middleware('guest');
    }

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
            if($request->hasfile('image'))
            {
                $imagename = uniqid() . '_' . time(). '.' . $request->image->extension();
                $path = public_path() .'/user_image';
                $request->image->move($path, $imagename);
                $image = $imagename;
            }else{
            $image = '--';
            }
           $user = new User();
            //$image = "image".uniqid().'.'.$request->file('image')->extension();
                //$request->file('image')->storeAs("public/event_image",$image);
            $user->name = $request->name;
            $user->image =$image;
            $user->surname = $request->surname;
            $user->phone = $request->phone;
            $user->position = $request->position;
            $user->email = $request->email;
            $user->save();
            return redirect('home')->with('status', 'Welcome Admin');
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
}
