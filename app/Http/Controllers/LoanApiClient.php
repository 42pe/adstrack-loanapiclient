<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanApiClient extends Controller
{
    public function index()
    {
        $client = new \App\LoanApplication();
        $client->test();
    }
}
