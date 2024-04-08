<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\News;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        if(auth()->user()->role ==='user'){
            return view('welcome');
        }else{
            $jobsCount = News::where('status','published')->count();
            return view('dashboard',compact('jobsCount'));
        }
       
    }

    function dashboard(Request $request){

        $tJobs = Job::where('status',true)->count();
        $tCategory = Category::where('status',true)->count();
        $tSubCategory = SubCategory::where('status',true)->count();
        return Inertia::render('Dashboard',['tJobs' => $tJobs,'tCategory' => $tCategory,'tSubCategory' => $tSubCategory]);
        
    }
}
