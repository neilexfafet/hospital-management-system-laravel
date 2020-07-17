<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Laboratory  | Dashboard</title>
		@include('laboratory.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('laboratory.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('laboratory.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Welcome {{ Auth::guard('laboratory')->user()->handler}}</h1>

		<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laboratory Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$lab}}</div>
                    </div>
                    <div class="col-auto">
                      <a href="{{ url('laboratory/pending-requests') }}"><i class="fas fa-calendar fa-2x text-gray-300"></i></a>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laboratory Test Results</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$result}}</div>
                    </div>
                    <div class="col-auto">
                    <a href="{{ url('laboratory/test-results') }}"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          </div>




					</div>
				</div>
 			@include('laboratory.includes.footer')
 			</div>
		</div>
	@include('laboratory.includes.script')
	</body>
</html>
