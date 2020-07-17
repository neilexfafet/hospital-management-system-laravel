<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient  | Appointment History</title>
		@include('patient.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('patient.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('patient.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Appointment</h1>

							<div class="card shadow mb-4">
    	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">Appointment History</h6>
    	</div>
			<div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>Doctor</th>
		                  <th>Appointment Date</th>
		                  <th>Appoinment Time</th>
		                  <th>Date Created</th>
		                </tr>
		              </thead>
		              <tfoot>
		                <tr>
		                  <th>Doctor</th>
		                  <th>Appointment Date</th>
		                  <th>Appoinment Time</th>
		                  <th>Date Created</th>
		                </tr>
		              </tfoot>
		              <tbody>
		              
		              	<tr>
		              	@foreach ($data as $row)
			              <td>Dr. {{$row->first_name}} {{$row->last_name}}</td>
			              <td>{{$row->date}}</td>
			              <td>{{$row->time}}</td>
			              <td>{{$row->created_at}}</td>
			            </tr>
			          	@endforeach
					  </tbody>
                	</table>
              	</div>
            </div>
          </div>




					</div>
				</div>
 			@include('patient.includes.footer')
 			</div>
		</div>
	@include('patient.includes.script')
	</body>
</html>
