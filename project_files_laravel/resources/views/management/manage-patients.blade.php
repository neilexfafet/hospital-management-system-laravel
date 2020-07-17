<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin  | Manage Patients</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Manage Patients</h1>
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Patients</h6>
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
                  @foreach ($patients as $p)
                    <tr>
                      <td>{{$p->last_name}}, {{$p->first_name}}</td>
                      <td>{{$p->email}}</td>
                      <td>{{$p->address}}</td>
                      <td>{{$p->contactno}}</td>
                      <td>{{$p->gender}}</td>
                      <td>
                      <a href="{{ route('view.patient',['id'=>$p->id]) }}" class="btn btn-info btn-circle btn-sm">
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
 			@include('management.includes.footer')
 			</div>
		</div>
	@include('management.includes.script')
	</body>
</html>