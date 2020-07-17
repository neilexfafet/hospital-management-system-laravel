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
use App\Management;
use App\Invoice;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 

class BillingController extends Controller
{
    //
    function dashboard() {
    	return view('billing.dashboard');
    }

    function invoice() {
       
        $pay=payment::all()->unique('patient_id');
        $pay_all=payment::all();

        $patient=patient::all();
        $doc=Doctor::all();
        $admin=Management::all();
        $lab=Laboratory::all();
        return view('billing.invoice', compact('pay','pay_all','patient','doc','admin','lab'));
    }

    function labrequests() {
        $lab = Laboratory::all();
        $pat = Patient::all();
        $doc = Doctor::all();
        $req = Labtest::all()->where('status', 'Pending');
    	return view('billing.laboratory-requests', compact('lab', 'pat', 'doc', 'req'));
    }

    function editreq($id) {
        $edit = Labtest::find($id);
        return view('billing.edit-request')->with('edit', $edit);
    }

    function fees() {
        $data = Doctor::all()->where('status', 'Active');
    	return view('billing.consultation-fees')->with('data', $data);
    }

    function labfees() {
        $data = Laboratory::all();
    	return view('billing.laboratory-fees')->with('data', $data);
    }

    function updatestatus(Request $request, $id) {
        $update = Labtest::find($id);
        $update->status = $request->input('status');
        $update->save();
        return redirect()->intended('billing/laboratory-requests');
    }

    function editinvoice($id) {
        $edit = Appointment::find($id);
        return view('billing.edit-invoice')->with('edit', $edit);
    }

    function updateinvoice(Request $request, $id) {
        $update = Appointment::find($id);
        $update->payment = $request->input('payment');
        $update->save();
        return redirect()->intended('billing/invoice');
    }

    function reports() {
        $data = DB::table('patients')->join('invoices', 'patient_id', '=', 'patients.id')->groupBy('invoice')->get();
        return view('billing.reports')->with('data', $data);
    }

    function viewinv($id) {
        $inv = Invoice::all()->where('invoice', $id)->first();
        $pat = DB::table('patients')->join('invoices', 'patient_id', '=', 'patients.id')
        ->where('invoice', '=', $id)
        ->first();
        $data = DB::table('patients')->join('invoices', 'patient_id', '=', 'patients.id')
        ->where('invoice', '=', $id)
        ->get();
        return view('billing.inv')
        ->with('data', $data)
        ->with('inv', $inv)
        ->with('pat', $pat);
    }
}
