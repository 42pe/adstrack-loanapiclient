<?php
namespace App;

use Faker\Provider\DateTime;


class LoanApplication
{
    private $data = [];

    private function buildBody()
    {
        $applicationId = time();
        $dateOfBirth   = (new \DateTime($this->data['applicants'][0]['DateOfBirth']))->format('Y-m-d');

        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
                <LoanApplication>
                    <LoanApplicationType>Individual</LoanApplicationType>
                    <LoanPrimaryPurpose>{$this->data['LoanPurpose']}</LoanPrimaryPurpose>
                    <LoanAmount>{$this->data['LoanAmount']}</LoanAmount>
                    <LoanTermMonths>{$this->data['LoanTerm']}</LoanTermMonths>
                    <ApplicationId>$applicationId</ApplicationId>
                    <Applicants>
                        <Applicant type=\"Primary\">
                                <FirstName>{$this->data['applicants'][0]['FirstName']}</FirstName>
                                <LastName>{$this->data['applicants'][0]['LastName']}</LastName>
                                <SocialSecurityNumber>{$this->data['applicants'][0]['SocialSecurityNumber']}</SocialSecurityNumber>
                                <DateOfBirth>$dateOfBirth</DateOfBirth>
                                <EmailAddress>{$this->data['applicants'][0]['EmailAddress']}</EmailAddress>
                                <Residence ownership=\"{$this->data['applicants'][0]['HousingStatus']}\">
                                <Address>
                                    <AddressLine>{$this->data['applicants'][0]['AddressLine']}</AddressLine>
                                    <City>{$this->data['applicants'][0]['City']}</City>
                                    <State>{$this->data['applicants'][0]['State']}</State>
                                    <ZipCode>
                                        <FiveDigitZipCode>{$this->data['applicants'][0]['ZipCode']}</FiveDigitZipCode>
                                    </ZipCode>
                                </Address>
                            </Residence>
                        </Applicant>
                    </Applicants>
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
                // 'X-Lightstream-TestMode' => 'True',
            ))
            ->body($this->buildBody())
            ->expectsXml()
            ->send();

        $message = [
            'approved' => ($response->body->ApplicationPostStatus == 'Success'),
            'status'   => $response->body->ApplicationPostStatus,
            'link'     => $response->body->RedirectUrl,
            'message'  => $response->body->Stipulations->string,
        ];
        return $message;
    }
}