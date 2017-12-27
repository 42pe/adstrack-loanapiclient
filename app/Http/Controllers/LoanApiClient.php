<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanApiClient extends Controller
{
    public function index()
    {
        return view('LoanApiClient/index');
    }

    public function post()
    {
        $client   = new \App\LoanApplication($_POST['data']);
        $response = $client->send();
        return view('LoanApiClient/response')->with(compact('response'));
    }
}
