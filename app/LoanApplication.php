<?php
namespace App;

class LoanApplication
{

    private function buildBody()
    {
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                <LoanApplication>
                    <LoanApplicationType>Individual</LoanApplicationType>
                    <LoanPrimaryPurpose descriptionIfOther=\"\">NewAutoPurchase</LoanPrimaryPurpose>
                    <LoanAmount>50000</LoanAmount>
                    <LoanTermMonths>60</LoanTermMonths>
                    <LoanPaymentType>AutoPay</LoanPaymentType>
                    <ApplicationId>500000111111</ApplicationId>
                    <Applicants>
                        <Applicant type=\"Primary\">
                        <FirstName>First</FirstName>
                        <MiddleInitial>M</MiddleInitial>
                        <LastName>Last</LastName>
                        <SocialSecurityNumber>534655111</SocialSecurityNumber>
                        <DateOfBirth>1951-05-05</DateOfBirth>
                        <EmailAddress>firstname@xyztest.com</EmailAddress>
                        <DriversLicenseLastFourDigits>5123</DriversLicenseLastFourDigits>
                        <Residence ownership=\"Own\">
                            <Address>
                            <AddressLine>12 Main St</AddressLine>
                            <SecondaryUnit type=\"Apartment\" />
                            <City>San Diego</City>
                            <State>CA</State>
                            <ZipCode>
                                <FiveDigitZipCode>92101</FiveDigitZipCode>
                            </ZipCode>
                            </Address>
                            <TimeAtAddress>
                            <Months>6</Months>
                            <Years>1</Years>
                            </TimeAtAddress>
                            <PhoneNumber>
                            <AreaCode>619</AreaCode>
                            <CentralOfficeCode>893</CentralOfficeCode>
                            <LineNumber>4567</LineNumber>
                            </PhoneNumber>
                        </Residence>
                        <Occupation type=\"EmployedByOther\">
                            <OccupationDescription>Analyst</OccupationDescription>
                            <GrossAnnualIncome>60000.00</GrossAnnualIncome>
                            <Employer>
                            <EmployerName>FirstAgain, LLC</EmployerName>
                            <Address>
                                <AddressLine>1 Maple</AddressLine>
                                <SecondaryUnit type=\"Suite\">1300</SecondaryUnit>
                                <City>San Diego</City>
                                <State>CA</State>
                                <ZipCode>
                                <FiveDigitZipCode>92101</FiveDigitZipCode>
                                <ZipPlus4Code />
                                </ZipCode>
                            </Address>
                            <TimeWithEmployer>
                                <Months>6</Months>
                                <Years>1</Years>
                            </TimeWithEmployer>
                            <PhoneNumber>
                                <AreaCode>808</AreaCode>
                                <CentralOfficeCode>893</CentralOfficeCode>
                                <LineNumber>4567</LineNumber>
                            </PhoneNumber>
                            </Employer>
                        </Occupation>
                        </Applicant>
                    </Applicants>
                    <CombinedFinancials>
                        <MonthlyHousingCosts>1150</MonthlyHousingCosts>
                        <OtherAnnualIncome source=\"Alimony\">36000.00</OtherAnnualIncome>
                    </CombinedFinancials>
                </LoanApplication>
        ";
        return $xml;
    }


    public function send()
    {
        $uri      = 'https://testapi.lightstream.com/LoanApplication';
        $response = \Httpful\Request::post($uri)
            ->addHeaders(array(
                'Content-type'           => 'application/xml',
                'X-Lightstream-ApiKey'   => '18ef2dde-a502-48fe-8a72-6de365cb801c',
                'X-Lightstream-TestMode' => 'True',
            ))
            ->body($this->buildBody())
            ->expectsXml()
            ->send();
        dd($response->body->ApplicationPostStatus, $response->body->Stipulations, $response->body);
    }
}
