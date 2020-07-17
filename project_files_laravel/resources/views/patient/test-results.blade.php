<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title>Patient  | Lab Tests</title>
		@include('patient.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('patient.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('patient.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Laboratory Test Result</h1>
							
						<div class="row">
        <div class="col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Laboratory Test Result</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Request</th>
                      <th>laboratory</th>
                      <th>Examiner</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Request</th>
                      <th>laboratory</th>
                      <th>Examiner</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($data as $row)
                    <tr>
                      <td>{{$row->request}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->handler}}</td>
                      <td width="15%">

                          <a href="{{ route('viewpatienttestresult',['id'=>$row->lt_id]) }}" class="btn btn-info btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-eye"></i>
                        </span>
                        <span class="text">Test Result</span>
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
			</div>



					</div>
				</div>
 			@include('patient.includes.footer')
 			</div>
		</div>
	@include('patient.includes.script')
	</body>
</html>
