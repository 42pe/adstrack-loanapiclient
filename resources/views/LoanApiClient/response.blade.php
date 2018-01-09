
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
                            <li>Consectetur duis est nulla qui adipisicing. </li>
                            <li>Occaecat voluptate veniam minim ad. </li>
                            <li>Excepteur nulla esse cillum culpa officia ad qui id sunt Lorem ut Lorem tempor. </li>
                            <li>Reprehenderit ex ut sit ea qui exercitation. </li>
                            <li>Aliquip incididunt consectetur sit elit. </li>
                        </ul>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="#">
                            Apply Now
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                    </td>
                </tr>
                <tr>
                    <td class="text-center"><img src="img/lendkey.png"  style="height: 4em;  padding: 0.2 em;" /></td>
                    <td>
                        <ul>
                            <li>Occaecat voluptate veniam minim ad. </li>
                            <li>Consectetur duis est nulla qui adipisicing. </li>
                            <li>Aliquip incididunt consectetur sit elit. </li>
                            <li>Reprehenderit ex ut sit ea qui exercitation. </li>
                            <li>Excepteur nulla esse cillum culpa officia ad qui id sunt Lorem ut Lorem tempor. </li>
                        </ul>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="#">
                            Apply Now
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                    </td>
                </tr>
            </table>
    </div>
</div>
@endsection