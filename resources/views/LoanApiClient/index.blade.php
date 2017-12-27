
@extends('layouts/app')

@section('content')

    <script type="text/javascript">
        $(document).ready(function() {

            $('.prev-step').hide();

            $('.nav-tabs > li a[title]').tooltip();

            $('.next-step').on("click", function(e) {
                                $('.prev-step').show();

                var $inputs = $('.tab-content .active').find("input");
                var $selects = $('.tab-content .active').find("select");
                var valid = true;

                $inputs.each(function() {
                    if(!$(this).valid() && valid) {
                        valid = false;
                    }
                });
                $selects.each(function() {
                    if(!$(this).valid() && valid) {
                        valid = false;
                    }
                });

                if (valid === false) {
                    return false;

            }
                var $active=$('.tab-content > .tab-pane.active');
                nextTab($active);
            });
            $('.prev-step').on("click", function(e) {
                var $active = $('.tab-content > .tab-pane.active');
                prevTab($active);
            });

            $('input[name=ApplicationType]').on('change', function(e) {
                if($('input[name="ApplicationType"]:checked').val() == 'Joint') {
                    showJointApplicantTab(e);
                } else {
                    hideJointApplicantTab(e);
                }
            });

            $('#getresults').on("click", function(e) {
                getSubmitted();
            });

            $("[data-hide]").on("click", function(e) {
                $('.alert').addClass("collapse");
                $('.alert').alert('hide');
            });





        //use link to submit form instead of button
        $("a[id=submit]").click(function() {
            $(this).parents("form").submit();
        });


        });

        function getSubmitted() {
            $.ajax({
                type: "POST",
                url: "/newsite/public/LoanApplication",
                data: $('#LoanApplication').serialize(),
                contentType: "application/x-www-form-urlencoded; charset=utf-8",
                success: function(data) {
                    $('body').replaceWith(data);
                },
                error: function(error) {
                    console.log(error);
                }

            });
        //    console.log("Check form");
        //    if ($('#LoanApplication').valid == true) {
        //        if(confirm("Are you sure you want to submit?")) {
        //            return false;
        //        }
        //    } else {
        //        $('.alert').removeClass("collapse");
        //        $('.alert').alert('show');
        //    }
        }


        function showJointApplicantTab(el) {
            $secondary = $('.secondary-applicant');
            $secondary.each(function(e) {
                $div = $($secondary)[e];
                $($div).removeClass("disabled");
            });
        }

        function hideJointApplicantTab(el) {
            $secondary = $('.secondary-applicant');
            $secondary.each(function(e) {
                $div = $($secondary)[e];
                $($div).addClass("disabled");
            });
        }

        function swapBottom(flag) {
            if (flag == "off") {
                $('#bottom-1').show();
                $('#bottom-2').hide();
                $('.tab-pane').show();
                $('.next-step').show();
            } else {
                $('#bottom-1').hide();
                $('.tab-pane').hide();
                $('#bottom-2').show();
                $('.next-step').hide();
                $('.prev-step').hide();
            }
        }

        function nextTab(el) {
            $nextTab = $(el).next('div');
            if(!$($nextTab).hasClass("tab-pane") || $($nextTab).hasClass("disabled")) {
                swapBottom("on");
                return false;
            }
            $(el).removeClass("active");
            $($nextTab).addClass("active");
        }

        function prevTab(el) {
            $prevTab = $(el).prev('div');
            if (!$($prevTab).hasClass("tab-pane")) {
                return false;
            }
            swapBottom("off");
            $(el).removeClass("active");
            $($prevTab).addClass("active");
        }
    </script>

    <span class="errMsg" id="errMsg"></span>

    <div class="m-4 alert alert-danger collapse" role="alert">
        <button type="button" class="close" data-hide="alert" aria-label="Close"> <span aria-hidden="true"><i class="fa fa-close"></i></span> </button>
        <strong>Something went wrong!</strong> Please ensure all required fields are filled out!
    </div>

    <div class="mb-4">

        <div class="row  no-gutters myBg " style="background-image:url('img/same-day-loan.jpg');">

            <div class="col-lg-6 offset-lg-6  pl-5 myBlue pt-3 ">
            <div class="row">
                <div class="col-md-12">

                <form id="LoanApplication" role="form" action="/LoanApplication" method="POST" onSubmit="getSubmitted()">

                    <div id="bottom-2" role="tabpanel" class="tab-pane active p-2 collapse">

                        <div class="small mt-1">
                            <p class="text-justify">
                            <input type="checkbox" name="MarketingOptIn" required />
                            &nbsp;&nbsp;&nbsp;By clicking the “Get Your Results” button and submitting my information, I hereby consent to receiving email, SMS or other marketing communications from (Company), and its trusted partners and third party finders / aggregators working on behalf of lenders. I understand that my consent to receive calls is not required in order to purchase any goods or services. If you don’t want to receive any marketing communications, just un-tick the box.”</p>
                            <hr />
                            <p class="text-justify">
                            <input type="checkbox" name="MarketingOptIn" required/>
                            &nbsp;&nbsp;&nbsp;By clicking the “Get Your Results” button and submitting my information, I hereby confirm that I understand and agree to the Terms & Conditions, Privacy Policy and the E-Consent, and I understand, agree, and authorize under the Fair Credit Reporting Act that (1) my information may be sent to lending partners, and third party finders / aggregators working on behalf of lenders, on my behalf to complete my request, and (2) that such lending partners, and third party finders / aggregators working on behalf of lenders may obtain consumer reports and related information about me from one or more consumer reporting agencies, such as TransUnion, Experian and Equifax. I hereby agree to receive calls about loans (which calls may be auto-dialed, use artificial or pre-recorded voices, and/or be text messages) from these companies and their agents to the telephone number(s) I’ve provided.</p>
                        </div>

                                    <div class="align-middle text-center">
                            <button id="getresults" class="btn btn-primary text-center" onClick="$('#LoanApplication').validate();">Get Your Results</button>
                        </div>
                    </div>

                    <div id="myTabs" class="tab-content">
                    <div id="loan-purpose" role="tabpanel" class="tab-pane active p-2">
                        <h5>Step One<br>
                        <span class="step-subtitle ">Lowest Rates. Simple Process </span> </h5>
                        <hr/>
                        <div class="form-group">
                        <label class="myLabel">Type of Loan</label>
                        <input tabindex="1" checked type="radio" name="ApplicationType" id="ApplicationType" value="Individual" required>
                        <span class="white">Individual&nbsp;</span>
                        <input tabindex="2" type="radio" name="ApplicationType" id="ApplicationType" value="Joint" required>
                        <span class="white">Joint</span> </div>
                        <div class="form-group">
                        <label class="col-form-label myLabel">Loan Purpose</label>
                        <div class="col-12 ml-0 pl-0">
                            <select class="form-control" name="LoanPurpose" required>
                            <option value="HomeImprovement">Home Improvement</option>
                            <option value="NewAutoPurchase">New Auto Purchase</option>
                            <option value="UsedAutoPurchase">Used Auto Purchase</option>
                            <option value="AutoRefinancing">Auto Refinancing</option>
                            <option value="LeaseBuyOut">Lease Buyout</option>
                            <option value="PrivatePartyPurchase">Private Party Purchase</option>
                            <option value="BoatRvPurcahse">Boat or RV Purchase</option>
                            <option value="MotorcyclePurchase">Motorcycle Purchase</option>
                            <option value="TimeSharePurchase">Timeshare Purchase</option>
                            <option value="EducationalExpenses">Educational Expense</option>
                            <option value="MedicalExpense">Medical Expense</option>
                            <option value="CreditCardConsolidation">Credit Card Consolidation</option>
                            <option value="Other">Other</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div id="loan" role="tabpanel" class="tab-pane p-2">
                        <h5>Loan Information</h5>
                        <!--loan amount-->
                        <div class="form-group ">
                        <label class="col-form-label">Loan Amount</label>
                        <div class="">
                            <select name="LoanAmount" class="form-control">
                            <option value="5000">$5,000</option>
                            <option value="10000">$10,000</option>
                            <option value="20000">$20,000</option>
                            <option value="30000">$30,000</option>
                            <option value="40000">$40,000</option>
                            <option value="50000">$50,000</option>
                            <option value="60000">$60,000</option>
                            <option value="70000">$70,000</option>
                            <option value="80000">$80,000</option>
                            <option value="90000">$90,000</option>
                            <option value="100000">$100,000</option>
                            </select>
                        </div>
                        </div>

                        <!--loan amount-->

                        <div class="form-group">
                        <label class="col-form-label">Loan Term</label>
                        <div class="">
                            <select name="LoanTerm" class="form-control">
                            <option value="12">12 months</option>
                            <option value="24">24 months</option>
                            <option value="36">36 months</option>
                            <option value="48">48 months</option>
                            <option value="60">60 months</option>
                            <option value="72">72 months</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">How do you want to pay?</label>
                        <div class="">
                            <select name="PaymentType" class="form-control" required>
                            <option value="AutoPay">AutoPay</option>
                            <option value="Invoice">Invoice</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <!-- PRIMARY APPLICANT -->
                    <!-- *** STARTS HERE *** -->
                    <div id="applicant" class="tab-pane p-2" role="tabpanel">
                        <h5>Primary Applicant</h5>
                        <div class="form-group">
                        <label class="col-form-label">First Name</label>
                        <div class="">
                            <input type="text" class="form-control" name="applicants[0][FirstName]" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Last Name</label>
                        <div class="">
                            <input name="applicants[0][LastName]" class="form-control" required  />
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <div class="">
                            <input type="email" class="form-control" name="applicants[0][EmailAddress]" required />
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Own or Rent?</label>
                        <div class="">
                            <select name="applicants[0][HousingStatus]" class="form-control" required>
                            <option value="">Not Selected</option>
                            <option value="Rent">Rent</option>
                            <option value="Own">Own</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Primary Phone</label>
                        <div class="">
                            <input type="tel" name="applicants[0][PhoneNumber]" class="form-control" required />
                        </div>
                        </div>
                    </div>

                    <div class="tab-pane p-2" role="tabpanel" id="residence">
                        <h5>Primary Applicant</h5>
                        <div class="form-group">
                        <label class="col-form-label">Years At Address</label>
                        <div class="">
                            <select class="form-control" name="applicants[0][TimeAtAddress]" required>
                                <?php for($i = 1; $i <= 50; $i++) :?>
                                    <option value="{{ $i }}">{{ $i }} years</option>
                                <?php endfor ?>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Street Address</label>
                        <div class="">
                            <input type="text" name="applicants[0][AddressLine]" class="form-control" required />

                        </div>
                        </div>

                        <div class="form-group">
                        <label class="col-form-label">City</label>
                        <div class="">
                            <input name="applicants[0][City]" class="form-control" required />
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">State</label>
                        <div class="">
                            <select name="applicants[0][State]"  class="form-control" required >
                                <option value="">Not Selected</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Zip Code</label>
                        <div class="">
                            <input type="text" class="form-control" name="applicants[0][ZipCode]" required />
                        </div>
                        </div>
                    </div>

                    <div class="tab-pane p-2" role="tabpanel" id="security">
                        <h5>Primary Applicant</h5>
                        <div class="form-group">
                        <label class="col-form-label">Social Security #</label>
                        <div class="">
                            <input type="text" class="form-control" name="applicants[0][SocialSecurityNumber]" required  />
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Date of Birth</label>
                        <div class="">
                            <input type="date" name="applicants[0][DateOfBirth]" class="form-control" required  />
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Employment</label>
                        <div class="">
                            <select class="form-control" name="applicants[0][EmployerName]" required>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Retired">Retired</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Gross Annual Income</label>
                        <div class="">
                            <input type="text" class="form-control" name="applicants[0][GrossAnnualIncome]" required />
                        </div>
                        </div>
                    </div>


                    <!-- PRIMARY APPLICANT ENDS HERE -->
                    <!-- JOINT APPLICANT STARTS HERE -->
                    <div id="applicant2" class="tab-pane p-2 disabled secondary-applicant" role="tabpanel">
                        <h5>Joint Applicant</h5>
                        <div class="form-group">
                        <label class="col-form-label">First Name</label>
                        <div class="">
                            <input type="text" class="form-control" name="applicants[1][FirstName]" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Last Name</label>
                        <div class="">
                            <input name="applicants[1][LastName]" class="form-control" required  />
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <div class="">
                            <input type="email" class="form-control" name="applicants[1][EmailAddress]" required />
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Own or Rent?</label>
                        <div class="">
                            <select name="applicants[1][HousingStatus]" class="form-control" required>
                            <option value="">Not Selected</option>
                            <option value="Rent">Rent</option>
                            <option value="Own">Own</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Primary Phone</label>
                        <div class="">
                            <input type="tel" name="applicants[1][PhoneNumber]" class="form-control" required />
                        </div>
                        </div>
                    </div>
                    <div class="tab-pane p-2 disabled secondary-applicant" role="tabpanel" id="residence2">
                        <h5>Joint Applicant</h5>
                        <div class="form-group">
                        <label class="col-form-label">Years At Address</label>
                        <div class="">
                            <select class="form-control" name="applicants[1][TimeAtAddress]" required>
                                <?php for($i = 1; $i <= 50; $i++) :?>
                                    <option value="{{ $i }}">{{ $i }} years</option>
                                <?php endfor ?>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Street Address</label>
                        <div class="">
                            <input type="text" name="applicants[1][AddressLine]" class="form-control" required />
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="col-form-label">City</label>
                        <div class="">
                            <input name="applicants[1][City]" class="form-control" required />
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">State</label>
                        <div class="">
                            <select name="applicants[1][State]"  class="form-control" required >
                                <option value="">Not Selected</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Zip Code</label>
                        <div class="">
                            <input type="text" class="form-control" name="applicants[1][ZipCode]" required />
                        </div>
                        </div>
                    </div>
                    <div class="tab-pane p-2 disabled secondary-applicant" role="tabpanel" id="security2">
                        <h5>Joint Applicant</h5>
                        <div class="form-group">
                        <label class="col-form-label">Social Security #</label>
                        <div class="">
                            <input type="text" class="form-control" name="applicants[1][SocialSecurityNumber]" required  />
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Date of Birth</label>
                        <div class="">
                            <input type="date" name="applicants[1][DateOfBirth]" class="form-control" required  />
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Employment</label>
                        <div class="">
                            <select class="form-control" name="applicants[1][EmployerName]" required>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Retired">Retired</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label">Gross Annual Income</label>
                        <div class="">
                            <input type="text" class="form-control" name="applicants[1][GrossAnnualIncome]" required />
                        </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    </div>


                </form>
                </div>
            </div>
            <!--buttons-->
            <div class="row " >
                <div class="col-lg-12 bottom mb-1 pr-3">
                <button type="button" class="btn btn-primary btn-lg next-step float-right m-2">Get Started Now <span style="color:#b10000">|</span> <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                <a  class="prev-step float-right mt-4 pr-2" style="color:white;text-decoration:underline;font-weight:normal;cursor: pointer">Back</a> </div>
            </div>
            <!--buttons-->

            </div>
            <!--end blue-->

        </div>

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
            <!--<div id="bottom-2" role="tabpanel" class="tab-pane active p-2 collapse">
            <div class="align-middle text-center">
                <button id="getresults" class="btn btn-primary text-center">Get Your Results</button>
            </div>
            <div class="small mt-1">
                <p class="text-justify">
                <input type="checkbox" name="MarketingOptIn" />
                &nbsp;&nbsp;&nbsp;By clicking the “Get Your Results” button and submitting my information, I hereby consent to receiving email, SMS or other marketing communications from (Company), and its trusted partners and third party finders / aggregators working on behalf of lenders. I understand that my consent to receive calls is not required in order to purchase any goods or services. If you don’t want to receive any marketing communications, just un-tick the box.”</p>
                <hr />
                <p class="text-justify">
                <input type="checkbox" name="MarketingOptIn" />
                &nbsp;&nbsp;&nbsp;By clicking the “Get Your Results” button and submitting my information, I hereby confirm that I understand and agree to the Terms & Conditions, Privacy Policy and the E-Consent, and I understand, agree, and authorize under the Fair Credit Reporting Act that (1) my information may be sent to lending partners, and third party finders / aggregators working on behalf of lenders, on my behalf to complete my request, and (2) that such lending partners, and third party finders / aggregators working on behalf of lenders may obtain consumer reports and related information about me from one or more consumer reporting agencies, such as TransUnion, Experian and Equifax. I hereby agree to receive calls about loans (which calls may be auto-dialed, use artificial or pre-recorded voices, and/or be text messages) from these companies and their agents to the telephone number(s) I’ve provided.</p>
            </div>
            </div>-->
        </div>

    </div>

@endsection