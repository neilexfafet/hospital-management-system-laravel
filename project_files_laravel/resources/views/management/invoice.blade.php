<!DOCTYPE html>
<html lang="en">
	<head>
		<title>management | Invoice</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('management.includes.header')
                    <div class="container-fluid">
                        
                        <h1 class="h3 mb-4 text-gray-800">Patient's Invoice</h1>

                            
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
                                        <img src={{ asset("assets/img/logo-dark.png") }} height="100" width="100" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li class="text-primary font-weight-bold" style="font-size: 50px">Hospital</li>
                                            <li>Julio Pacana Street, Licuan, Cagayan de Oro City</li>
                                            <li>Misamis Oriental, Philippines</li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">INVOICE #{{$inv->invoice}}</h3>
                                            <ul class="list-unstyled">
                                                <li>Date and Time: <span>{{$inv->created_at}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>  
                                        <br><br>
                                <div class="row">
                                        
                                    <table class="table">
                                        <tr>
                                            <td><h5><strong>Patient :</strong></td>
                                            <td class="font-weight-bold">{{$pat->first_name}} {{$pat->last_name}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Patient ID:</td>
                                            <td>{{$pat->patient_id}}</td>
                                            <td>Birth Date:</td>
                                            <td>{{$pat->birthday}}</td>
                                        </tr>
                                        <tr>
                                            <td>E-mail:</td>
                                            <td>{{$pat->email}}</td>
                                            <td>Gender:</td>
                                            <td>{{$pat->gender}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td>{{$pat->address}}</td>
                                            <td>Contact No.:</td>
                                            <td>{{$pat->contactno}}</td>
                                        </tr>
                                    </table>
                                            
                                </div><br><br><br>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>DESCRIPTION</th>
                                                <th>SUBTOTAL</th>
                                            </tr>
                                            @php
                                                $total=0;
                                                $sub=0;
                                            @endphp
                                        </thead>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{$row->handler}}</td>
                                                <td>Php.{{$sub=$row->total}}.00</td>
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
                                                                    <h5 class="font-weight-bold">Php.{{$total}}.00</h5>
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
