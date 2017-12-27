<?php
namespace App;

class LoanApplication
{
    private $data = [];

    private function buildBody()
    {
        $applicationId = time();
        $driversLicense = substr($this->data['applicants'][0]['DriversLicense'], -4, 4);
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                <LoanApplication>
                    <LoanApplicationType>{$this->data['ApplicationType']}</LoanApplicationType>
                    <LoanPrimaryPurpose descriptionIfOther=\"{$this->data['LoanPurposeDescription']}\">
                        {$this->data['LoanPurpose']}
                    </LoanPrimaryPurpose>
                    <LoanAmount>{$this->data['LoanAmount']}</LoanAmount>
                    <LoanTermMonths>{$this->data['LoanTerm']}</LoanTermMonths>
                    <LoanPaymentType>{$this->data['PaymentType']}</LoanPaymentType>
                    <ApplicationId>$applicationId</ApplicationId>
                    <Applicants>
                        <Applicant type=\"Primary\">
                        <FirstName>{$this->data['applicants'][0]['FirstName']}</FirstName>
                        <MiddleInitial>{$this->data['applicants'][0]['MiddleInitial']}</MiddleInitial>
                        <LastName>{$this->data['applicants'][0]['LastName']}</LastName>
                        <SocialSecurityNumber>{$this->data['applicants'][0]['SocialSecurityNumber']}</SocialSecurityNumber>
                        <DateOfBirth>{$this->data['applicants'][0]['DateOfBirth']}</DateOfBirth>
                        <EmailAddress>{$this->data['applicants'][0]['EmailAddress']}</EmailAddress>
                        <DriversLicenseLastFourDigits>$driversLicense</DriversLicenseLastFourDigits>
                        <Residence ownership=\"{$this->data['applicants'][0]['HousingStatus']}\">
                            <Address>
                                <AddressLine>{$this->data['applicants'][0]['AddressLine']}</AddressLine>
                                <SecondaryUnit type=\"Apartment\" />
                                <City>{$this->data['applicants'][0]['City']}</City>
                                <State>{$this->data['applicants'][0]['State']}</State>
                                <ZipCode>
                                    <FiveDigitZipCode>{$this->data['applicants'][0]['ZipCode']}</FiveDigitZipCode>
                                </ZipCode>
                            </Address>
                            <TimeAtAddress>
                                <Months>0</Months>
                                <Years>{$this->data['applicants'][0]['TimeAtAddress']}</Years>
                            </TimeAtAddress>
                            <PhoneNumber>
                                <AreaCode>{$this->data['applicants'][0]['PhoneNumber'][0]}</AreaCode>
                                <CentralOfficeCode>{$this->data['applicants'][0]['PhoneNumber'][1]}</CentralOfficeCode>
                                <LineNumber>{$this->data['applicants'][0]['PhoneNumber'][2]}</LineNumber>
                            </PhoneNumber>
                        </Residence>
                        <Occupation type=\"{$this->data['employment'][0]['WorkStatus']}\">
                            <OccupationDescription>{$this->data['employment'][0]['OcupationDescription']}</OccupationDescription>
                            <GrossAnnualIncome>{$this->data['employment'][0]['GrossAnnualIncome']}</GrossAnnualIncome>
                            <Employer>
                                <EmployerName>{$this->data['employment'][0]['EmployerName']}</EmployerName>
                                <Address>
                                    <AddressLine>{$this->data['employment'][0]['AddressLine']}</AddressLine>
                                    <SecondaryUnit type=\"Suite\">{$this->data['employment'][0]['Unit']}</SecondaryUnit>
                                    <City>{$this->data['employment'][0]['City']}</City>
                                    <State>{$this->data['employment'][0]['State']}</State>
                                    <ZipCode>
                                        <FiveDigitZipCode>{$this->data['employment'][0]['ZipCode']}</FiveDigitZipCode>
                                    </ZipCode>
                                </Address>
                                <TimeWithEmployer>
                                    <Months>0</Months>
                                    <Years>{$this->data['employment'][0]['TimeAtAddress']}</Years>
                                </TimeWithEmployer>
                                <PhoneNumber>
                                    <AreaCode>{$this->data['employment'][0]['PhoneNumber'][0]}</AreaCode>
                                    <CentralOfficeCode>{$this->data['employment'][0]['PhoneNumber'][1]}</CentralOfficeCode>
                                    <LineNumber>{$this->data['employment'][0]['PhoneNumber'][2]}</LineNumber>
                                </PhoneNumber>
                            </Employer>
                        </Occupation>
                        </Applicant>
                    </Applicants>
                    <CombinedFinancials>
                        <MonthlyHousingCosts>{$this->data['financial'][0]['EstimatedMonthlyHousingCosts']}</MonthlyHousingCosts>
                        <OtherAnnualIncome source=\"Alimony\">{$this->data['financial'][0]['OtherAnnualIncome']}</OtherAnnualIncome>
                    </CombinedFinancials>
                </LoanApplication>
        ";
        return $xml;
    }

    public function __construct($data)
    {
        $this->data = $data;
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
