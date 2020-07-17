<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Laboratory  | Facilities</title>
		@include('laboratory.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('laboratory.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('laboratory.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Facilities</h1>

		
							<div class="card shadow mb-4">
    	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">List of Facilities</h6>
    	</div>
			<div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>Facility Name</th>
		                  <th>Handler</th>
		                  <th>Lab Fee</th>
		                </tr>
		              </thead>
		              <tfoot>
		                <tr>
		                  <th>Facility Name</th>
		                  <th>Handler</th>
		                  <th>Lab Fee</th>
		                </tr>
		              </tfoot>
		              <tbody>
		              @foreach ($data as $row)
		              	<tr>
		              	  <td>{{$row->name}}</td>
		              	  <td>{{$row->handler}}</td>
		              	  <td><span class="text text-danger font-weight-bold">Php.{{$row->lab_fee}}.00</span></td>
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
