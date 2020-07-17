<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkin;
use App\Appointment;
use App\room_number;
use App\payment;
use Auth;
class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
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
        $c=new Checkin;

        $c->roomno =$request->input('room_num'.$request->input('roomtype'));
         $c->roomtype =$request->input('roomtype');
          $c->fee =$request->input('fee');
           $c->status ="In-Patient";
           $c->patient_id =$request->input('patient_id');

           $d_id=Appointment::all()->where('patient_id',$request->input('patient_id'))->where('status',"Approved");
           foreach ($d_id as $key => $value) {
               $c->doctor_id=$value->doctor_id;
           }
           $c->save();
        $app=Appointment::all()->where('patient_id',$request->input('patient_id'))->where('status','Approved');
        $room_num=room_number::find($request->input('room_num'.$request->input('roomtype')));
        $room_num->status="Unavailable";
        $room_num->save();
        foreach ($app as $key => $value) {
            $a=Appointment::find($value->id);
            $a->status="In-Patient";
            $a->save();
        }
        $pay=new payment;
        $pay->patient_id=$request->input('patient_id');
        $pay->handler="Room";
        $pay->amount=$request->input('fee');
        $pay->status="In-Patient";
        $pay->payment="Unpaid";
       $pay->save();

       $pays=payment::all()->where('patient_id',$request->input('patient_id'))->where('payment','Unpaid');
       
       foreach ($pays as $key => $value) {
          $pays2=payment::find($value->id);
          $pays2->status="In-Patient";
          $pays2->save();
       }
       return redirect('management/checkin-patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c=Checkin::find($id);
        $c->status="Discharged";
        $c->save();

            
                 $room_num=room_number::find($c->roomno);
                    $room_num->status="Available";
                    $room_num->save();
            $pay=payment::all()->where('patient_id',$c->patient_id)->where('payment','Unpaid');
          foreach ($pay as $key => $value) {
            $pays=payment::find($value->id);
            $pays->status="Discharged";
            $pays->save();
          }
            
          $ap=Appointment::all()->where('patient_id',$c->patient_id)->where('status','In-Patient');
          
          foreach ($ap as $key => $value) {
             $a=Appointment::find($value->id);
             $a->status='Discharged';
             $a->save();

          }
      
       return redirect('management/checkin-patients');
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
