<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 public function tabelsurat()
{
    $pemohon = Pemohon::all();

    return view('components-content.dashboard', compact('pemohon'));
}
}
