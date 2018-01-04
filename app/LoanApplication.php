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
                    <LoanPrimaryPurpose>HomeImprovement</LoanPrimaryPurpose>
                    <LoanAmount>{$this->data['LoanAmount']}</LoanAmount>
                    <LoanTermMonths>48</LoanTermMonths>
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
                            <Occupation type=\"{$this->data['employment'][0]['WorkStatus']}\">
                                <GrossAnnualIncome>{$this->data['employment'][0]['GrossAnnualIncome']}</GrossAnnualIncome>
                            </Occupation>
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

        /*
        libxml_use_internal_errors(true);
        $response = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
        <ApplicationPostProcessingResults xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
          <ApplicationPostStatus>Success</ApplicationPostStatus>
          <RedirectUrl>https://test.lightstream.com/customer-sign-in?UID=xM3zyWTFJ5jBAwv5vQjVa80YajK3cJY4tAHYBJi9v4djeP5%2fv%2ffjY7hVZUK2eS1pDAAAYCBGJtCwIXzLj67rvw%3d%3d</RedirectUrl>
          <ApplicationId>11148646</ApplicationId>
          <ExpirationDate>2018-01-07T18:53:44.9570763</ExpirationDate>
          <RequestedLoanPrimaryPurpose>HomeImprovement</RequestedLoanPrimaryPurpose>
          <RequestedLoanPrimaryPurposeDescriptionIfOther />
          <RequestedLoanAmount>5000</RequestedLoanAmount>
          <RequestedLoanTermMonths>48</RequestedLoanTermMonths>
          <ProjectedInterestRate>7.79000</ProjectedInterestRate>
          <ProjectedMonthlyPayment>121.57</ProjectedMonthlyPayment>
          <Stipulations />
          <Offers>
            <Offer>
              <Recipient>AdsTrack</Recipient>
              <PartnerApplicationId>11148646</PartnerApplicationId>
              <LoanAmount>5000</LoanAmount>
              <LoanPurpose>HomeImprovement</LoanPurpose>
              <InterestRate>7.04000</InterestRate>
              <Term>36</Term>
              <OfferText />
              <PaymentType>AutoPay</PaymentType>
              <MonthlyPayment>154.48</MonthlyPayment>
              <OfferUrl>https://test.lightstream.com/customer-sign-in?UID=xM3zyWTFJ5jBAwv5vQjVa80YajK3cJY4tAHYBJi9v4djeP5%2fv%2ffjY7hVZUK2eS1pDAAAYCBGJtCwIXzLj67rvw%3d%3d&amp;PurposeOfLoan=HomeImprovement&amp;LoanTermMonths=36&amp;LoanAmount=5000</OfferUrl>
            </Offer>
            <Offer>
              <Recipient>AdsTrack</Recipient>
              <PartnerApplicationId>11148646</PartnerApplicationId>
              <LoanAmount>5000</LoanAmount>
              <LoanPurpose>HomeImprovement</LoanPurpose>
              <InterestRate>8.29000</InterestRate>
              <Term>60</Term>
              <OfferText />
              <PaymentType>AutoPay</PaymentType>
              <MonthlyPayment>102.08</MonthlyPayment>
              <OfferUrl>https://test.lightstream.com/customer-sign-in?UID=xM3zyWTFJ5jBAwv5vQjVa80YajK3cJY4tAHYBJi9v4djeP5%2fv%2ffjY7hVZUK2eS1pDAAAYCBGJtCwIXzLj67rvw%3d%3d&amp;PurposeOfLoan=HomeImprovement&amp;LoanTermMonths=60&amp;LoanAmount=5000</OfferUrl>
            </Offer>
          </Offers>
        </ApplicationPostProcessingResults>');

        $x = new \stdClass();
        $x->body = $response;
        $response = $x;
        */

        $apiCall  = new \App\ApiCall();
        $apiCall->request  = $this->buildBody();
        $apiCall->response = $response->__toString();
        $apiCall->saveOrFail();

        $message = [
            'approved' => ($response->body->ApplicationPostStatus == 'Success'),
            'status'   => $response->body->ApplicationPostStatus,
            'link'     => $response->body->RedirectUrl,
            'message'  => $response->body->Stipulations->string,
            'full'     => $response->body,
        ];
        return $message;
    }
}