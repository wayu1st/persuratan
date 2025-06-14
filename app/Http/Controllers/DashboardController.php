<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\TblUser;
use App\Http\Models\JenisSurat;

class DashboardController extends Controller
{
    public function index(){
        //
        // echo "halaman index"
        
        return view('dashboard.index');


    }
}
