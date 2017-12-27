<?php
namespace App;

class LoanApplication
{

    private function buildBody()
    {
        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
            <LoanApplication>
                <LoanApplicationType>Individual</LoanApplicationType>
                <LoanPrimaryPurpose>AutoRefinancing</LoanPrimaryPurpose>
                <LoanAmount>12000</LoanAmount>
                <LoanTermMonths>48</LoanTermMonths>
                <LoanPaymentType>AutoPay</LoanPaymentType>
                <ApplicationId>3565653</ApplicationId>
                <Applicants>
                    <Applicant type=\"Primary\">
                        <FirstName>Will</FirstName>
                        <MiddleInitial />
                        <LastName>Cliffe</LastName>
                        <SocialSecurityNumber>123456789</SocialSecurityNumber>
                        <DateOfBirth>1997-07-08</DateOfBirth>
                        <EmailAddress>will@adstrack.io</EmailAddress>
                        <DriversLicenseLastFourDigits />
                        <Residence ownership=\"Own\">
                            <Address>
                                <AddressLine>123 Example St.</AddressLine>
                                <SecondaryUnit type=\"\"></SecondaryUnit>
                                <City>Seattle</City>
                                <State>WA</State>
                                <ZipCode>
                                    <FiveDigitZipCode>98101</FiveDigitZipCode>
                                    <ZipPlus4Code />
                                </ZipCode>
                            </Address>
                            <TimeAtAddress>
                                <Days>0</Days>
                                <Months>0</Months>
                                <Years>0</Years>
                            </TimeAtAddress>
                            <PhoneNumber>
                                <AreaCode>800</AreaCode>
                                <CentralOfficeCode>555</CentralOfficeCode>
                                <LineNumber>1234</LineNumber>
                            </PhoneNumber>
                        </Residence>
                        <Occupation>
                            <Type />
                            <OccupationDescription>Manager</OccupationDescription>
                            <GrossAnnualIncome>110000</GrossAnnualIncome>
                            <Employer>
                                <EmployerName>Acme</EmployerName>
                                <Address>
                                    <AddressLine>123 Foo St.</AddressLine>
                                    <SecondaryUnit type=\"Suite\">100</SecondaryUnit>
                                    <City>Seattle</City>
                                    <State>WA</State>
                                    <ZipCode>
                                        <FiveDigitZipCode>98101</FiveDigitZipCode>
                                        <ZipPlus4Code />
                                    </ZipCode>
                                </Address>
                                <TimeWithEmployer>
                                    <Days>23</Days>
                                    <Months>4</Months>
                                    <Years>6</Years>
                                </TimeWithEmployer>
                                <EmployerPhoneNumber>
                                    <AreaCode>800</AreaCode>
                                    <CentralOfficeCode>555</CentralOfficeCode>
                                    <LineNumber>0001</LineNumber>
                                </EmployerPhoneNumber>
                            </Employer>
                        </Occupation>
                    </Applicant>
                </Applicants>
            </LoanApplication>";
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
            ->send();
        dd($response->body->ApplicationPostProcessingResults->ApplicationPostStatus, $response->body->ApplicationPostProcessingResults->Stipulations);
        echo 'The Dead Weather has ' . count($response->body->result->album) . " albums.\n";
    }
}
