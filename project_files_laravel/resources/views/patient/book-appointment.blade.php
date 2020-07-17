<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Patient  | Book Appointment</title>
        @include('patient.includes.link')
    </head>
    <body id="page-top">
        <div id="wrapper">
        @include('patient.includes.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                @include('patient.includes.header')
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Book Appointment</h1>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                  <h6 class="m-0 font-weight-bold text-primary">Input the required Details</h6>
                                </div>
                                <div class="card-body">
                                    <form action="add-booking" method="POST">
                                        @csrf
                                        <div class="form-group row">

                                            <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="{{ Auth::guard('patient')->user()->id }}">

                                            <div class="col-sm-4">
                                                <label class="col-8"> First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{ Auth::guard('patient')->user()->first_name }}" disabled>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="col-8"> Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{ Auth::guard('patient')->user()->last_name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <!--<div class="col-sm-4 mb-3 mb-sm-0">
                                                <label class="col-8"> Doctor Specialization <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name..." required>
                                            </div>-->
                                            <div class="col-sm-4">
                                                <label class="col-8"> Doctors <span class="text-danger">*</span></label>
                                                    <select class="form-control" id="doctor_id" name="doctor_id" required>
                                                        <option selected disabled>---SELECT DOCTOR---</option>
                                                        @foreach ($data as $row)
                                                        <option value="{{$row->id}}">Dr. {{$row->first_name}} {{$row->last_name}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                          <div class="col-sm-3 mb-3 mb-sm-0">
                                          <label class="col-8"> Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control form-control-user" placeholder="Date" name="date" required>
                                               
                                          </div>
                                          <div class="col-sm-3">
                                          <label class="col-12"> Time <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control form-control-user" placeholder="Time" name="time" required autocomplete="new-password">
                                          </div>
                                        </div>
                                        <div class="text-right">
                                                <button type="submit" class="btn btn-primary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Book Appointment</span>
                                                </button>
                                        </div>
                                    </form>
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
