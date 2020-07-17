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
                        <h1 class="h3 mb-4 text-gray-800">Personal Information</h1>

        
                        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Doctor Information</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                      <th width="20%">Name</th>
                      <td width="30%">Dr. {{ Auth::guard('doctor')->user()->first_name}} {{ Auth::guard('doctor')->user()->last_name}}</td>
                      <th width="20%">E-mail</th>
                      <td width="30%">{{ Auth::guard('doctor')->user()->email}}</td>
                    </tr>
                    <tr>
                      <th>Specialization</th>
                      <td>{{ Auth::guard('doctor')->user()->specialization}}</td>
                      <th>Contact No.</th>
                      <td>{{ Auth::guard('doctor')->user()->contactno}}</td>
                    </tr>
                    <tr>
                      <th>Gender</th>
                      <td>{{ Auth::guard('doctor')->user()->gender}}</td>
                      <th>Birth Date</th>
                      <td>{{ Auth::guard('doctor')->user()->birthday}}</td>
                    </tr>
                    <tr>
                      <th>Address</th>
                      <td>{{ Auth::guard('doctor')->user()->address}}</td>
                      <th>Biography</th>
                      <td>{{ Auth::guard('doctor')->user()->biography}}</td>
                    </tr>
            </table>
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
