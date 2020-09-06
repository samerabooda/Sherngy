<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardcontroller extends Controller
{
    public function __construct()
    {
//        return $this->middleware(['role:super_admin']);
    }
    public function index(){
        return view('dashboard.index');
    }
}
