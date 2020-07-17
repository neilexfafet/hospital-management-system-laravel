<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Laboratory  | Test Results</title>
		@include('laboratory.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('laboratory.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('laboratory.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Laboratory Test Results</h1>

							<div class="card shadow mb-4">
    	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">List of Patients</h6>
    	</div>
			<div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>Patient Name</th>
						  <th>Doctor</th>
		                  <th>Request</th>
						  <th width="10%">Action</th>
		                </tr>
		              </thead>
		              <tfoot>
		                <tr>
		                  <th>Patient Name</th>
						  <th>Doctor</th>
		                  <th>Request</th>
						  <th>Action</th>
		                </tr>
		              </tfoot>
		              <tbody>
		              @foreach ($data as $row)
		              	<tr>
		              	  <td>{{$row->p_first_name}} {{$row->p_last_name}}</td>
		              	  <td>Dr. {{$row->d_first_name}} {{$row->d_last_name}}</td>
		              	  <td>{{$row->request}}</td>
		              	  <td>
							<a href="{{ route('labtestresult.view',['id'=>$row->lt_id]) }}" class="btn btn-info btn-circle btn-sm">
								<i class="fas fa-eye"></i>
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
 			@include('laboratory.includes.footer')
 			</div>
		</div>
	@include('laboratory.includes.script')
	</body>
</html>
