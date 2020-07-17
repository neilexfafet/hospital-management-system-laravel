<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin  | Update Doctor</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')

					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Doctor</h1>
							<div class="col-lg-12">
								<div class="card shadow mb-4">
                					<div class="card-header py-3">
                  						<h6 class="m-0 font-weight-bold text-primary">Update Doctor</h6>
                					</div>
                					<div class="card-body">
                					<form action="update/{{$edit->id}}" method="POST">
                						@csrf
	                					<div class="form-group">
	                						<div class="form-group row">
	                							<div class="col-4">
	                								<span class="col-8 text-lg font-weight-bold"> First Name</span>
	                  								<input type="text" class="form-control" value="{{$edit->first_name}}" disabled>
	                  							</div>
	                							<div class="col-4">
	                								<span class="col-8 text-lg font-weight-bold"> Last Name</span>
	                  								<input type="text" class="form-control" value="{{$edit->last_name}}" disabled>
	                  							</div>
	                  							<div class="col-4">
	                								<span class="col-8 text-lg font-weight-bold"> E-mail</span>
	                  								<input type="text" class="form-control" value="{{$edit->email}}" disabled>
	                  							</div>
	                  						</div>
	                  						<div class="form-group row">
	                							<div class="col-4">
	                								<span class="col-8 text-lg font-weight-bold"> Specialization</span>
	                  								<input type="text" class="form-control" value="{{$edit->specialization}}" disabled>
	                  							</div>
	                  							<div class="col-4">
	                								<span class="col-8 text-lg font-weight-bold"> Address</span>
	                  								<input type="text" class="form-control" value="{{$edit->address}}" disabled>
	                  							</div>
	                  							<div class="col-4">
	                								<span class="col-8 text-lg font-weight-bold"> Short Biography</span>
	                  								<input type="text" class="form-control" value="{{$edit->biography}}" disabled>
	                  							</div>
	                  						</div>
	                  						<div class="form-group row">
	                  							<div class="col-4">
	                								<span class="col-8 text-lg font-weight-bold"> Gender</span>
	                  								<input type="text" class="form-control" value="{{$edit->gender}}" disabled>
	                  							</div>
	                  							<div class="col-4">
	                								<span class="col-8 text-lg font-weight-bold"> Birth Date</span>
	                  								<input type="text" class="form-control" value="{{$edit->birthday}}" disabled>
                  								</div>	
                  								<div class="col-4">
	                								<span class="col-8 text-lg font-weight-bold"> Contact Number</span>
	                  								<input type="text" class="form-control" value="{{$edit->contactno}}" disabled>
                  								</div>
                  							</div>
	                  						<div class="form-group row">
	                  							<div class="col-3">
	                								<span class="col-8 text-lg font-weight-bold"> Fee</span>
	                  								<input type="text" class="form-control" id="fee" name="fee" value="{{$edit->fee}}" required>
	                  							</div>
	                  							<div class="col-3">
	                								<span class="col-8 text-lg font-weight-bold"> Status</span>
	                								<select class="form-control" id="status" name="status" required>
	                  									<option value="{{$edit->status}}">{{$edit->status}}</option>
	                  									<option value="Active">Confirm</option>
	                  									<option value="Denied">Deny</option>
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
 			@include('management.includes.footer')
 			</div>
		</div>
	@include('management.includes.script')
	</body>
</html>
