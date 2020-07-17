<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin  | Lab Requests</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Laboratory Requests</h1>

		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Requests</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Patient Name</th>
                      <th>Request</th>
                      <th>Test Result</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Patient Name</th>
                      <th>Request</th>
                      <th>Test Result</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($data as $row)
                    <tr>
                      <td>{{$row->last_name}}, {{$row->first_name}}</td>
                      <td>{{$row->request}}</td>
                      <td>{{$row->testresult}}</td>
                      <td><span class="text text-danger font-weight-bold">{{$row->status}}</span></td>
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
