<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Management  | Laboratory</title>
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
                <!-- Card Header - Accordion -->
                <a href="#laboratory" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="laboratory">
                  <h6 class="m-0 font-weight-bold text-primary">Add Laboratory</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="laboratory">
                  <div class="card-body">
                					<form action="add-facility" method="POST">
                						@csrf
	                					<div class="form-group row">
		                					<div class="col-sm-6 mb-3 mb-sm-0">
		                						<label class="col-8"> Name Of Facility <span class="text-danger">*</span></label>
		                  							<input type="text" class="form-control" id="name" name="name" placeholder="Name..." required>
		                  					</div>
		                  					<div class="col-sm-6">
		                  						<label class="col-8"> Username <span class="text-danger">*</span></label>
		                  							<input type="text" class="form-control" id="username" name="username" placeholder="Username..." required>
		                  					</div>
	                  					</div>
	                  					<div class="form-group row">
	                  						<div class="col-sm-6 mb-3 mb-sm-0">
	                  							<label class="col-8"> Handler <span class="text-danger">*</span></label>
	                  							<input type="text" class="form-control" name="handler" id="handler" placeholder="Name of Handler..." required>
	                  						</div>
	                  						<div class="col-sm-6">
	                  							<label class="col-8"> Fee <span class="text-danger">*</span></label>
	                  							<input type="number" class="form-control" name="lab_fee" id="lab_fee" placeholder="Laboratory Fee" required>
	                  						</div>
	                  					</div>
	                  					<div class="form-group row">
						                  <div class="col-sm-6 mb-3 mb-sm-0">
						                  <label class="col-8"> Password <span class="text-danger">*</span></label>
						                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" required autocomplete="new-password">
						                       
						                  </div>
						                  <div class="col-sm-6">
						                  <label class="col-12"> Confirm Password <span class="text-danger">*</span></label>
						                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
						                  </div>
						                </div>
	                  					<div class="text-right">
	                  							<button type="submit" class="btn btn-primary btn-icon-split">
	                  								<span class="icon text-white-50">
	                      								<i class="fas fa-check"></i>
	                    							</span>
	                    							<span class="text">Register Facility</span>
	                    						</button>
	                    				</div>
	                				</form>
	                				</div>
                </div>
              </div>
            </div>

							<div class="card shadow mb-4">
    	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">List of Facilities</h6>
    	</div>
			<div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>Name</th>
		                  <th>Username</th>
		                  <th>handler</th>
		                  <th>Created Date</th>
		                  <th>Updated Date</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tfoot>
		                <tr>
		                  <th>Name</th>
		                  <th>Username</th>
		                  <th>handler</th>
		                  <th>Created Date</th>
		                  <th>Updated Date</th>
		                  <th>Action</th>
		                </tr>
		              </tfoot>
		              <tbody>
		              @foreach ($data as $row)
		              	<tr>
			              <td>{{$row->name}}</td>
			              <td>{{$row->username}}</td>
			              <td>{{$row->handler}}</td>
			              <td>{{$row->created_at}}</td>
			              <td>{{$row->updated_at}}</td>
			              <td>
			              	<a href="{{ route('editlaboratory',['id'=>$row->id]) }}" class="btn btn-warning btn-circle btn-sm">
		              			<i class="fas fa-edit"></i>
		              		</a>
			              </td>
			            </tr>
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
