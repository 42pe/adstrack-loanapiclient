
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
                <span class="step-subtitle">Your loan was preapproved</span>
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
                                <strong>Interest Rate</strong>
                                <?=number_format((float) $offer->InterestRate, 2)?>%
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
                                </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <p>
                <strong>
                    † You can fund your loan today if today is a banking business day, your application is approved,
                    and you complete the following steps by 2:30 p.m. Eastern time: (1) review and electronically
                    sign your loan agreement; (2) provide us with your funding preferences and relevant banking
                    information; and (3) complete the final verification process.
                </strong>
            </p>
    </div>
    <!--end blue-->
</div>
@endsection