<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin  | Add Rooms</title>
		@include('management.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('management.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('management.includes.header')
					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Rooms</h1>

						<div class="form-group row">
          <div class="col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Add Room Type</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="collapseCardExample">
                  <div class="card-body">
                      <form action="add-roomtype" method="POST">
                            @csrf
                            <div class="form-group">
                              <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label class="col-8 font-weight-bold"> Room Type<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="roomtype" name="roomtype" placeholder="Room Type" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label class="col-8 font-weight-bold"> Fee<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="fee" name="fee" placeholder="Php" required>
                                </div>
                              </div>
                              <div class="text-right">
                                  <button type="submit" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Add Room Type</span>
                                  </button>
                              </div>
                          </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#laboratory" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="laboratory">
                  <h6 class="m-0 font-weight-bold text-primary">Add Room Number</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="laboratory">
                  <div class="card-body">
                    <form action="add-roomnumber" method="POST">
                            @csrf
                            <div class="form-group">
                              <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label class="col-8 font-weight-bold">Room Type<span class="text-danger">*</span></label>
                                    <select class="form-control" id="room_type" name="room_type">
                                      <option selected disabled>--SELECT ROOM TYPE--</option>
									  @foreach ($type as $type)
                                        <option value="{{$type->id}}">{{$type->roomtype}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                            <div class="form-group">
                              <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label class="col-8 font-weight-bold">Room Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="room_number" name="room_number" placeholder="Room Number" required>
                                </div>
                              </div>
                            <div class="text-right">
                                  <button type="submit" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Add Room Number</span>
                                  </button>
                              </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

      </div>

			

						<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Rooms</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Room Type</th>
                      <th>Fee</th>
                      <th>Room Number</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					  <th>Room Type</th>
                      <th>Fee</th>
                      <th>Room Number</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  @foreach ($data as $row)
					<tr>
					  <td>{{$row->roomtype}}</td>
					  <td>Php.{{$row->fee}}.00</td>
					  <td>{{$row->room_number}}</td>
					  <td>{{$row->status}}</td>
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
