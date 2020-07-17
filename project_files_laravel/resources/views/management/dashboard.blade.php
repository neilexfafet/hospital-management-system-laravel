<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Management  | Dashboard</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Welcome {{ Auth::guard('management')->user()->name }} </h1>

		
<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Patients</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pat}}</div>
                    </div>
                    <div class="col-auto">
                    <a href="{{ url('management/manage-patients') }}"><i class="fas fa-wheelchair fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Registered Doctors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$doc}}</div>
                    </div>
                    <div class="col-auto">
                    <a href="{{ url('management/manage-doctors') }}"><i class="fas fa-stethoscope fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Doctors</div>
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$pend}}</div>
                        </div>
                    <div class="col-auto">
                    <a href="{{ url('management/pending-doctors') }}"><i class="fas fa-bookmark fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending for Check-In</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$chckn}}</div>
                    </div>
                    <div class="col-auto">
                    <a href="{{ url('management/pending-patients') }}"><i class="fas fa-user-injured fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
<div class="row">

          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Checked-In Patients</div>
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$inpat}}</div>
                        </div>
                    <div class="col-auto">
                    <a href="{{ url('management/checkin-patients') }}"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rooms</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$room}}</div>
                    </div>
                    <div class="col-auto">
                    <a href="{{ url('management/rooms') }}"><i class="fas fa-bed fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Billing Department</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$bill}}</div>
                    </div>
                    <div class="col-auto">
                    <a href="{{ url('management/add-billing') }}"><i class="fas fa-cash-register fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laboratory</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$lab}}</div>
                    </div>
                    <div class="col-auto">
                    <a href="{{ url('management/laboratory') }}"><i class="fas fa-flask fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
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
