
@extends('layouts/app')

@section('content')
<script src="js/loanForm.js"></script>

<div class="row  no-gutters myBg " style="background-image:url('img/same-day-loan.jpg');">
    <div class="col-lg-6 offset-lg-6 p-3 myBlue" id="bottom-2">
        <?php if ($response['approved']) :?>
            <h5>
                <div>Success</div>
                <span class="step-subtitle">Your loan was preapproved</span>
            </h5>
            <p>Please follow the link to complete your application</p>
            <a class="btn btn-primary" href="<?=$response['link']?>">complete application</a>
        <?php else :?>
            <h5>
                <div>We are sorry.</div>
                <span class="step-subtitle"><?=$response['message']?></span>
            </h5>
            <p>You're request was denied with the following message:</p>
            <p>
                <strong><?=$response['status']?></strong>
                <?=$response['message']?>
            </p>
        <?php endif ?>
    </div>
    <!--end blue-->
</div>
@endsection