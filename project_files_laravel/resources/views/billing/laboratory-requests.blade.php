<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Billing  | Laboratory Requests</title>
		@include('billing.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('billing.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('billing.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Laboratory Request</h1>
							<div class="card shadow mb-4">
    	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">List of Unpaid Requests</h6>
    	</div>
			<div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>Laboratory</th>
		                  <th>Request</th>
		                  <th>Patient Name</th>
		                  <th>Doctor</th>
		                  <th>Fee</th>
		                  <th>Status</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tfoot>
		                <tr>
		                  <th>Laboratory</th>
		                  <th>Request</th>
		                  <th>Patient Name</th>
		                  <th>Doctor</th>
		                  <th>Fee</th>
		                  <th>Status</th>
		                  <th>Action</th>
		                </tr>
		              </tfoot>
		              <tbody>
		              @foreach ($req as $r)
		              @foreach ($lab as $l)
		              @foreach ($pat as $p)
		              @foreach ($doc as $d)
		              @if($r->doctor_id == $d->id && $r->lab_id == $l->id && $r->patient_id == $p->id)
		              	<tr>
		              		<td>{{$l->name}}</td>
		              		<td>{{$r->request}}</td>
		              		<td>{{$p->first_name}} {{$p->last_name}}</td>
		              		<td>Dr {{$d->first_name}} {{$d->last_name}}</td>
		              		<td>Php.{{$l->lab_fee}}.00</td>
		              		<td><span class="font-weight-bold text-danger">{{$r->status}}</span></td>
		              		<td>
				 				<a href="{{ route('request.edit',['id'=>$r->id]) }}" class="btn btn-success btn-circle btn-sm">
				                  <i class="fas fa-check"></i>
				                </a>
		              		</td>
		              	</tr>
					  @endif
		              @endforeach
		              @endforeach
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
