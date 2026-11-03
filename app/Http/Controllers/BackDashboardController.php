<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackDashboardController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard.view', );
    }
}