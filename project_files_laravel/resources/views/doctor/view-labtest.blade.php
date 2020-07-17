<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Lab Test</title>
		@include('doctor.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('doctor.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('doctor.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Laboratory Test Result</h1>

		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Result</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                      <th width="20%">Request</th>
                      <td>{{$edit->request}}</td>
                    </tr>
                    <tr>
                      <th>Test Result</th>
                      <td>{{$edit->testresult}}</td>
                    </tr>
            </table>
            <form action="forward/{{$edit->id}}" method="POST">
            @csrf
            	<input type="hidden" name="status" id="status" value="patient">
            	<div class="text-right">
                  <button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Forward To Patient</span>
                  </button>
              </div>
             </form>
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
