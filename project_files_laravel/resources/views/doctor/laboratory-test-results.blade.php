<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Test Results</title>
		@include('doctor.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('doctor.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('doctor.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Patient Test Results</h1>

						<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Test Results</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Patient Name</th>
                      <th>Request</th>
                      <th>Test Result</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Patient Name</th>
                      <th>Request</th>
                      <th>Test Result</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($data as $row)
                  	<tr>
                  	  <td>{{$row->first_name}} {{$row->last_name}}</td>
                  	  <td>{{$row->request}}</td>
                  	  <td>{{$row->testresult}}</td>
                  	  <td>
                  	  	<a href="{{ route('lab.test',['id'=>$row->id]) }}" class="btn btn-success btn-circle btn-sm">
                    		<i class="fas fa-check"></i>
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
 			@include('doctor.includes.footer')
 			</div>
		</div>
	@include('doctor.includes.script')
	</body>
</html>
