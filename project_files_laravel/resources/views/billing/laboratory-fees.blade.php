<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Billing  | Laboratory Fees</title>
		@include('billing.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('billing.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('billing.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Laboratory Fees</h1>

		<div class="card shadow mb-4">
    	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">List of Fees</h6>
    	</div>
			<div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>Laboratory</th>
		                  <th>Handler</th>
		                  <th>Fee</th>
		                  <th>Updated At</th>
		                </tr>
		              </thead>
		              <tfoot>
		                <tr>
		                  <th>Laboratory</th>
		                  <th>Handler</th>
		                  <th>Fee</th>
		                  <th>Updated At</th>
		                </tr>
		              </tfoot>
		              <tbody>
		              @foreach ($data as $row)
		              	<tr>
		              	  <td>{{$row->name}}</td>
		              	  <td>{{$row->handler}}</td>
		              	  <td><span class="text-danger">Php.{{$row->lab_fee}}.00</span></td>
		              	  <td>{{$row->updated_at}}</td>
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
