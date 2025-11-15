<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Usaha;
use App\Models\Artikel;
use App\Models\Subsektor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $totalUser = User::count();
        $totalUsaha = Usaha::count();
        $totalArtikel = Artikel::count();
        $totalSubsekror = Subsektor::count();

        return view('admin.dashboard', compact('totalUser', 'totalUsaha', 'totalArtikel', 'totalSubsekror'));
    }
}
