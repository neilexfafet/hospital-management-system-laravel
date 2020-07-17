<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient  | Update Appointment</title>
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
							<div class="col-lg-6">
								<div class="card shadow mb-4">
                					<div class="card-header py-3">
                  						<h6 class="m-0 font-weight-bold text-primary">Update Appointment</h6>
                					</div>
                					<div class="card-body">
                					<form action="update/{{$edit->id}}" method="POST">
                						@csrf
	                					<div class="form-group">
	                							<span class="col-8 text-md font-weight-bold"> Date</span>
	                  							<input type="date" class="form-control" id="date" name="date" value="{{$edit->date}}" required>
	                  					</div>
	                  					<div class="form-group">
	                  							<span class="col-8 text-md font-weight-bold"> Time</span>
	                  							<input type="time" class="form-control" id="time" name="time" value="{{$edit->time}}" required>
	                  					</div>

	                  					<input type="hidden" class="form-control" id="status" name="status" value="Pending" required>

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
 			@include('patient.includes.footer')
 			</div>
		</div>
	@include('patient.includes.script')
	</body>
</html>
