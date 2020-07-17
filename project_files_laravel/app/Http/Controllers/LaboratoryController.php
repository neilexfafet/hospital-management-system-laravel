<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Specialization;
use App\Laboratory;
use App\Billing;
use App\Appointment;
use App\Labtest;
use App\payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaboratoryController extends Controller
{
    //
    function dashboard() {
        $getId = Auth::guard('laboratory')->user()->id;
        $lab = Labtest::all()->where('status', 'Pending')->where('lab_id', $getId)->count();
        $result = Labtest::all()->where('status', 'Approved')->where('lab_id', $getId)->count();
        return view('laboratory.dashboard')
        ->with('lab', $lab)
        ->with('result', $result);
    }

    function pending() {
        $getId = Auth::guard('laboratory')->user()->id;
        $data = DB::table('labtests as lt')->select('*', 'p.id as p_id', 'lt.id as lt_id', 'p.first_name as p_first_name', 'p.last_name as p_last_name', 'd.first_name as d_first_name', 
        'd.last_name as d_last_name', 'p.gender as p_gender', 'p.address as p_address', 'p.email as p_email',
        'p.contactno as p_contactno', 'lt.status as lt_status')
        ->join('patients as p', 'lt.patient_id', '=', 'p.id')
        ->join('doctors as d', 'lt.doctor_id', '=', 'd.id')
        ->join('laboratories as l', 'lt.lab_id', '=', 'l.id')
        ->where('l.id', '=', $getId)
        ->where('lt.status', '=', 'Pending')
        ->get();
        return view('laboratory.pending-requests')->with('data', $data);
    }

    function testresult() {
        $getId = Auth::guard('laboratory')->user()->id;
        $data = DB::table('labtests as lt')->select('*', 'p.id as p_id', 'lt.id as lt_id', 'p.first_name as p_first_name', 'p.last_name as p_last_name', 'd.first_name as d_first_name', 
        'd.last_name as d_last_name', 'p.gender as p_gender', 'p.address as p_address', 'p.email as p_email',
        'p.contactno as p_contactno')
        ->join('patients as p', 'lt.patient_id', '=', 'p.id')
        ->join('doctors as d', 'lt.doctor_id', '=', 'd.id')
        ->join('laboratories as l', 'lt.lab_id', '=', 'l.id')
        ->where('l.id', '=', $getId)
        ->where('lt.status', '!=', 'Pending')
        ->get();
        return view('laboratory.test-results')->with('data', $data);
    }

    function facilities() {
        $data = Laboratory::all();
    	return view('laboratory.facilities')->with('data', $data);
    }

    function editrequest($id) {
        //$edit = Labtest::find($id);
        $edit = DB::table('labtests as lt')->select('*', 'p.id as p_id', 'lt.id as lt_id', 'p.first_name as p_first_name', 'p.last_name as p_last_name', 'd.first_name as d_first_name', 
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
        return view('laboratory.edit-request')
        //->with('lt', $lt)
        //->with('pat', $pat)
        //->with('doc', $doc)
        //->with('lab', $lab);
        ->with('edit', $edit);
        //return view('Laboratory.edit-request')->with('edit', $edit);
    }

    function updaterequest(Request $request, $id) {
        $update = Labtest::find($id);
        $update->testresult = $request->input('testresult');
        $update->status = $request->input('status');
        $update->save();
        if($request->input('status')=="Approved") {
            $pay=new payment;
            $pay->patient_id = $request->input('patient_id');
            $pay->handler = "Laboratory";
            $pay->amount = Auth::guard('laboratory')->user()->lab_fee;
            $pay->save();
        }
        return redirect()->intended('laboratory/pending-requests');
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
        return view('laboratory.view-testresult')
        //->with('lt', $lt)
        //->with('pat', $pat)
        //->with('doc', $doc)
        //->with('lab', $lab);
        ->with('data', $data)
        ->with('mytime', $mytime);
    }
}
