<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Billing  | Edit Request</title>
		@include('billing.includes.link')
	</head>
	<body id="page-top">
		<div id="wrapper">
		@include('billing.includes.sidebar')
			<div id="content-wrapper" class="d-flex flex-column">
      			<div id="content">
 				@include('billing.includes.header')
					<div class="container-fluid">
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-4 text-gray-800">Laboratory Request</h1>

						<form action="update/{{$edit->id}}" method="POST">
						@csrf
                        	<input type="hidden" name="status" value="Paid">
                        	<button type="submit" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
  								<span class="icon text-white-50">
      								<i class="fas fa-check"></i>
    							</span>
    							<span class="text">Update</span>
	                    	</button>
                        </form>
                    </div>
		<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Laboratory Request Invoice</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row custom-invoice">
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <img src='{{ asset("assets/img/logo-dark.png") }}'    height="75" width="75" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li>Hospital</li>
                                            <li>Julio Pacan Street, Licuan, Cagayan de Oro City</li>
                                            <li>Misamis Oriental, Philippines</li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">LAB Invoice #INV-{{$edit->id}}</h3>
                                            <ul class="list-unstyled">
                                                <li>Date: <span>Date</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                        <br><br>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 m-b-20">
										
											<h5>Invoice to:</h5>
											<ul class="list-unstyled">
												<li>
													<h5><strong>name</strong></h5>
												</li>
												<li>gender</li>
												<li>address</li>
												<li>contact</li>
												<li><a href="#">email</a></li>
											</ul>
										
                                    </div>
                                    <div class="col-sm-6 col-lg-6 m-b-20">
										<div class="invoices-view">
											<span class="text-muted">Payment Details:</span>
											<ul class="list-unstyled invoice-payment-details">
												<li>
													<h5>Total Due: <span class="text-right"></span></h5>
											</ul>
										</div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th width="50%">Doctor</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Lab Fee</th>
                                                <th>TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="row invoice-payment">
                                        <div class="col-sm-7">
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="m-b-20">
                                                <h6>Total due</h6>
                                                <div class="table-responsive no-border">
                                                    <table class="table mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th>Total:</th>
                                                                <td class="text-right text-primary">
                                                                    <h5></h5>
																</td>
                                                            </tr>
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
                         </div>
                        </div>
                        	<br><br>
                        

                        <br><br><br><br><br>



					</div>
				</div>
 			@include('billing.includes.footer')
 			</div>
		</div>
	@include('billing.includes.script')
	</body>
</html>
