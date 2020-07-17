<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Management  | Patient's Invoice</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Reports</h1>

						<div class="card shadow mb-4">
					            <div class="card-header py-3">
					              <h6 class="m-0 font-weight-bold text-primary">Patient's Invoice</h6>
					            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Invoice No.</th>
                      <th>Patient's Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					  <th>Invoice No.</th>
                      <th>Patient's Name</th>
                      <th width="10%">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  @foreach ($data as $row)
					<tr>
					  <td>{{$row->invoice}}</td>
					  <td>{{$row->first_name}} {{$row->last_name}}</td>
					  <td>
					  	<a href="{{ route('invoice',['id'=>$row->invoice]) }}" class="btn btn-info btn-circle btn-sm">
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
 			@include('management.includes.footer')
 			</div>
		</div>
	@include('management.includes.script')
	</body>
</html>
