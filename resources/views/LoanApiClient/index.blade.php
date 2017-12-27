
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

                        <div class="small mt-1">
                            <p class="text-justify">
                            <input type="checkbox" name="data[MarketingOptIn]" required />
                            &nbsp;&nbsp;&nbsp;By clicking the “Get Your Results” button and submitting my information, I hereby consent to receiving email, SMS or other marketing communications from (Company), and its trusted partners and third party finders / aggregators working on behalf of lenders. I understand that my consent to receive calls is not required in order to purchase any goods or services. If you don’t want to receive any marketing communications, just un-tick the box.”</p>
                            <hr />
                            <p class="text-justify">
                            <input type="checkbox" name="data[MarketingOptIn]" required/>
                            &nbsp;&nbsp;&nbsp;By clicking the “Get Your Results” button and submitting my information, I hereby confirm that I understand and agree to the Terms & Conditions, Privacy Policy and the E-Consent, and I understand, agree, and authorize under the Fair Credit Reporting Act that (1) my information may be sent to lending partners, and third party finders / aggregators working on behalf of lenders, on my behalf to complete my request, and (2) that such lending partners, and third party finders / aggregators working on behalf of lenders may obtain consumer reports and related information about me from one or more consumer reporting agencies, such as TransUnion, Experian and Equifax. I hereby agree to receive calls about loans (which calls may be auto-dialed, use artificial or pre-recorded voices, and/or be text messages) from these companies and their agents to the telephone number(s) I’ve provided.</p>
                        </div>

                        <div class="align-middle text-center">
                            <button id="getresults" class="btn btn-primary text-center" type="submit">Get Your Results</button>
                        </div>
                    </div>

                    <div id="myTabs" class="tab-content">

                        <!-- Step #1 -->
                        <div role="tabpanel" class="tab-pane p-2 active">
                            <h5>Loan Information</h5>
                            <hr/>
                            <div class="form-group">
                                <label class="col-form-label">Type of Loan</label>

                                <input type="radio" name="data[ApplicationType]" id="ApplicationType" value="Individual" required checked />
                                <span class="white">Individual&nbsp;</span>

                                <input type="radio" name="data[ApplicationType]" id="ApplicationType" value="Joint" required />
                                <span class="white">Joint</span>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Loan Purpose</label>
                                <select class="form-control" name="data[LoanPurpose]" required>
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

                            <div class="form-group">
                                <label class="col-form-label">Loan Purpose Description</label>
                                <input type="text"  class="form-control" name="data[LoanPurposeDescription]" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Loan Amount</label>
                                <select name="data[LoanAmount]" class="form-control">
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
                            <div class="form-group">
                                <label class="col-form-label">Loan Term</label>
                                <select name="data[LoanTerm]" class="form-control">
                                    <option value="12">12 months</option>
                                    <option value="24">24 months</option>
                                    <option value="36">36 months</option>
                                    <option value="48">48 months</option>
                                    <option value="60">60 months</option>
                                    <option value="72">72 months</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">How do you want to pay?</label>
                                <select name="data[PaymentType]" class="form-control" required>
                                    <option value="AutoPay">AutoPay</option>
                                    <option value="Invoice">Invoice</option>
                                </select>
                            </div>

                        </div>

                        <!-- Step #2 -->
                        <div role="tabpanel" class="tab-pane p-2">
                            <h5>Applicant Information</h5>
                            <div class="form-group">
                                <label class="col-form-label">First Name</label>
                                <input type="text" class="form-control" name="data[applicants][0][FirstName]" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Middle Initial</label>
                                <input type="text" class="form-control" name="data[applicants][0][MiddleInitial]" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Last Name</label>
                                <input name="data[applicants][0][LastName]" class="form-control" required  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Email Address</label>
                                <input type="email" class="form-control" name="data[applicants][0][EmailAddress]" required />
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Home Street Address</label>
                                <input type="text" name="data[applicants][0][AddressLine]" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Unit / Unit #</label>
                                <input type="text" name="data[applicants][0][Unit]" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">City</label>
                                <input name="data[applicants][0][City]" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">State</label>
                                <select name="data[applicants][0][State]"  class="form-control" required >
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

                            <div class="form-group">
                                <label class="col-form-label">Zip Code</label>
                                <input type="text" class="form-control" name="data[applicants][0][ZipCode]" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Primary Phone</label>
                                <div class="input-group">
                                    <span class="input-group-addon"> ( </span>
                                    <input type="tel" name="data[applicants][0][PhoneNumber][0]" class="form-control col-sm-3 text-center" placeholder="555" />
                                    <span class="input-group-addon"> ) </span>
                                    <input type="tel" name="data[applicants][0][PhoneNumber][1]" class="form-control col-sm-3 text-center" placeholder="123" />
                                    <span class="input-group-addon"> - </span>
                                    <input type="tel" name="data[applicants][0][PhoneNumber][2]" class="form-control col-sm-4 text-center" placeholder="4567" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Years At Address</label>
                                <select class="form-control" name="data[applicants][0][TimeAtAddress]" required>
                                    <?php for($i = 1; $i <= 50; $i++) :?>
                                        <option value="{{ $i }}">{{ $i }} years</option>
                                    <?php endfor ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Own or Rent?</label>
                                <div class="">
                                    <select name="data[applicants][0][HousingStatus]" class="form-control" required>
                                    <option value="">Not Selected</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Own">Own</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Social Security #</label>
                                <input type="text" class="form-control" name="data[applicants][0][SocialSecurityNumber]" required  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="data[applicants][0][DateOfBirth]" required  />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Driver's License</label>
                                <input type="text" class="form-control" name="data[applicants][0][DriversLicense]" required  />
                            </div>
                        </div>


                        <!-- Step #3 -->
                        <div role="tabpanel" class="tab-pane p-2">
                            <h5>Employment Information</h5>
                            <div class="form-group">
                                <label class="col-form-label">Work status</label>
                                <select class="form-control" name="data[employment][0][WorkStatus]">
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Unemployed">Unemployed</option>
                                    <option value="Retired">Retired</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Occupation Description</label>
                                <div class="">
                                    <input type="text" class="form-control" name="data[employment][0][OcupationDescription]" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Employer Name</label>
                                <div class="">
                                    <input type="text" class="form-control" name="data[employment][0][EmployerName]" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Emplyer Street Address</label>
                                <div class="">
                                    <input type="text" name="data[employment][0][AddressLine]" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Emplyer Unit / Unit #</label>
                                <div class="">
                                    <input type="text" name="data[employment][0][Unit]" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Emplyer City</label>
                                <div class="">
                                    <input name="data[employment][0][City]" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Emplyer State</label>
                                <select name="data[employment][0][State]"  class="form-control" />
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

                            <div class="form-group">
                                <label class="col-form-label">Emplyer Zip Code</label>
                                <div class="">
                                    <input type="text" class="form-control" name="data[employment][0][ZipCode]" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Emplyer Phone</label>
                                <div class="input-group">
                                    <span class="input-group-addon"> ( </span>
                                    <input type="tel" name="data[employment][0][PhoneNumber][0]" class="form-control col-sm-3 text-center" placeholder="555" />
                                    <span class="input-group-addon"> ) </span>
                                    <input type="tel" name="data[employment][0][PhoneNumber][1]" class="form-control col-sm-3 text-center" placeholder="123" />
                                    <span class="input-group-addon"> - </span>
                                    <input type="tel" name="data[employment][0][PhoneNumber][2]" class="form-control col-sm-4 text-center" placeholder="4567" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Time at Employer</label>
                                <div class="">
                                    <select class="form-control" name="data[employment][0][TimeAtAddress]" required>
                                        <?php for($i = 1; $i <= 50; $i++) :?>
                                            <option value="{{ $i }}">{{ $i }} years</option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Gross Annual Income</label>
                                <input type="text" class="form-control" name="data[employment][0][GrossAnnualIncome]" />
                            </div>
                        </div>


                        <!-- Step #4 -->
                        <div role="tabpanel" class="tab-pane p-2">
                            <h5>Financial Information</h5>

                            <div class="form-group">
                                <label class="col-form-label">Other Annual Income</label>
                                <div class="">
                                    <input type="text" class="form-control" name="data[financial][0][OtherAnnualIncome]" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Source of Other Annual Income</label>
                                <div class="">
                                    <input type="text" class="form-control" name="data[financial][0][SourceOfOtherAnnualIncome]" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Estimated Monthly Housing Costs</label>
                                <div class="">
                                    <input type="text" class="form-control" name="data[financial][0][EstimatedMonthlyHousingCosts]" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Estimated Home Equity</label>
                                <div class="">
                                    <input type="text" class="form-control" name="data[financial][0][EstimatedHomeEquity]" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Liquid Assets</label>
                                <div class="">
                                    <input type="text" class="form-control" name="data[financial][0][LiquidAssets]" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Retirement Assets</label>
                                <div class="">
                                    <input type="text" class="form-control" name="data[financial][0][RetirementAssets]" />
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
                <button type="button" class="btn btn-primary btn-lg next-step float-right m-2">
                    Get Started Now <span style="color:#b10000">|</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </button>
                <a class="prev-step float-right mt-4 pr-2" style="color:white;text-decoration:underline;font-weight:normal;cursor: pointer">
                    Back
                </a>
            </div>
        </div>
        <!--buttons-->

    </div>
    <!--end blue-->
</div>
@endsection