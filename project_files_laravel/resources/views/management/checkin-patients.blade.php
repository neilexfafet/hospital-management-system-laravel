<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Management  | Check-in Patients</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Patients</h1>
							<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Checked In Patients</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped text-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Doctor</th>
                      <th>Name</th>
                     
                      <th>Room Number</th>
                      <th>Room Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>Date</th>
                       <th>Doctor</th>
                      <th>Name</th>
                     

                      <th>Room Number</th>
                      <th>Room Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                @foreach($data as $c)
                    <tr>
                      <td>{{ $c->c_c }}</td>
                      <td>{{ $c->last_name }} ,{{ $c->first_name }}</td>
                      <td>{{$c->p_lname }}, {{$c->p_fname }}</td>
                    

                       <td>{{ $c->room_number }}</td>
                       <td>{{ $c->roomtype }}</td>
                        <td>{{ $c->c_status }}</td>
                        <td><a href="{{ url('checkin-patients/'.$c->c_id) }}" class="btn btn-secondary btn-sm"><i class="fas fa-sign-out-alt"></i>Discharged</a></td>
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
