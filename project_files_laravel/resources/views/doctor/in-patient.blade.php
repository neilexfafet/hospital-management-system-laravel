<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Check In</title>
		@include('doctor.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('doctor.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('doctor.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Check In</h1>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Patient Information</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                      <th width="20%">Name</th>
                      <td width="30%">{{$data->first_name}} {{$data->last_name}}</td>
                      <th width="20%">E-mail</th>
                      <td width="30%">{{$data->email}}</td>
                    </tr>
                    <tr>
                      <th>Contact No.</th>
                      <td>{{$data->contactno}}</td>
                      <th>Address</th>
                      <td>{{$data->address}}</td>
                    </tr>
                    <tr>
                      <th>Gender</th>
                      <td>{{$data->gender}}</td>
                      <th>Birth Date</th>
                      <td>{{$data->birthday}}</td>
                    </tr>
            </table>
        </div>
        <form action="" medthod="POST">
            @csrf
					<input type="hidden" class="form-control" id="patient_id" name="patient_id" value="{{$data->id}}" required>
  					
				</div>
				<div class="text-right">
						<button type="submit" class="btn btn-primary btn-icon-split">
							<span class="icon text-white-50">
								<i class="fas fa-check"></i>
						</span>
						<span class="text">Check In</span>
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
