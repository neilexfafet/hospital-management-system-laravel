<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Management  | Specialization</title>
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
                  						<h6 class="m-0 font-weight-bold text-primary">Input Specialization</h6>
                					</div>
                					<div class="card-body">
                					<form action="add-entry" method="POST">
                						@csrf
	                					<div class="form-group">
	                  							<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Specialization..." required>
	                  					</div>
	                  					<div class="text-right">
	                  							<button type="submit" class="btn btn-primary btn-icon-split">
	                  								<span class="icon text-white-50">
	                      								<i class="fas fa-check"></i>
	                    							</span>
	                    							<span class="text">Add Entry</span>
	                    						</button>
	                    				</div>
	                				</form>
	                				</div>
	              				</div>
	              			</div>
	<div class="card shadow mb-4">
    	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">List of Specializations</h6>
    	</div>
			<div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>Specialization</th>
		                  <th>Created Date</th>
		                  <th>Updated Date</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tfoot>
		                <tr>
		                  <th>Specialization</th>
		                  <th>Created Date</th>
		                  <th>Updated Date</th>
		                  <th>Action</th>
		                </tr>
		              </tfoot>
		              <tbody>
		              @foreach ($data as $row)
		              	<tr>
			              <td>{{$row->name}}</td>
			              <td>{{$row->created_at}}</td>
			              <td>{{$row->updated_at}}</td>
			              <td>
			              	<a href="{{ route('specializations.edit',['id'=>$row->id]) }}" class="btn btn-warning btn-circle btn-sm">
		              			<i class="fas fa-edit"></i>
		              		</a>
		              		<a href="{{ route('specializations.destroy',['id'=>$row->id]) }}" class="btn btn-danger btn-circle btn-sm">
		              			<i class="fas fa-trash"></i>
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
