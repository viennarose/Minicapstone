<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalAppointments = Appointment::count();
        $totalUsers = User::count();
        return view('admin.index', compact('totalServices', 'totalAppointments', 'totalUsers'));
    }
}
