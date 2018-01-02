
@extends('layouts/app')

@section('content')
<script src="js/loanForm.js"></script>

<div class="row  no-gutters myBg " style="background-image:url('img/same-day-loan.jpg');">
    <div class="col-lg-6 offset-lg-6 p-3 myBlue">
        <div class="row">
            <div class="col-md-12">

                <form id="LoanApplication" role="form" method="POST">
                    {{ csrf_field() }}
                    <div id="bottom-2" role="tabpanel" class="tab-pane active p-2 collapse">


                    </div>

                    <div id="myTabs" class="tab-content">

                        <!-- Step #1 -->
                        <div role="tabpanel" class="tab-pane p-2 active">
                            <h5>
                                <div>Step 1 of 2</div>
                                <span class="step-subtitle">Loan Information</span>
                            </h5>
                            <hr/>

                            <div class="form-group row">
                                <label class="col-form-label col-5">House Own or Rent?</label>
                                <select name="data[applicants][0][HousingStatus]" class="form-control col" required>
                                    <option value="Own">Own</option>
                                    <option value="Rent">Rent</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-5">Loan Amount</label>
                                <select name="data[LoanAmount]" class="form-control col">
                                    <option value="20000">$20,000</option>
                                    <option value="30000">$30,000</option>
                                    <option value="40000">$40,000</option>
                                    <option value="50000">$50,000</option>
                                    <option value="60000">$60,000</option>
                                    <option value="70000">$70,000</option>
                                    <option value="80000">$80,000</option>
                                    <option value="90000">$90,000</option>
                                    <option value="100000">$100,000</option>
                                    <option value="110000">$110,000</option>
                                    <option value="120000">$120,000</option>
                                    <option value="130000">$130,000</option>
                                    <option value="140000">$140,000</option>
                                    <option value="150000">$150,000</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-5">Loan Term</label>
                                <select name="data[LoanTerm]" class="form-control col">
                                    <option value="12">12 months</option>
                                    <option value="24">24 months</option>
                                    <option value="36">36 months</option>
                                    <option value="48">48 months</option>
                                    <option value="60">60 months</option>
                                    <option value="72">72 months</option>
                                </select>
                            </div>

                            <!--buttons-->
                            <div class="row " >
                                <div class="col-lg-12 bottom mb-1 pr-3">
                                    <button type="button" class="btn btn-primary btn-lg next-step float-right m-2">
                                        Next
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <!--buttons-->

                        </div>

                        <!-- Step #2 -->
                        <div role="tabpanel" class="tab-pane p-2">
                            <h5>
                                <div>Step 1 of 2</div>
                                <span class="step-subtitle">Applicant Information</span>
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-5">First Name</label>
                                <input type="text" class="form-control col" name="data[applicants][0][FirstName]" required>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-5">Last Name</label>
                                <input type="text" name="data[applicants][0][LastName]" class="form-control col" required  />
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-5">Email Address</label>
                                <input type="email" class="form-control col" name="data[applicants][0][EmailAddress]" required />
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-5">Home Street Address</label>
                                <input type="text" name="data[applicants][0][AddressLine]" class="form-control col" required />
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-5">City</label>
                                <input name="data[applicants][0][City]" class="form-control col" required />
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-5">State</label>
                                <select name="data[applicants][0][State]"  class="form-control col" required >
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

                            <div class="form-group row">
                                <label class="col-form-label col-5">Zip Code</label>
                                <input type="number" class="form-control col-2" name="data[applicants][0][ZipCode]" required maxlength="5" minlength="5" />
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-5">
                                    Social Security #
                                    <span class="badge badge-light"
                                        data-toggle="tooltip" title="Secure transmission."
                                        style="font-size: 1em; padding: 0.25em 0.5em; margin-left: 0.5em;"
                                    >
                                        <i class="fa fa-lock" style="color: green;"></i>
                                    </span>
                                </label>
                                    <input type="number" class="form-control col" name="data[applicants][0][SocialSecurityNumber]"
                                        required maxlength="9" minlength="9"
                                    />
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-5">Date of Birth</label>
                                <input type="date" class="form-control col" name="data[applicants][0][DateOfBirth]" required  />
                            </div>


                            <div class="from-grop row m-4 small">
                                <div class="form-check row">
                                    <input type="checkbox" class="form-check-input col-1" name="data[MarketingOptIn]"  id="data[MarketingOptIn]" />
                                    <label class="form-check-label small" for="data[MarketingOptIn]">
                                        By clicking the “Get Your Results” button and submitting my information, I hereby consent to receiving email, SMS or other marketing communications from (Company), and its trusted partners and third party finders / aggregators working on behalf of lenders. I understand that my consent to receive calls is not required in order to purchase any goods or services. If you don’t want to receive any marketing communications, just un-tick the box.”
                                    </label>
                                </div>

                                <div class="form-check row">
                                    <input type="checkbox" class="form-check-input col-1" name="data[terms]" id="data[terms]" required checked="checked" />
                                    <label class="form-check-label small" for="data[terms]">
                                        By clicking the “Get Your Results” button and submitting my information, I hereby confirm that I understand and agree to the Terms & Conditions, Privacy Policy and the E-Consent, and I understand, agree, and authorize under the Fair Credit Reporting Act that (1) my information may be sent to lending partners, and third party finders / aggregators working on behalf of lenders, on my behalf to complete my request, and (2) that such lending partners, and third party finders / aggregators working on behalf of lenders may obtain consumer reports and related information about me from one or more consumer reporting agencies, such as TransUnion, Experian and Equifax. I hereby agree to receive calls about loans (which calls may be auto-dialed, use artificial or pre-recorded voices, and/or be text messages) from these companies and their agents to the telephone number(s) I’ve provided.
                                    </label>
                                </div>
                            </div>


                            <div class="align-middle text-center">
                                <button id="getresults" class="btn btn-primary text-center" type="submit">Submit to Qualify!</button>
                            </div>

                        </div>

                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!--end blue-->
</div>
@endsection