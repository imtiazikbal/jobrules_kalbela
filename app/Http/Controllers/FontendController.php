<?php

namespace App\Http\Controllers;

use DateTime;
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
        // all category here



        // main featured news 1

       

        // Create a DateTime object from the date string
       
        // main fetured news skip 1 take 2
        $newsSkip1Take2 = News::latest()->skip(1)->take(2)->get();
        // Format the date
        $newsSkip3Take3 = News::latest()->skip(3)->take(3)->get();


        //Rajniti Category News
     
     
        return Inertia::render('Home');
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
