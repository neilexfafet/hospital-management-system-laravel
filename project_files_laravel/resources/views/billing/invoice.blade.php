<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Billing  | Invoice</title>
		@include('billing.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('billing.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('billing.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Patients</h1>
							<div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List of Unpaid Appointments</h6>
        </div>
            <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Patient Name</th>
                          <th>E-mail</th>
                          <th>Fee</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>

                          <th>Patient Name</th>
                          <th>E-mail</th>
                          <th>Fee</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                     
                      @foreach ($pay as $pay)
                      @foreach($patient as $p)
                      @php
                      $total=0;
                      @endphp
                      @if($p->id  == $pay->patient_id && $pay->payment == "Unpaid")
                        <tr>
                          <td>{{$p->first_name}} {{$p->last_name}}</td>
                          <td>{{$p->email}}</td>
                          @foreach($pay_all as $pall)
                          @if($pay->patient_id == $pall->patient_id) 
                          @php
                            $total+=$pall->amount;
                            @endphp
                            @endif
                          @endforeach
                          <td>Php.{{ $total}}.00</td>
                          <td>
                                <a href="{{ url('billing/edit-invoice/'.$p->id) }}" class="btn btn-success btn-circle btn-sm">
                                    <i class="fas fa-check"></i>
                                </a>
                          </td>
                        </tr>
                      @endif
                      @endforeach
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
          </div>
		




					</div>
				</div>
 			@include('billing.includes.footer')
 			</div>
		</div>
	@include('billing.includes.script')
	</body>
</html>
