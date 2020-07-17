<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Laboratory  | Edit Request</title>
		@include('laboratory.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('laboratory.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('laboratory.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Test Results</h1>
							<div class="col-lg-8">
								<div class="card shadow mb-4">
                					<div class="card-header py-3">
                  						<h6 class="m-0 font-weight-bold text-primary">Input Test Results</h6>
                					</div>
                					<div class="card-body">
									@foreach ($edit as $row)
                					<form action="update/{{$row->lt_id}}" method="POST">
                						@csrf
	                					<div class="form-group">
	                  							<textarea class="form-control" rows="10" id="testresult" name="testresult" placeholder="Enter Test Result" required></textarea>
	                  							<input type="hidden" name="status" value="Approved">
												<input type="hidden" name="patient_id" value="{{$row->p_id}}">
	                  					</div>
	                  					<div class="text-right">
	                  							<button type="submit" class="btn btn-primary btn-icon-split">
	                  								<span class="icon text-white-50">
	                      								<i class="fas fa-check"></i>
	                    							</span>
	                    							<span class="text">Add Result</span>
	                    						</button>
	                    				</div>
	                				</form>
									@endforeach
	                				</div>
	              				</div>
	              			</div>
		




					</div>
				</div>
 			@include('laboratory.includes.footer')
 			</div>
		</div>
	@include('laboratory.includes.script')
	</body>
</html>
