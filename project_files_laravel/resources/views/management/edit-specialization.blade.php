<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin  | Update Specialization</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')

					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Specialization</h1>
							<div class="col-lg-6">
								<div class="card shadow mb-4">
                					<div class="card-header py-3">
                  						<h6 class="m-0 font-weight-bold text-primary">Update Specialization</h6>
                					</div>
                					<div class="card-body">
                					<form action="update/{{$edit->id}}" method="POST">
                						@csrf
	                					<div class="form-group">
	                  							<input type="text" class="form-control" id="name" name="name" value="{{$edit->name}}" placeholder="Enter Specialization..." required>
	                  							<input type="hidden" class="form-control" id="id" name="id" value="{{$edit->id}}"" placeholder="Enter Specialization..." required disabled>
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
