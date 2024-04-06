<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Job;
use App\Models\News;
use Inertia\Inertia;
use App\Helper\Bengali;
use App\Models\Category;
use App\Models\Featured;
use App\Models\JobPosition;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FontendController extends Controller
{

    function index()
    {
        //date and time here
        date_default_timezone_set('Asia/Dhaka');
        $dateNew = date('j F Y, h:i A');
        $date = Bengali::bn_date_time($dateNew); // ১০ জানুয়ারি ২০২৫
        $gov_job = Job::where('job_position_id',"1")->orWhere('job_position_id',"2")->latest()->limit(4)->get();
        $gov_non_gov_law = Job::where('job_position_id',"3")->latest()->limit(4)->get();
        $land_law = Job::where('job_position_id',"4")->latest()->limit(4)->get();
        $pc_tips = Job::where('job_position_id',"5")->latest()->limit(4)->get();
     
        return Inertia::render('Home',['gov_job' => $gov_job, 'gov_non_gov_law' => $gov_non_gov_law, 'land_law' => $land_law, 'pc_tips' => $pc_tips]);
     // return $gov_non_gov_law;
    }



    //jobs by title 

    function getJobsByTitle(Request $request){
       
        $jobsContent= Job::where('id', $request->job)->with('category','job_position')->first();
        $dateString = $jobsContent->created_at;

        // Create a DateTime object from the date string
        $date = new DateTime($dateString);

        // Format the date
        $formattedDate = $date->format('j F Y, h:i A');
        $jobs = [
            'id' => $jobsContent->id,
            'title' => $jobsContent->title,
            'des' => $jobsContent->des,
            'image' => $jobsContent->image,
            'category_name' => $jobsContent->category->cName,
            'apply_link' => $jobsContent->job_link,
            'created_at' => Bengali::bn_date_time($formattedDate),
        ];
        return Inertia::render('Details', ['jobs' => $jobs]);
        //return $jobs;
    }










    function getJobsByCategory(Request $request, Job $job)
    {

        $jobs = Job::where('category_id', $request->category)
            ->with('category')
            ->get();
            $catName = Category::where('id', $request->category)->first();
        return Inertia::render('CategoryJobs', ['jobs' => $jobs, 'catName' => $catName]);
       // return $catName;
    }

   function getJobsBySubCategory(Request $request, Job $job)
    {

        $jobs = Job::where('sub_category_id', $request->subcategory)
           
            ->get();
            $subName = SubCategory::where('id', $request->subcategory)->first();

        return Inertia::render('SubCategoryJobs', ['jobs' => $jobs, 'subName' => $subName]);
      // return $jobs;
    }


//job yype

function getJobsByType(Request $request, Job $job){

    $jobs = Job::where('job_position_id', $request->type)->get();
    $catName = JobPosition::where('id', $request->type)->first();

    return Inertia::render('CategoryJobs', ['jobs' => $jobs, 'catName' => $catName]);
   // return $catName;
   
}
//News by title


    // function getNewsByTitle(Request $request)
    // {
  
    //     $news= News::where('id', $request->news)->with('category')->first();

    //     $categoryId = $news->category_id;
    //     $relatedNews = Category::where('id', $categoryId)->with('news', fn($q) => $q->where('status', 'published')->latest()->take(3))->first();

    //     // $relatedNews = News::where('category_id', $news->category_id)->with('category', 'division', 'district')->limit(3)->get();
        
    //  return Inertia::render('Details', ['news' => $news, 'relatedNews' => $relatedNews]);
    //  //return $relatedNews; 
    //    // return $news;
    // }
    
}
