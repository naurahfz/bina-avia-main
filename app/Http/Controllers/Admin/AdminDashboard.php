<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDashboard extends Controller
{
    
    public function index(){
        return view('admin.dashboard',[
            "title" => "Admin Dashboard",
            "g_count" => Gallery::all()->count(),
            "n_count" => News::all()->count(),
            "t_count" => Testimonial::all()->count(),
            "u_count" => User::all()->count(),
        ]);
    }

}
