<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Management;
use App\Patient;
use App\Doctor;
use App\Specialization;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:management');
        $this->middleware('guest:patient');
        $this->middleware('guest:doctor');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorPatient(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'contactno' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function validatorManagement(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:managements'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validatorDoctor(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:doctors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'contactno' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'string', 'max:255'],
            'biography' => ['required', 'string', 'max:255'],
        ]);
    }

    public function showManagementRegisterForm()
    {
        return view('auth.register-management', ['url' => 'management']);
    }

    public function showPatientRegisterForm()
    {
        return view('auth.register-patient', ['url' => 'patient']);
    }

    public function showDoctorRegisterForm()
    {
        return view('auth.register-doctor', ['url' => 'doctor']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function createManagement(Request $request)
    {
        $this->validatorManagement($request->all())->validate();
        Management::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/management');
    }

    protected function createPatient(Request $request)
    {
        $this->validatorPatient($request->all())->validate();
        Patient::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'contactno' => $request->contactno,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/patient');
    }

    function createDoctor(Request $request)
    {
            $this->validatorDoctor($request->all())->validate();
            Doctor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'specialization' => $request->specialization,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'contactno' => $request->contactno,
            'email' => $request->email,
            'biography' => $request->biography,
            'password' => Hash::make($request->password),
        ]);
            return redirect()->intended('login/doctor');
    }

    //VIEW DOCTOR
    function viewspec() {
        $data = Specialization::all();
        return view('auth.register-doctor')->with('data', $data);
    }

}

  /*          
        
        
        
        $add = new Doctor;
            $add->first_name = $request->input('first_name');
            $add->last_name = $request->input('last_name');
            $add->specialization = $request->input('specialization');
            $add->birthday = $request->input('birthday');
            $add->gender = $request->input('gender');
            $add->address = $request->input('address');
            $add->contactno = $request->input('contactno');
            $add->email = $request->input('email');
            $add->biography = $request->input('biography');
            $add->password = Hash::make($request->password);
            $add->save();
            */