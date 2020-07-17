<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient  | Medical History</title>
		@include('patient.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('patient.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('patient.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Medical History</h1>
							<div class="card shadow mb-4">
					            <div class="card-header py-3">
					              <h6 class="m-0 font-weight-bold text-primary">List of Medical Records</h6>
					            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Blood Pressure</th>
                      <th>Weight</th>
                      <th>Height</th>
                      <th>Blood Sugar</th>
                      <th>CBC</th>
                      <th>Temperature</th>
                      <th>Medical Prescription</th>
                      <th>Comments</th>
                      <th>Visit Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($data as $row)
                  	<tr>
                  	  <td>{{$row->bp}}</td>
                  	  <td>{{$row->weight}} kg</td>
                  	  <td>{{$row->height}} cm</td>
                  	  <td>{{$row->bloodsugar}} mg/dl</td>
                  	  <td>{{$row->cbc}}</td>
                  	  <td>{{$row->bodytemp}} deg F</td>
                  	  <td>{{$row->medprescription}}</td>
                  	  <td>{{$row->comments}}</td>
                  	  <td>{{$row->updated_at}}</td>
                  	</tr>
                  @endforeach
                  </tbody>
                </table>
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
