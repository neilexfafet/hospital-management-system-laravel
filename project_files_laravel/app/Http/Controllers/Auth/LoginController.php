<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:management')->except('logout');
        $this->middleware('guest:patient')->except('logout');
        $this->middleware('guest:doctor')->except('logout');
        $this->middleware('guest:laboratory')->except('logout');
    }

    //MANAGEMENT
    public function showManagementLoginForm()
    {
        return view('auth.login-management', ['url' => 'management']);
    }

    public function managementLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
            ]);

        if (Auth::guard('management')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('management/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    //PATIENT
    public function showPatientLoginForm()
    {
        return view('auth.login-patient', ['url' => 'patient']);
    }

    public function patientLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
            ]);

        if (Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('patient/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    //DOCTOR
    public function showDoctorLoginForm()
    {
        return view('auth.login-doctor', ['url' => 'doctor']);
    }

    public function doctorLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            ]);

        if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'Active'], $request->get('remember'))) {

            return redirect()->intended('doctor/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    //LABORATORY
    public function showLaboratoryLoginForm()
    {
        return view('auth.login-laboratory', ['url' => 'laboratory']);
    }

    public function laboratoryLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
            ]);

        if (Auth::guard('laboratory')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('laboratory/dashboard');
        }
        return back()->withInput($request->only('laboratory', 'remember'));
    }


    //BILLING DEPT
    public function showBillingLoginForm()
    {
        return view('auth.login-billing', ['url' => 'billing']);
    }

    public function billingLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
            ]);

        if (Auth::guard('billing')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('billing/dashboard');
        }
        return back()->withInput($request->only('billing', 'remember'));
    }

}
