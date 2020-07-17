<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient  | Personal Information</title>
		@include('patient.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('patient.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('patient.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Personal Information</h1>

		
							<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Patient Information</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                      <th width="20%">Name</th>
                      <td width="30%">{{ Auth::guard('patient')->user()->first_name}} {{ Auth::guard('patient')->user()->last_name}}</td>
                      <th width="20%">E-mail</th>
                      <td width="30%">{{ Auth::guard('patient')->user()->email}}</td>
                    </tr>
                    <tr>
                      <th>Contact No.</th>
                      <td>{{ Auth::guard('patient')->user()->contactno}}</td>
                      <th>Address</th>
                      <td>{{ Auth::guard('patient')->user()->address}}</td>
                    </tr>
                    <tr>
                      <th>Gender</th>
                      <td>{{ Auth::guard('patient')->user()->gender}}</td>
                      <th>Birth Date</th>
                      <td>{{ Auth::guard('patient')->user()->birthday}}</td>
                    </tr>
            </table>
        </div>
        </div>
        </div>



					</div>
				</div>
 			@include('patient.includes.footer')
 			</div>
		</div>
	@include('patient.includes.script')
	</body>
</html>
