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
						<h1 class="h3 mb-4 text-gray-800"></h1>
<div class="card shadow mb-4">
    	<div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">List of Specializations</h6>
    	</div>
			<div class="card-body">
		
<form action="{{ action('CheckinController@store') }}" method="post">
            @csrf
				<div class="form-group row">
					<div class="col-sm-3 mb-3 mb-sm-0">
							<label class="col-8"> Room Type <span class="text-danger">*</span></label>
							<select class="form-control" name="roomtype"  	onchange="sel(this.value);">
								<option selected disabled value="0"> -- SELECT -- </option>
								@foreach($rmt as $r)
								<option value="{{ $r->id }}"> {{ $r->roomtype }} </option>
								@endforeach
							</select>
						</div>
					@foreach($rmt as $r)
  					<div class="col-sm-3"  id="r{{ $r->id }}" style="display: none">
  						<label class="col-8"> Room Number <span class="text-danger">*</span></label>
  							<select class="form-control" name="room_num{{ $r->id }}" required 	>
  							@foreach($rm as $r_num)
  								@if($r_num->room_type == $r->id && $r_num->status == "Available")
  									<option value="{{ $r_num->id }}">{{ $r_num->room_number}}</option>
  								@endif
  							@endforeach
  							</select>
  					</div>

  					<div class="col-sm-3" style="display: none" id="fee{{ $r->id }}">
  						<label class="col-8"> Fee (per day) <span class="text-danger">*</span></label>
  							<input type="number" class="form-control" id="fee" name="fee" required value="{{ $r->fee }}" readonly="">
  					</div>
  					@endforeach
					<input type="hidden" class="form-control" id="patient_id" name="patient_id" value="{{$id}}" >

				</div>
				<div class="text-right">
						<button type="submit" class="btn btn-primary btn-icon-split">
							<span class="icon text-white-50">
								<i class="fas fa-check"></i>
						</span>
						<span class="text">Check In</span>
					</button>
				</div>
            </form>
        </div>
        </div>



					</div>
				</div>
 			@include('management.includes.footer')
 			</div>
		</div>


	@include('management.includes.script')


		<script>

	function sel(val){
	
		@foreach($rmt as $r)
			if ( val == {{ $r->id }}) {
				$('#r{{ $r->id }}').show();
				$('#fee{{ $r->id }}').show();
			}else{
				$('#r{{ $r->id }}').hide();
				$('#fee{{ $r->id }}').hide();
			}
		@endforeach
	}
	
</script>
	</body>
</html>
