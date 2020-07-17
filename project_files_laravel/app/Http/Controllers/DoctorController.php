<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Appointment;
use App\Laboratory;
use App\Medhistory;
use App\Labtest;
use App\Checkin;
use Carbon\Carbon;
use Illuminate\Support\Collection\Json;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\payment;
class DoctorController extends Controller
{
    //

    function dashboard() {
        $app = Appointment::all()->where('status', '=', 'Approved')->count();
        $pend = Appointment::all()->where('status', '=', 'Pending')->count();
        return view('doctor.dashboard')
        ->with('app', $app)
        ->with('pend', $pend);
    }

    function personalinfo() {
        return view('doctor.personal-information');
    }

    function schedules() {
        return view('doctor.schedules');
    }

    function approvedappointments() {
        $getId = Auth::guard('doctor')->user()->id;
        $data = DB::table('patients')->join('appointments','patient_id', '=', 'patients.id')->get()->where('doctor_id', $getId);
      
        return view('doctor.approved-appointments', compact('data'));
    }

    function pendingappointments() {
        $getId = Auth::guard('doctor')->user()->id;
        $data = DB::table('patients')->join('appointments','patient_id', '=', 'patients.id')->get()->where('doctor_id', $getId)->where('status', 'Pending');
        return view('doctor.pending-appointments')->with('data', $data);
    }

    function appointmenthistory() {
        $getId = Auth::guard('doctor')->user()->id;
        $data = DB::table('patients')->join('appointments','patient_id', '=', 'patients.id')->get()->where('doctor_id', $getId);
        return view('doctor.appointment-history')->with('data', $data);
    }

    function managepatients() {
        $getId = Auth::guard('doctor')->user()->id;
        //$data = DB::table('appointments')->select('*')
        //->join('patients', 'appointments.patient_id', '=', 'patients.id')
        //->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
        //->where('doctor_id', '=', $getId)
        //->groupBy('patients.id');
        //$data = DB::table('patients')->join('appointments','patient_id', '=', 'patients.id')->get()->where('doctor_id', $getId);//->groupBy('patients.id');
        $data = DB::table('appointments as a')->select('*')
        ->join('patients as p', 'a.patient_id', '=', 'p.id')
        ->where('a.doctor_id', '=', $getId)
        ->groupBy('p.id')
        ->get();
        return view('doctor.manage-patients')
        ->with('data', $data);
        //->with('patients', $patients)
        //->with('doc', $doc);
    }

    function checkin($id) {
        $data = Patient::find($id);
        return view('doctor.in-patient')->with('data', $data);
    }

    function checkinpatient(Request $request) {
        $add = new Checkin;
        $add->patient_id = $request->input('patient_id');
        $add->doctor_id = $request->input('doctor_id');
        $add->save();
        return redirect()->intended('doctor/approved-appointments');
    }

    function checkinpatients() {
        return view('doctor.check-in-patients');
    }

    function labfacilities() {
        return view('doctor.laboratory-facilities');
    }

    function labtestresults() {
        $getId = Auth::guard('doctor')->user()->id;
        $data = DB::table('patients')->join('labtests','patient_id', '=', 'patients.id')->get()->where('doctor_id', $getId)->where('status', 'doctor');
        return view('doctor.laboratory-test-results')->with('data', $data);
    }

    function viewlabtest($id) {
        $edit = Labtest::find($id);
        return view('doctor.view-labtest')->with('edit', $edit);
    }

    function updatelabtest(Request $request, $id) {
        $update = Labtest::find($id);
        $update->status = $request->input('status');
        $update->save();
        return redirect()->intended('doctor/laboratory-test-results');
    }

    function editappointment($id) {
        $edit = Appointment::find($id);
        return view('doctor.edit-appointment')->with('edit', $edit);
    }

    function updateappointment(Request $request, $id) {
        $update = Appointment::find($id);
        $update->status = $request->input('status');
        $update->save();
        if($request->input('status')=="Approved"){

         $pay=new payment;
          $pay->patient_id=$request->input('patient_id');
          $pay->handler="Consultation";
          $pay->amount=Auth::guard('doctor')->user()->fee;
          $pay->status=$request->input('status');
          $pay->payment="Unpaid";
          $pay->save();
        }
  
        return redirect()->intended('doctor/pending-appointments');
    }

    function viewpatient($id) {
        $edit = Patient::find($id);
        $data = Laboratory::all();
        return view('doctor.add-medical', compact('edit', 'data'));
    }

    function addmedicalrecord(Request $request) {
        $add = new Medhistory;
        $add->bp = $request->input('bp');
        $add->weight = $request->input('weight');
        $add->height = $request->input('height');
        $add->bloodsugar = $request->input('bloodsugar');
        $add->cbc = $request->input('cbc');
        $add->bodytemp = $request->input('bodytemp');
        $add->medprescription = $request->input('medprescription');
        $add->comments = $request->input('comments');
        $add->patient_id = $request->input('patient_id');
        $add->save();
        return redirect()->intended('doctor/approved-appointments');
    }

    function viewmedicalrecord($id) {
        $edit = Patient::find($id);//->appointment();
        $med = Medhistory::all()->where('patient_id', '=', $id)->sortByDesc('created_at');
        $lab = DB::table('labtests as l')->select('*', 'l.id as l_id')
        ->join('patients as p','l.patient_id', '=', 'p.id')
        ->join('laboratories as lab', 'l.lab_id', '=', 'lab.id')
        ->where('l.patient_id', '=', $id)
        ->get();
        //$edit = DB::table('patients as p')->join('medhistories as m','m.id', '=', 'p.id')
        //->where('p.id', '=', $id)
        //->get();
        return view('doctor.view-patient')
        ->with('edit', $edit)
        ->with('med', $med)
        ->with('lab', $lab);
    }

    function discardappointment($id) {
        $update = Appointment::find($id);
        $update->status = "Discard";
        $update->save();
        return redirect()->intended('doctor/approved-appointments');
    }

    function addrequest(Request $request) {
        $add = new Labtest;
        $add->request = $request->input('request');
        $add->testresult = $request->input('testresult');
        $add->patient_id = $request->input('patient_id');
        $add->doctor_id = $request->input('doctor_id');
        $add->lab_id = $request->input('lab_id');
        $add->save();
        return redirect()->intended('doctor/approved-appointments');
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
        return view('doctor.view-testresult')
        //->with('lt', $lt)
        //->with('pat', $pat)
        //->with('doc', $doc)
        //->with('lab', $lab);
        ->with('data', $data)
        ->with('mytime', $mytime);
    }
}
