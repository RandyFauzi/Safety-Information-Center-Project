<?php

namespace App\Http\Controllers\SOPIK;

use App\Http\Controllers\Controller;

class DashboardSOPIKController extends Controller
{
    public function tampilkanHalamanDashboard()
    {
        return view('sop-ik.dashboard-sop-dan-instruksi-kerja');
    }
}