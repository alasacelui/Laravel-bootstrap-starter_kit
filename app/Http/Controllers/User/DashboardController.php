<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function __construct()
    {
        //DB::statement("SET SQL_MODE=''"); // set the strict to false
    }

    public function index()
    {
        // DB::statement("SET SQL_MODE=''"); // set the strict to false
        //$activities = Activity::latest()->take(5)->get();
        //$barangay_admins = User::where('role_id', 2)->get();

        return view('user.dashboard.index');
    }

}
