<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Management  | Appointment History</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Appointment History</h1>
							<div class="card shadow mb-4">
    	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">History</h6>
    	</div>
			<div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>Patient Name</th>
		                  <th>Doctor</th>
		                  <th>Date</th>
		                  <th>Time</th>
		                  <th>Created At</th>
		                </tr>
		              </thead>
		              <tfoot>
		                <tr>
		                  <th>Patient Name</th>
		                  <th>Doctor</th>
		                  <th>Date</th>
		                  <th>Time</th>
		                  <th>Created At</th>
		                </tr>
		              </tfoot>
		              <tbody>
		              @foreach ($appointment as $a)
		              @foreach ($doctor as $d)
		              @foreach ($patient as $p)
		              @if($a->doctor_id == $d->id && $a->patient_id == $p->id)
		              	<tr>
			              <td>{{$p->first_name}} {{$p->last_name}}</td>
			              <td>Dr. {{$d->first_name}} {{$d->last_name}}</td>
			              <td>{{$a->date}}</td>
			              <td>{{$a->time}}</td>
			              <td>{{$a->created_at}}</td>
			            </tr>
			          @endif
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
 			@include('management.includes.footer')
 			</div>
		</div>
	@include('management.includes.script')
	</body>
</html>
