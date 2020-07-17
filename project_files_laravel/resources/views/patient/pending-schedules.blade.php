<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient  | Pending Schedules</title>
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
      	<h6 class="m-0 font-weight-bold text-primary">Waiting for Approval</h6>
    	</div>
			<div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>Date</th>
		                  <th>Time</th>
		                  <th>Doctor</th>
		                  <th>Fee</th>
		                  <th>Status</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              @foreach ($data as $row)
					  @if($row->status == "Pending" || $row->status == "Resched")
		              	<tr>
			              <td>{{$row->date}}</td>
			              <td>{{$row->time}}</td>
			              <td>Dr. {{$row->first_name}} {{$row->last_name}}</td>
			              <td>Php.{{$row->fee}}.00</td>
			              <td><span class="font-weight-bold text-danger">{{$row->status}}</span></td>
			              <td><a href="{{ route('patientapp.edit',['id'=>$row->id]) }}" class="btn btn-warning btn-icon-split btn-sm">
                    		<span class="text">Update</span>
                  			</a>
                  			<a href="{{ route('appointment.destroy',['id'=>$row->id]) }}" class="btn btn-danger btn-circle btn-sm">
		              			<i class="fas fa-trash"></i>
		              		</a>
                  		  </td>
			            </tr>
						@endif
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
