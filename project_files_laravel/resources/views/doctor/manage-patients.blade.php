<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Manage Patients</title>
		@include('doctor.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('doctor.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('doctor.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Patients</h1>
							<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Patients You Handled</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Address</th>
                      <th>Contact No.</th>
                      <th>Gender</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Address</th>
                      <th>Contact No.</th>
                      <th>Gender</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($data as $row)
                    <tr>
                      <td>{{$row->first_name}} {{$row->last_name}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->address}}</td>
                      <td>{{$row->contactno}}</td>
                      <td>{{$row->gender}}</td>
                      <td>
                          <a href="{{ route('patient.view',['id'=>$row->id]) }}" class="btn btn-info btn-circle btn-sm">
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
 			@include('doctor.includes.footer')
 			</div>
		</div>
	@include('doctor.includes.script')
	</body>
</html>
