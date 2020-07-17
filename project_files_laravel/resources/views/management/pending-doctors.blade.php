<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin  | Pending Doctors</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Doctor</h1>
							<div class="card shadow mb-4">
					            <div class="card-header py-3">
					              <h6 class="m-0 font-weight-bold text-primary">List of Pending Doctors</h6>
					            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Specialization</th>
                      <th>E-mail</th>
                      <th>Contact No.</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Specialization</th>
                      <th>E-mail</th>
                      <th>Contact No.</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($data as $row)
                    <tr>
                      <td>Dr. {{$row->first_name}} {{$row->last_name}} </td>
                      <td>{{$row->specialization}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->contactno}}</td>
                      <td>{{$row->gender}}</td>
                      <th><span class="text text-danger">{{$row->status}}</span></th>
                      <td><a href="{{ route('doctor.edit',['id'=>$row->id]) }}" class="btn btn-warning btn-icon-split btn-sm">
                    		<span class="text">Update</span>
                  		</a>
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
