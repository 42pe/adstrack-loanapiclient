
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
}

</style>
<div class="row  no-gutters">
    <div class="col-10 offset-1 p-3 myBlue" id="success">
            <h3>Congratulations May You Qualify with These Top Lenders!</h3>

            <table class="table table-sm table-bordered">
                <tr>
                    <td class="text-center"><img src="img/lending tree.png" style="height: 4em; padding: 0.2 em;" /></td>
                    <td>
                        <ul>
                            <li>Largest national network of lenders</li>
                            <li>Compare live rates</li>
                            <li>Get a Home Equity Loan</li>
                        </ul>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="https://offers.lendingtree.com/tla.aspx?tid=h2&loan-type=HOMEEQUITY#/step/2/">
                            Apply Now
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                    </td>
                </tr>
                <tr>
                    <td class="text-center"><img src="img/lendkey.png"  style="height: 4em;  padding: 0.2 em;" /></td>
                    <td>
                        <ul>
                            <li>Takes less than 2 Min to get results</li>
                            <li>Lowest rates available to qualifying applicants</li>
                            <li>Connect with contractors in your area</li>
                        </ul>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="https://homeimprovement.lendkey.com/loans/new?">
                            Apply Now
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                    </td>
                </tr>
                <tr>
                    <td class="text-center"><img src="img/avant.png"  style="height: 4em;  padding: 0.2 em;" /></td>
                    <td>
                        <ul>
                            <li>One step process to apply</li>
                            <li>Flexible payment plans</li>
                            <li>Borrow up to $35,000</li>
                        </ul>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="https://www.avant.com/apply/94809222#!/personal">
                            Apply Now
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                    </td>
                </tr>
            </table>
    </div>
</div>
@endsection