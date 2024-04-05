<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Job;
use App\Models\News;
use Inertia\Inertia;
use App\Helper\Bengali;
use App\Models\Category;
use App\Models\Featured;
use Illuminate\Http\Request;

class FontendController extends Controller
{

    function index()
    {
        //date and time here
        date_default_timezone_set('Asia/Dhaka');
        $dateNew = date('j F Y, h:i A');
        $date = Bengali::bn_date_time($dateNew); // ১০ জানুয়ারি ২০২৫
        $gov_job = Job::where('job_position_id',"1")->latest()->limit(4)->get();
     
     
        return Inertia::render('Home',['gov_job' => $gov_job]);
     // return $newsOfBangladeshCategory;
    }

    function getNewsByCategory(Request $request, Category $category)
    {
        $news = News::where('category_id', $request->category_id)
            ->with('category')
            ->get();
        return Inertia::render('CategoryNews', ['news' => $news]);
    }

//News by title


    function getNewsByTitle(Request $request)
    {
  
        $news= News::where('id', $request->news)->with('category')->first();

        $categoryId = $news->category_id;
        $relatedNews = Category::where('id', $categoryId)->with('news', fn($q) => $q->where('status', 'published')->latest()->take(3))->first();

        // $relatedNews = News::where('category_id', $news->category_id)->with('category', 'division', 'district')->limit(3)->get();
        
     return Inertia::render('Details', ['news' => $news, 'relatedNews' => $relatedNews]);
     //return $relatedNews; 
       // return $news;
    }
    
}
