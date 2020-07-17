<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Management  | Update Laboratory</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')

					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Laboratory</h1>
							<div class="col-lg-8">
								<div class="card shadow mb-4">
                					<div class="card-header py-3">
                  						<h6 class="m-0 font-weight-bold text-primary">Update Laboratory</h6>
                					</div>
                					<div class="card-body">
                					<form action="update/{{$edit->id}}" method="POST">
                						@csrf
	                					<div class="form-group row">
		                					<div class="col-sm-6 mb-3 mb-sm-0">
		                						<label class="col-8"> Name Of Facility <span class="text-danger">*</span></label>
		                  							<input type="text" class="form-control" id="name" name="name" placeholder="Name..." value="{{$edit->name}}" required>
		                  					</div>
		                  					<div class="col-sm-6">
		                  						<label class="col-8"> Username <span class="text-danger">*</span></label>
		                  							<input type="text" class="form-control" id="username" name="username" placeholder="Username..." value="{{$edit->username}}" required>
		                  					</div>
	                  					</div>
	                  					<div class="form-group row">
	                  						<div class="col-sm-6 mb-3 mb-sm-0">
	                  							<label class="col-8"> Handler <span class="text-danger">*</span></label>
	                  							<input type="text" class="form-control" name="handler" id="handler" placeholder="Name of Handler..." value="{{$edit->handler}}" required>
	                  						</div>
	                  						<div class="col-sm-6">
	                  							<label class="col-8"> Fee <span class="text-danger">*</span></label>
	                  							<input type="number" class="form-control" name="lab_fee" id="lab_fee" placeholder="Laboratory Fee" value="{{$edit->lab_fee}}" required>
	                  						</div>
	                  					</div>
	                  					<div class="text-right">
	                  							<button type="submit" class="btn btn-primary btn-icon-split">
	                  								<span class="icon text-white-50">
	                      								<i class="fas fa-check"></i>
	                    							</span>
	                    							<span class="text">Update Laboratory</span>
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
