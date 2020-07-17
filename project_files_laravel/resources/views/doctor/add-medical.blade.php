<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Doctor  | Personal Informnation</title>
        @include('doctor.includes.link')
    </head>
    <body id="page-top">
        <div id="wrapper">
        @include('doctor.includes.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                @include('doctor.includes.header')
                    <div class="container-fluid">
                    <div class="d-sm-flex align-items-right justify-content-between mb-4">
                        <h1 class="h3 mb-4 text-gray-800">Medical Record</h1>

                          <form action="checkin-patient" method="POST">
                          @csrf
                          <input type="hidden" name="patient_id" id="patient_id" value="{{$edit->id}}">
                          <input type="hidden" name="doctor_id" id="doctor_id" value="{{ Auth::guard('doctor')->user()->id }}">
                          <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Check In Patient</a>
                          </button>
                          </form>
                    </div>
                        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Patient Information</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                      <th width="20%">Name</th>
                      <td width="30%">{{$edit->first_name}} {{$edit->last_name}}</td>
                      <th width="20%">E-mail</th>
                      <td width="30%">{{$edit->email}}</td>
                    </tr>
                    <tr>
                      <th>Contact No.</th>
                      <td>{{$edit->contactno}}</td>
                      <th>Address</th>
                      <td>{{$edit->address}}</td>
                    </tr>
                    <tr>
                      <th>Gender</th>
                      <td>{{$edit->gender}}</td>
                      <th>Birth Date</th>
                      <td>{{$edit->birthday}}</td>
                    </tr>
            </table>
        </div>
        </div>
        </div>

      <div class="form-group row">
          <div class="col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Add Medical Records</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="collapseCardExample">
                  <div class="card-body">
                      <form action="add-med" method="POST">
                            @csrf
                            <div class="form-group">
                              <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label class="col-8 font-weight-bold"> Blood Pressure<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="bp" name="bp" placeholder="e.g. 120/80" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label class="col-8 font-weight-bold"> Weight (kg)<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="weight" name="weight" placeholder="kg" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label class="col-8 font-weight-bold"> Height (cm)<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="height" name="height" placeholder="cm" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label class="col-8 font-weight-bold"> Blood Sugar<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="bloodsugar" name="bloodsugar" placeholder="mg/dl" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label class="col-8 font-weight-bold"> CBC (Complete Blood Count)<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="cbc" name="cbc" placeholder="CBC" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label class="col-8 font-weight-bold"> Body Temperature<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="bodytemp" name="bodytemp" placeholder="deg F" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label class="col-8 font-weight-bold"> Medical Prescription<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="medprescription" name="medprescription" placeholder="Medical Prescription" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <label class="col-8 font-weight-bold"> Comments and Additionals<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="comments" name="comments" placeholder="comments" required>
                                </div>


                                <input type="hidden" name="patient_id" id="patient_id" value="{{$edit->id}}">
                              </div>
                              <div class="text-right">
                                  <button type="submit" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Add Medical Record</span>
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
                  <h6 class="m-0 font-weight-bold text-primary">Laboratory Request</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="laboratory">
                  <div class="card-body">
                    <form action="lab-request" method="POST">
                            @csrf
                            <div class="form-group">
                              <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label class="col-8 font-weight-bold">Laboratory<span class="text-danger">*</span></label>
                                    <select class="form-control" id="lab_id" name="lab_id">
                                      <option selected disabled>--SELECT LABORATORY--</option>
                                      @foreach ($data as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                            <div class="form-group">
                              <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label class="col-8 font-weight-bold">Request<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="request" name="request" placeholder="Request.." required>
                                </div>

                                <input type="hidden" name="patient_id" value="{{$edit->id}}">
                                <input type="hidden" name="doctor_id" value="{{ Auth::guard('doctor')->user()->id }}">

                              </div>
                            <div class="text-right">
                                  <button type="submit" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Request</span>
                                  </button>
                              </div>
                    </form>
                  </div>
                </div>
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
