<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin  | Pending Patients</title>
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
              <h6 class="m-0 font-weight-bold text-primary">List of Pending Check-in Patients</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Patient Name</th>
                      <th>Status</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Patient Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($app as $ap)
                  @foreach ($patient as $p)
                  @if($ap->patient_id == $p->id)

                  <tr>
                      <td>{{$p->last_name}}, {{$p->first_name}}</td>
                      <td><span class="text text-success font-weight-bold">{{$ap->status}}</span></td>
                      <td>
                        <a href="{{ route('pendingcheckin.edit',['id'=>$p->id]) }}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-edit"></i>
                        </a>
                      </td>
                    </tr>
                    @endif
                  @endforeach
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
