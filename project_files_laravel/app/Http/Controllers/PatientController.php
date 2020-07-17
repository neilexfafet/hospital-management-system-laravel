<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Medhistory;
use App\Labtest;
use App\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Collection\Json;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\payment;
class PatientController extends Controller
{
    //

    function dashboard() {
        $getId = Auth::guard('patient')->user()->id;
        $app = Appointment::all()->where('status', 'Approved')->where('patient_id', $getId)->count();
        $app2 = Appointment::all()->where('status', 'Pending')->where('patient_id', $getId)->count();
        $app3 = Appointment::all()->where('patient_id', $getId)->count();
        $med = Medhistory::all()->where('patient_id', $getId)->count();
        $lab = Labtest::all()->where('patient_id', $getId)->where('status', '!=', 'Pending')->count();
        return view('patient.dashboard')
        ->with('app', $app)
        ->with('app2', $app2)
        ->with('app3', $app3)
        ->with('med', $med)
        ->with('lab', $lab);
    }

    function personalinformation() {
        return view('patient.personal-information');
    }

    function bookappointment() {

        return view('patient.book-appointment');
    }

    function pendingschedules() {

        //$getId = Auth::guard('patient')->user()->id;
        //$data = Appointment::all()->where('patient_id', $getId);
        //return view('patient.pending-schedules')->with('data', $data);
        $getId = Auth::guard('patient')->user()->id;
        $data = DB::table('doctors')->join('appointments','doctor_id', '=', 'doctors.id')->get()->where('patient_id', $getId);
        return view('patient.pending-schedules')->with('data', $data);
    }

    function approvedschedules() {
        $getId = Auth::guard('patient')->user()->id;
        $data = DB::table('doctors')->join('appointments','doctor_id', '=', 'doctors.id')->get()->where('patient_id', $getId)->where('status', 'Approved');
        return view('patient.approved-schedules')->with('data', $data);
    }

    function medicalhistory() {
        $getId = Auth::guard('patient')->user()->id;
        $data = DB::table('patients')->join('medhistories','patient_id', '=', 'patients.id')->get()->where('patient_id', $getId);
        return view('patient.medical-history')->with('data', $data);
    }

    function testresults() {
        $getId = Auth::guard('patient')->user()->id;
        $mytime = Carbon::now();
        $data = DB::table('labtests as lt')->select('*', 'p.id as p_id', 'p.first_name as p_first_name', 'p.last_name as p_last_name', 'd.first_name as d_first_name', 
        'd.last_name as d_last_name', 'p.gender as p_gender', 'p.address as p_address', 'p.email as p_email',
        'p.contactno as p_contactno', 'lt.id as lt_id')
        ->join('patients as p', 'lt.patient_id', '=', 'p.id')
        ->join('doctors as d', 'lt.doctor_id', '=', 'd.id')
        ->join('laboratories as l', 'lt.lab_id', '=', 'l.id')
        ->where('p.id', '=', $getId)
        ->where('lt.status', '!=', 'Pending')
        ->get();
        return view('patient.test-results')
        ->with('data', $data)
        ->with('mytime', $mytime);
    }

    function viewtestresult($id) {
        $mytime = Carbon::now();
        $data = DB::table('labtests as lt')->select('*', 'p.id as p_id', 'p.first_name as p_first_name', 'p.last_name as p_last_name', 'd.first_name as d_first_name', 
        'd.last_name as d_last_name', 'p.gender as p_gender', 'p.address as p_address', 'p.email as p_email',
        'p.contactno as p_contactno')
        ->join('patients as p', 'lt.patient_id', '=', 'p.id')
        ->join('doctors as d', 'lt.doctor_id', '=', 'd.id')
        ->join('laboratories as l', 'lt.lab_id', '=', 'l.id')
        ->where('lt.id', '=', $id)
        ->get();
        //$pat = Patient::all();
        //$doc = Doctor::all();
        //$lab = Laboratory::all();
        //$lt = Labtest::find($id)
        //->where('patient_id', '=', $pat)
        //->where('doctor_id', '=', $pat)
        //->where('lab_id', '=', $pat);
        return view('patient.view-testresult')
        //->with('lt', $lt)
        //->with('pat', $pat)
        //->with('doc', $doc)
        //->with('lab', $lab);
        ->with('data', $data)
        ->with('mytime', $mytime);
    }

    function appointmenthistory() {
        $getId = Auth::guard('patient')->user()->id;
        $data = DB::table('doctors')->join('appointments','doctor_id', '=', 'doctors.id')->get()->where('patient_id', $getId);
        return view('patient.appointment-history')->with('data', $data);
    }

    //crud

    function addbooking(Request $request) {
        $add = new Appointment;
        $add->date = $request->input('date');
        $add->time = $request->input('time');
        $add->doctor_id= $request->input('doctor_id');
        $add->patient_id = $request->input('patient_id');
        $doc=Doctor::all()->where('id',$request->input('doctor_id'));
        foreach ($doc as $key => $value) {
            $fee=$value->fee;
        }
        $add->fee = $fee;
        $add->save();

       
        return redirect('patient/pending-schedules');
    }

    function viewdoc() {
        $data = Doctor::all()->where('status', 'Active');
        return view('patient.book-appointment')->with('data', $data);
    }

    function editappointment($id) {
        $edit = Appointment::find($id);
        return view('patient.edit-appointment')->with('edit', $edit);
    }

    function updateappointment(Request $request, $id) {
        $update = Appointment::find($id);
        $update->date = $request->input('date');
        $update->time = $request->input('time');
        $update->status = $request->input('status');
        $update->save();
        return redirect()->intended('patient/pending-schedules');
    }

    function deletesched($id) {
        $delete = Appointment::find($id);
        $delete->delete();
        return redirect()->intended('patient/pending-schedules');
    }
}
