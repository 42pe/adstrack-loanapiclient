<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Improvement Loans</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js" integrity="sha256-F6h55Qw6sweK+t7SiOJX+2bpSAa3b/fnlrVCJvmEj1A=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/a012acf688.js"></script>

<style type="text/css">
footer, .footer {
	font-size: 12px;
	background-color: #faf9f9;
}
.myBlue {
	background: rgba(0,62,126, 0.8);
	min-height: 500px;
	position: relative;
}
h5 {
	font-size: 33px;
	line-height: 25px;
	margin: 0;
	padding: 0;
	text-transform: uppercase;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-weight: 700;
	color: white;
	margin-bottom: 14px;
}
h5.loan {
	color: #353535;
	font-size: 20px;
	margin-bottom: 0px;
	padding-bottom: 0px;
	text-transform: none;
	line-height: 22px;
}
.myBg {
	background-image: url(img/same-day-loan.jpg);
	background-position: -281px;
	background-repeat: no-repeat;
	background-size: cover;
	min-height: 500px;
}
.step-subtitle {
	font-size: 16px;
	line-height: 19px;
	margin: 0 0 30px;
	color: #00b4ff;
	text-transform: none;
}
label, input, span.white {
	color: white;
	font-weight: normal;
	font-size: 16px;
	font-family: myriad-pro, arial, sans-serif;
}
.myLabel {
	font-weight: 700;
}
.form-control {
	font-family: myriad-pro, arial, sans-serif;
}
.bottom {
	position: absolute;
	right: 0px;
	bottom: 0px;
}
/*
 * Row with equal height columns
 * --------------------------------------------------
 */
.row-eq-height {
	display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
}
body {
	background-color: #faf9f9;
	color: #353535;
}
.myBorder {
	background-color: white;
	border: 1px solid rgba(0,0,0,.1)
}
.btn-primary:focus, .btn-primary:hover {
	background: #f01717;
	border: 1px solid #c20000;
}
.red {
	color: #f01717;
}
.btn-primary {
	background: #c20000;
	border: 1px solid #c20000;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
form {
	margin-bottom: 50px;
}

label.error{
	color:red;
	margin: 0.25em 1em;
}

.text-primary {
	color: rgba(0,62,126, 0.8);
}
li.copyt {
	font-size: 19px;
	font-weight: bold;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	color:rgba(0,62,126, 0.8)
}
a{color:rgba(0,62,126, 0.8)}


#bottom-2 p{color:white}

@media (min-width: 576px) {
	.myBg {
		background-position: -0px;
	}
	.myBlue {
		opacity: 1;
		z-index: 1
	}
	form#LoanApplication, .col-form-label, .form-control {
		opacity: 1;
		z-index: 9999
	}
}

</style>


  </head>

    <body>
        <div class="container myBorder">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class=" text-center text-md-right">
                        <img src="img/home-logo.png"  class="img-fluid"/>
                    </div>
                </div>
                <div class="col-md-9 text-center text-md-right">
                    <h5 class="loan pt-5-md">You may qualify for a <span style="color:#00b4ff;">same day</span> home improvement loan!</h5>
                    <p><i>checking to see if you <span style="color: #f01717;font-weight:bold">qualify for a loan</span> won't affect your credit score</i><br>
                    </p>
                </div>
            </div>
			<span class="errMsg" id="errMsg"></span>

			<div class="m-4 alert alert-danger collapse" role="alert">
				<button type="button" class="close" data-hide="alert" aria-label="Close"> <span aria-hidden="true"><i class="fa fa-close"></i></span> </button>
				<strong>Something went wrong!</strong> Please ensure all required fields are filled out!
			</div>

			<div class="mb-4">
            	@yield('content')

				<div class="row">
					<div id="bottom-1" rol="tabpanel" class="tab-pane active pt-5 col-lg-12">
						<div class="row ">
							<div class="col-md-12 d-flex ">
							<ul class="list-inline  mx-auto justify-content-center">
								<li class="list-inline-item pr-md-5 mr-md-5 copyt text-sm"><i class="fa fa-clock-o fa-3x align-middle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<span class="">Same day <span class="red">approval</span></span></li>
								<li class="list-inline-item pr-md-5 mr-md-5 copyt"><i class="fa fa-thumbs-up fa-3x  align-middle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <span class="">Guaranteed <span class="red">Lowest</span> Rates</span></li>
								<li class="list-inline-item copyt"><i class="fa fa-3x fa-star-o  align-middle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<span class="">Fast & <span class="red">Simple</span> Process</span></li>
							</ul>
							</div>
						</div>
					</div>
				</div>

			</div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                <div class="col-md-6"> &copy; Copyright 2017</div>
                <div class="col-md-6 text-right"> <a href="">Privacy Policy</a>&nbsp;&nbsp;/&nbsp;&nbsp; <a href="">Terms of Use</a>&nbsp;&nbsp;/&nbsp;&nbsp; <a href="">About Us</a> </div>
                </div>
            </div>
        </footer>
    </body>
</html>