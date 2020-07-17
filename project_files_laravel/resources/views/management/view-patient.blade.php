<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Management  | View Patient</title>
        @include('management.includes.link')
    </head>
    <body id="page-top">
        <div id="wrapper">
        @include('management.includes.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                @include('management.includes.header')
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Patient</h1>
                          
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

<div class="row">
        <div class="col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#laboratory" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="laboratory">
                  <h6 class="m-0 font-weight-bold text-primary">Medical History</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="laboratory">
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
                  @foreach ($med as $row)
                    <tr>
                      <td>{{$row->bp}}</td>
                      <td>{{$row->weight}}</td>
                      <td>{{$row->height}}</td>
                      <td>{{$row->bloodsugar}}</td>
                      <td>{{$row->cbc}}</td>
                      <td>{{$row->bodytemp}}</td>
                      <td>{{$row->medprescription}}</td>
                      <td>{{$row->comments}}</td>
                      <td>{{$row->created_at}}</td>
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

  <div class="row">
        <div class="col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Laboratory Test Result</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="collapseCardExample">
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
                  @foreach ($lab as $row)
                    <tr>
                      <td>{{$row->request}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->handler}}</td>
                      <td width="15%">

                          <a href="{{ route('testresult.view',['id'=>$row->l_id]) }}" class="btn btn-info btn-icon-split btn-sm">
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
            @include('management.includes.footer')
            </div>
        </div>
    @include('management.includes.script')
    </body>
</html>
