<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\payment;
use App\Checkin;
use DateTime;
use Carbon\Carbon;
use App\invoice;
use DB;
class ManagePayment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('billing.edit-invoice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$update = Checkin::find('patient_id',$request->input('p_id'))->where('status', '=', 'In-Patient');
        //$update = Checkin::find($request->input('p_id'), 'patient_id')->where('status', '=', 'In-Patient')->get();
        //$update->status = "Request-Discharge";
        //$update->save();
             //$update = Checkin::find($request->input('p_id'), 'patient_id');
             //$update->status = $request->input('status');
             //$update->save();

        $ran=rand(111,99999);
        $pay=payment::all()->where('patient_id',$request->input('p_id'));
        foreach ($pay as $key => $value) {
             $inv= new invoice;
             $inv->invoice="INV-".$ran;
             $inv->handler=$value->handler;
             $inv->patient_id=$value->patient_id;
             $inv->total=$value->amount;
             $inv->save();
             $pay2=payment::find($value->id);
             $pay2->payment="Paid";
             $pay2->save();
        }

        //$id = DB::table('checkins')->select('id')
        //     ->where('patient_id', '=', $request->input('p_id'))
        //     ->where('status', '=', 'In-Patient')
        //     ->first();
        //     $update = Checkin::find($id);
        //     $update->status="Paid";
        //     $update->save();

       return redirect('billing/invoice');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $patient=patient::find($id);
        $pay=payment::all()->where('patient_id',$id)->where('payment', '=', 'Unpaid');
        $ch=Checkin::all()->where('patient_id',$id);
       
        $mytime = Carbon::now();
       
         return view('billing.edit-invoice')
        ->with('patient',$patient)
        ->with('pay',$pay)
        ->with('ch',$ch)
        ->with('now',$mytime)
        ->with('id',$id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
