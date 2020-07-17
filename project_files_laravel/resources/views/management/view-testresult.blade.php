<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Management  | Lab Test</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')
				 
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Laboratory Test Result</h1>

						<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-8 text-right m-b-30">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white" onClick="javascript:window.print();"><i class="fa fa-print fa-lg"></i> Print</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row custom-invoice">
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <img src={{ asset("assets/img/logo-dark.png") }} height="150" width="150" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li class="text-primary font-weight-bold" style="font-size: 50px">HOSPITAL</li>
                                            <li>Julio Pacana Street, Licuan, Cagayan de Oro City</li>
                                            <li>Misamis Oriental, Philippines</li>
                                        </ul>
                                    </div>
				@foreach ($data as $row)
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase font-weight-bold">Laboratory Test Result</h3>
                                            <ul class="list-unstyled">
                                                <li>Date: <span>{{$mytime}}</span></li>
                                                <li>Date Received: <span>{{$row->updated_at}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 m-b-20">
									<table class="table">
										<tr>
											<td>LAB ID:</td>
											<td>LAB-#00{{$row->lab_id}}</td>
											<td>Date of Birth:</td>
											<td>{{$row->birthday}}</td>
										</tr>
										<tr>
											<td>Patient Name:</td>
											<td>{{$row->p_first_name}} {{$row->p_last_name}}</td>
											<td>Gender:</td>
											<td>{{$row->p_gender}}</td>
										</tr>
										<tr>
											<td>Patient ID:</td>
											<td>PAT-#00{{$row->p_id}}</td>
											<td>Address:</td>
											<td>{{$row->p_address}}</td>
										</tr>
										<tr>
											<td>E-mail:</td>
											<td>{{$row->p_email}}</td>
											<td>Contact No.:</td>
											<td>{{$row->p_contactno}}</td>
										</tr>
									</table>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th width="15%">Request</th>
                                                <th width="15%">Laboratory</th>
                                                <th>Test Result</th>
                                                <th width="10%">FEE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$row->request}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->testresult}}</td>
                                                <td>Php.{{$row->fee}}.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><br><br><br><br><br><br><br><br><br>
                                
								   <table class="table">
								   	<tr align="center">
										<td class="text-primary font-weight-bold" style="font-size: 25px">{{$row->handler}}</td>
										<td class="text-primary font-weight-bold" style="font-size: 25px">Dr. {{$row->d_first_name}} {{$row->d_last_name}}</td>
									</tr>
									<tr align="center">
										<td class="font-weight-bold">EXAMINER</td>
										<td class="font-weight-bold">DOCTOR</td>
									</tr>
									</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br><br><br><br>

					@endforeach


					</div>
				</div>
				</div>
 			@include('management.includes.footer')
 			</div>
		</div>
	@include('management.includes.script')
	</body>
</html>
