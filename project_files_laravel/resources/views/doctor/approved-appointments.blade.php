<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Approved Appointment</title>
		@include('doctor.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('doctor.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('doctor.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Appointments</h1>

							<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Approved Appointments</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Patient Name</th>
                      <th>Address</th>
                      <th>Contact No.</th>
                      <th>Gender</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Patient Name</th>
                      <th>Address</th>
                      <th>Contact No.</th>
                      <th>Gender</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($data as $row)
                    @if($row->status == "Approved")
                    <tr>
                      <td>{{$row->first_name}} {{$row->last_name}}</td>
                      <td>{{$row->address}}</td>
                      <td>{{$row->contactno}}</td>
                      <td>{{$row->gender}}</td>
                      <td>{{$row->date}}</td>
                      <td>{{$row->time}}</td>
                      <td><span class="font-weight-bold text-danger">{{$row->status}}</span></td>
                      
                      <td><div class="row">
                          <a href="{{ route('medical.add',['id'=>$row->patient_id]) }}" class="btn btn-success btn-circle btn-sm">
                            <i class="fas fa-check"></i>
                          </a>
                          <form method="POST" action="discard-appointment/{{$row->id}}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-circle btn-sm">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>
                      </div>
                      </td>
                    </tr>
                    @endif
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
