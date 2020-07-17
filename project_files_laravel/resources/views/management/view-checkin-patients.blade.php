<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Management | Discharge</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('management.includes.header')
                    <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                        <h1 class="h3 mb-4 text-gray-800">Payment</h1>

                        <form method="post" action="{{ action('ManagePayment@store') }}">
                            @csrf
                             <input type="hidden" name="status" value="Paid">
                             <button type="submit" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
                             <span class="icon text-white-50">
                             <i class="fas fa-save"></i>
                             </span><span class="text" >Save</span>
                             </button>
                             <input type="hidden" name="p_id" value="{{ $id }}">
                        </form>    
                    </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="btn-group btn-group-sm">
                            <button class="btn btn-white" onClick="javascript:window.print();"><i class="fa fa-print fa-lg"></i> Print</button>
                        </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row custom-invoice">
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <img src={{ asset("assets/img/logo-dark.png") }} height="75" width="75" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li>Hospital</li>
                                            <li>Julio Pacana Street, Licuan, Cagayan de Oro City</li>
                                            <li>Misamis Oriental, Philippines</li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Payment #PAY-00{{$id}}</h3>
                                            <ul class="list-unstyled">
                                                <li>Date: <span>Date</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>  
                                        <br><br>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 m-b-20">
                                        
                                          
                                            <ul class="list-unstyled">
                                             <h5><strong>Patient :</strong>                 
                                             <span class="text-primary font-weight-bold">{{ $patient->last_name }} ,{{ $patient->first_name }}</span></h5>
                                             <li>Patient ID: <u><b>{{ $patient->id }}</b></u></li>
                                              <li>Email : <u><b>{{ $patient->email }}</b></u></li>
                                              <li>Address : <u><b>{{ $patient->address }}</b></u></li>
                                            </ul>
                                        
                                    </div>
                                    <div class="col-sm-6 col-lg-6 m-b-20">
                                        <div class="invoices-view"><br>
                                            <ul class="list-unstyled invoice-payment-details">
                                                <li>
                                                    Birth Date : <u><b>{{ $patient->birthday }}</b></u><br>
                                                    Gender : <u><b>{{ $patient->gender }}</b></u><br>
                                                    Contact No. : <u><b>{{ $patient->contactno }}</b></u><br>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>DESCRIPTION</th>
                                                <th>QUANTITY</th>
                                                <th>UNIT COST</th>
                                                <th>SUBTOTAL</th>
                                            </tr>
                                            @php
                                                $night=1;
                                                $sub=0;
                                                $total=0;
                                            @endphp
                                        </thead>
                                        <tbody>
                                        @foreach($ch as $c)

                                        @php

                                            $date=new DateTime($c->created_at);
                                            $date=$date->format('m/d/Y');
                                            $d= new DateTime($now);
                                            $d=$d->format('m/d/Y');

                                            $d1=date_create($date);
                                        $d2=date_create($d);
                                        $dif = date_diff($d2,$d1);
                                        
                                        $night+=$dif->format('%a'); 

                                        @endphp
                                            
                                        @endforeach
                                        @foreach($pay as $p)
                                        <tr>
                                            <td>{{ $p->handler }}</td>
                                            <td>
                                                @if($p->handler=="Room")
                                            
                                                {{ $night }} @if($night == 1) day @else days @endif

                                                @endif
                                            </td>
                                            <td>@if($p->handler=="Room") Php.{{ $p->amount }}.00 per day @else Php.{{ $p->amount }}.00 @endif</td>
                                            
                                            <td>@if($p->handler=="Room") Php.{{ $sub=$night * $p->amount }}.00 @else Php.{{ $sub=$p->amount }}.00 @endif</td>
                                        </tr>
                                        @php
                                            $total+=$sub;
                                        @endphp
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="row invoice-payment">
                                        <div class="col-sm-7">
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="m-b-20">
                                                <h6>Total due</h6>
                                                <div class="table-responsive no-border">
                                                    <table class="table mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th>Total:</th>
                                                                <td class="text-right text-primary">
                                                                    <h5 class="font-weight-bold">Php.{{$total  }}.00</h5>
																</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br><br>


                    </div>
                 </div>
             @include('management.includes.footer')
             </div>
         </div>
         @include('management.includes.script')
     </body>
     </html>
