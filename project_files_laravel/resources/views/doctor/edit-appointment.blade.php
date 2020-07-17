<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Edit Appointment</title>
		@include('doctor.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('doctor.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('doctor.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Appointment</h1>
							<div class="col-lg-12">
								<div class="card shadow mb-4">
                					<div class="card-header py-3">
                  						<h6 class="m-0 font-weight-bold text-primary">Update Appointment</h6>
                					</div>
                					<div class="card-body">
                					<form action="update/{{$edit->id}}" method="POST">
                						@csrf
                						<input type="hidden" name="patient_id" value="{{$edit->patient_id  }}">
	                					<div class="form-group">
	                  							<div class="col-3">
	                								<span class="col-8 text-lg font-weight-bold"> Status</span>
	                								<select class="form-control" id="status" name="status" required>
	                  									<option value="{{$edit->status}}">{{$edit->status}}</option>
	                  									<option value="Approved">Approve</option>
	                  									<option value="Reschedule">Re-Schedule</option>
	                  								</select>
	                  							</div>
	                  						</div>
	                  					<div class="text-right">
	                  							<button type="submit" class="btn btn-primary btn-icon-split">
	                  								<span class="icon text-white-50">
	                      								<i class="fas fa-check"></i>
	                    							</span>
	                    							<span class="text">Update</span>
	                    						</button>
	                    				</div>
	                				</form>
	                				</div>
	              				</div>
	              			</div>

		




					</div>
				</div>
 			@include('doctor.includes.footer')
 			</div>
		</div>
	@include('doctor.includes.script')
	</body>
</html>
