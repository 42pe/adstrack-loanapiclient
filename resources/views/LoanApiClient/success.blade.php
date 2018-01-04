
@extends('layouts/app')

@section('content')
<script src="js/loanForm.js"></script>

<div class="row  no-gutters myBg " style="background-image:url('img/same-day-loan.jpg');">
    <div class="col-lg-6 offset-lg-6 p-3 myBlue" id="bottom-2">
            <h5>
                <div>Success</div>
                <span class="step-subtitle">Your loan was preapproved</span>
            </h5>
            <p>Please follow the link to complete your application</p>
            <div class="row">
                <?php foreach ($response['full']->Offers[0] as $offer) :?>
                    <div class="col">
                        <ul>
                            <li><strong>Loan amount:</strong>    $<?=number_format((int)  $offer->LoanAmount, 2)?></li>
                            <li><strong>Interest Rate</strong>    <?=number_format((float) $offer->InterestRate, 2)?>%</li>
                            <li><strong>Term</strong>             <?=$offer->Term?> months</li>
                            <li><strong>Monthly payment:</strong> $<?=number_format((int)  $offer->MonthlyPayment, 2)?></li>
                        </li>
                        <hr />
                        <a class="btn btn-primary" href="<?=$offer->OfferUrl?>">Apply now!</a>
                    </div>
                <?php endforeach; ?>
            </div>

    </div>
    <!--end blue-->
</div>
@endsection