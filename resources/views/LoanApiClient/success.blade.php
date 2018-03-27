
@extends('layouts/app')

@section('content')
<script src="js/loanForm.js"></script>
<style>
#success {
    background-color:unset;
    color: inherit;
}
#success td strong {
    display: block;
    color: #00b4ff;
}

.table td {
    vertical-align: middle;
    text-align: center;
}

</style>
<div class="row  no-gutters">
    <div class="col-10 offset-1 p-3 myBlue" id="success">
            <h3>
                <div>Congratulations You May Qualify for Funds Today! † </div>
                <span class="step-subtitle">You’re pre-qualified to a receive a loan offer </span>
            </h3>

            <table class="table table-sm table-bordered">
                <?php foreach ($response['full']->Offers[0] as $offer) :?>
                    <tr>
                        <td><img src="img/logo-lightstream-suntrust.jpg" /></td>
                            <td>
                                <strong>Loan amount:</strong>
                                $<?=number_format((int)  $offer->LoanAmount, 2)?>
                            </td>
                            <td>
                                <strong>APR</strong>
                                <span><?=number_format((float) $offer->InterestRate, 2)?>%</span><br/>
                                <small>with AutoPay</small>
                            </td>
                            <td>
                                <strong>Term</strong>
                                <?=$offer->Term?> months
                            </td>
                            <td>
                                <strong>Monthly payment:</strong>
                                $<?=number_format((int)  $offer->MonthlyPayment, 2)?>
                            </td>
                        <td>
                            <a class="btn btn-primary" href="<?=$offer->OfferUrl?>">
                                Continue
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a><br/>
                            <small>On Lightstream's secure site</small>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <p><strong>You are not yet approved for a loan or specific rate. Please click the “Continue” button to complete your LightStream application to see exactly what LightStream can offer you.</strong></p>
            <p><strong>Your APR may differ based on loan purpose, amount, term, and your credit profile. Rate is quoted with AutoPay discount, which is only available when you select AutoPay prior to loan funding. Rates under the invoicing option are 0.50% higher. Subject to credit approval. Conditions and limitations apply. Advertised rates and terms are subject to change without notice. Not a commitment to lend.</strong></p>
            <p><strong>Payment example: Monthly payments for a $10,000 loan at 6.09% APR with a term of five years would result in 60 monthly payments of $193.75.</strong></p>
            <p><strong>† You can fund your loan today if today is a banking business day, your application is approved, and you complete the following steps by 2:30 p.m. Eastern time: (1) review and electronically sign your loan agreement; (2) provide us with your funding preferences and relevant banking information; and (3) complete the final verification process.</strong></p>
    </div>
</div>
<!-- Offer Conversion: Home Improvement Loan Guide *Exclusive* -->
<img src="https://adstrackmobile.go2cloud.org/aff_l?offer_id=1022" width="1" height="1" />
<!-- // End Offer Conversion --
@endsection