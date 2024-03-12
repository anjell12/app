<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardContrOller extends Controller
{
    public function index(){
        return view('dashboard.index',[
            'title' => 'Dashboard'
        ]);
    }
}
