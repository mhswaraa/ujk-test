<?php
// app\Http\Controllers\DashboardController.php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers   = Customer::count();
        $totalPackages    = Package::count();
        $activeCustomers  = Customer::whereNotNull('package_id')->count();

        $recentActivities = Customer::latest()
            ->take(5)
            ->get()
            ->map(fn($cust) => (object)[
                'description' => "Pelanggan “{$cust->name}” dibuat",
                'created_at'  => $cust->created_at,
            ]);

        return view('dashboard', compact(
            'totalCustomers',
            'totalPackages',
            'activeCustomers',
            'recentActivities'
        ));
    }
}
