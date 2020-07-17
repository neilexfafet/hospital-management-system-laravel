<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Billing  | Consultation Fees</title>
		@include('billing.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('billing.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('billing.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Consultation Fees</h1>

		<div class="card shadow mb-4">
    	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">List of Fees</h6>
    	</div>
			<div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>Doctor</th>
		                  <th>Fee</th>
		                  <th>Status</th>
		                </tr>
		              </thead>
		              <tfoot>
		                <tr>
		                  <th>Doctor</th>
		                  <th>Fee</th>
		                  <th>Status</th>
		                </tr>
		              </tfoot>
		              <tbody>
		              @foreach ($data as $row)
		              	<tr>
		              	  <td>Dr. {{$row->first_name}} {{$row->last_name}}</td>
		              	  <td><span class="text-danger">Php.{{$row->fee}}.00</span></td>
		              	  <td><span class="font-weight-bold text-success">{{$row->status}}</span></td>
		              	</tr>
		              @endforeach
		              </tbody>
                	</table>
              	</div>
            </div>
          </div>




					</div>
				</div>
 			@include('billing.includes.footer')
 			</div>
		</div>
	@include('billing.includes.script')
	</body>
</html>
