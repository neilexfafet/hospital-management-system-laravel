<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Specialization;
use App\Laboratory;
use App\Billing;
use App\Appointment;
use App\Medhistory;
use App\Labtest;
use App\Checkin;
use App\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;
use App\roomtype;
use App\room_number;

class ManagementController extends Controller
{
    function dashboard() {
        $pat = Patient::all()->count();
        $doc = Doctor::all()->where('status', '=', 'Active')->count();
        $pend = Doctor::all()->where('status', '=', 'Pending')->count();
        $chckn = Checkin::all()->where('status', '=', 'Pending')->count();
        $inpat = Checkin::all()->where('status', '=', 'In-Patient')->count();
        $room = Room_number::all()->count();
        $lab = Laboratory::all()->count();
        $bill = Billing::all()->count();
        return view('management.dashboard')
        ->with('pat', $pat)
        ->with('doc', $doc)
        ->with('pend', $pend)
        ->with('chckn', $chckn)
        ->with('inpat', $inpat)
        ->with('room', $room)
        ->with('lab', $lab)
        ->with('bill', $bill);
    }

    function managepatients() {
        $p=Patient::all();
        return view('management.manage-patients')
        ->with('patients', $p);
    }

    function pendingpatients() {
       
       $app=Appointment::all()->where('status','Approved');
       $patient=Patient::all();
        return view('management.pending-patients')
        ->with('app',$app)
        ->with('patient',$patient);
    }

    function editcheckinpatient($id) {

            $rmt=roomtype::all();
            $rm=room_number::all();
        return view('management.edit-checkin')
        ->with('id', $id)
        ->with('rmt',$rmt)
        ->with('rm',$rm);

    }

    function updatecheckinpatient(Request $request, $id) {
        $update = Checkin::find($id)->join('checkins','patient_id', '=', 'patients.id')->get();
        $update->roomtype = $request->input('roomtype');
        $update->roomno = $request->input('roomno');
        $update->fee = $request->input('fee');
        $update->save();
        return redirect()->intended('management/checkin-patients');
    }

    function checkinpatients() {
        $doc=Doctor::all();
    $patients=Patient::all();
    $check=Checkin::all()->where('status','In-Patient');
    $data= DB::table('checkins as c')->select('p.*','c.*','c.id as c_id','p.first_name as p_fname','p.last_name as p_lname','d.*','r_n.*','rm.*','c.status as c_status','c.created_at as c_c')
    ->join('patients as p', 'c.patient_id', '=', 'p.id')
    ->join('doctors as d','c.doctor_id', '=' ,'d.id')
    ->join('room_numbers  as r_n','r_n.id','=','c.roomno')
    ->join('roomtypes as rm','rm.id','=','c.roomtype')
    ->where('c.status','In-Patient')
    ->get();
 
      return view('management.checkin-patients')->with('data',$data);
    }

    function specialization() {
        $data = Specialization::all();
        return view('management.add-specialization')->with('data', $data);
    }

    function managedoctors() {
        $data = Doctor::all()->where('status', 'Active');
        return view('management.manage-doctors')->with('data', $data);
    }

    function pendingdoctors() {
        $data = Doctor::all()->where('status', 'Pending');
        return view('management.pending-doctors')->with('data', $data);
    }

    function laboratory() {
        $data = Laboratory::all();
        return view('management.laboratory')->with('data', $data);
    }

    function addlaboratory() {
        return view('management.add-laboratory');
    }

    function addbilling() {
        $data = Billing::all();
        return view('management.add-billing')->with('data', $data);
    }

    function laboratoryrequests() {
        $data = DB::table('patients')->join('labtests', 'patient_id', '=', 'patients.id')->get();
        return view('management.laboratory-requests')->with('data', $data);
    }

    function patientinvoice() {
        return view('management.patient-invoice');
    }

    function appointment() {
        $appointment = Appointment::all();
        $patient = Patient::all();
        $doctor = Doctor::all();
        return view('management.appointment-history', compact('appointment', 'patient', 'doctor'));
    }

    function contactus() {
        return view('management.contact-us-queries');
    }

    //CRUDS
    function addspec(Request $request) {
        $add = new Specialization;
        $add->name = $request->input('name');
        $add->save();
        return redirect()->intended('management/add-specialization');
    }

    function deletespec($id) {
        $delete = Specialization::find($id);
        $delete->delete();
        return redirect()->intended('management/add-specialization');
    }

    function editspec($id) {
        $edit = Specialization::find($id);
        return view('management/edit-specialization')->with('edit', $edit);
    }

    public function updatespec(Request $request, $id) {
        $update = Specialization::find($id);
        $update->name = $request->input('name');
        $update->save();
        return redirect()->intended('management/add-specialization');
    }

    function addfacility(Request $request) {
        $add = new Laboratory;
        $add->name = $request->input('name');
        $add->username = $request->input('username');
        $add->handler = $request->input('handler');
        $add->lab_fee = $request->input('lab_fee');
        $add->password = Hash::make($request->password);
        $add->save();
        return redirect()->intended('management/laboratory');
    }

    function addhandler(Request $request) {
        $add = new Billing;
        $add->handler = $request->input('handler');
        $add->username = $request->input('username');
        $add->password = Hash::make($request->password);
        $add->save();
        return redirect()->intended('management/add-billing');
    }

    function editdoc($id) {
        $edit = Doctor::find($id);
        return view('management/edit-doctor')->with('edit', $edit);
    }

    function updatedoc(Request $request, $id) {
        $update = Doctor::find($id);
        $update->fee = $request->input('fee');
        $update->status = $request->input('status');
        $update->save();
        return redirect()->intended('management/manage-doctors');
    }

    function viewhandler() {
        $data = Billing::all();
        return redirect()->intended('management/add-billing');
    }

    function viewroom() {
        $type = Roomtype::all();
        $data = DB::table('roomtypes')->join('room_numbers', 'room_type', '=', 'roomtypes.id')->get();
        return view('management.rooms')
        ->with('data', $data)
        ->with('type', $type);
    }

    function addroomtype(Request $request) {
        $add = new Roomtype;
        $add->roomtype = $request->input('roomtype');
        $add->fee = $request->input('fee');
        $add->save();
        return redirect()->intended('management/rooms');
    }

    function addroomnumber(Request $request) {
        $add = new Room_number;
        $add->room_type = $request->input('room_type');
        $add->room_number = $request->input('room_number');
        $add->save();
        return redirect()->intended('management/rooms');
    }

    function viewpatient($id) {
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
        return view('management.view-patient')
        ->with('edit', $edit)
        ->with('med', $med)
        ->with('lab', $lab);
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
        return view('management.view-testresult')
        //->with('lt', $lt)
        //->with('pat', $pat)
        //->with('doc', $doc)
        //->with('lab', $lab);
        ->with('data', $data)
        ->with('mytime', $mytime);
    }

    function editdoctorstatus($id) {
        $edit = Doctor::find($id);
        return view('management/edit-doctorstatus')->with('edit', $edit);
    }

    function updatedoctorstatus(Request $request, $id) {
        $update = Doctor::find($id);
        $update->status = $request->input('status');
        $update->fee = $request->input('fee');
        $update->save();
        return redirect()->intended('management/manage-doctors');
    }

    function reports() {
        $data = DB::table('patients')->join('invoices', 'patient_id', '=', 'patients.id')->groupBy('invoice')->get();
        return view('management.reports')->with('data', $data);
    }

    function viewinvoice($id) {
        $inv = Invoice::all()->where('invoice', $id)->first();
        $pat = DB::table('patients')->join('invoices', 'patient_id', '=', 'patients.id')
        ->where('invoice', '=', $id)
        ->first();
        $data = DB::table('patients')->join('invoices', 'patient_id', '=', 'patients.id')
        ->where('invoice', '=', $id)
        ->get();
        return view('management.invoice')
        ->with('data', $data)
        ->with('inv', $inv)
        ->with('pat', $pat);
    }

    function editlaboratory($id) {
        $edit = Laboratory::find($id);
        return view('management/edit-laboratory')->with('edit', $edit);
    }

    function updatelaboratory(Request $request, $id) {
        $update = Laboratory::find($id);
        $update->name = $request->input('name');
        $update->username = $request->input('username');
        $update->handler = $request->input('handler');
        $update->lab_fee = $request->input('lab_fee');
        $update->save();
        return redirect()->intended('management/laboratory');
    }

    function editbilling($id) {
        $edit = Billing::find($id);
        return view('management/edit-billing')->with('edit', $edit);
    }

    function updatebilling(Request $request, $id) {
        $update = Laboratory::find($id);
        $update->name = $request->input('name');
        $update->username = $request->input('username');
        $update->handler = $request->input('handler');
        $update->lab_fee = $request->input('lab_fee');
        $update->save();
        return redirect()->intended('management/laboratory');
    }

}