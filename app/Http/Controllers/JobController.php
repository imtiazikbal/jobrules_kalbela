<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\JobPosition;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('category','subcategory','job_position')->get();
       return Inertia::render('Job/Index',['jobs' => $jobs]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $job_position = JobPosition::all();
        $sub_category = SubCategory::where('status',true)->get();
        $category = Category::where('status',true)->get();
  
    return Inertia::render('Job/Create',['job_position' => $job_position, 'sub_category' => $sub_category, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     //dd($request->all());
        $img = $request->file('image');
        $t = time();
        $d= date('Y-m-d');
        $file_name = $img->getClientOriginalName();
        $img_name = "job_rules-{$d}-{$t}-{$file_name}";
        $img_url = "uploads/job/{$img_name}";
        // Upload File
        $img->move(public_path('uploads/job'), $img_name);

          Job::create([
            'title'=>$request->title,
            'des'=>$request->des,
            'image'=>$img_url,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'job_position_id'=>$request->job_position_id,
            'job_link'=>$request->job_link,
            'job_video'=>$request->video_link,
            'status'=>$request->status,
            'scroll'=>$request->scroll,
            'tag'=>json_encode($request->tag)
        ]);
        return redirect('/admin/jobs')->with('success', 'Jobs created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Job $job)
    {
        $jobs = Job::where('id',$request->jobs )->with('category','subcategory','job_position')->first();
        $sub_category = SubCategory::where('status',true)->get();
        $category = Category::where('status',true)->get();
       $job_position = JobPosition::all();

        return Inertia::render('Job/Edit',['jobs' => $jobs, 'job_position' => $job_position, 'sub_category' => $sub_category, 'category' => $category]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
       //dd($request->all());
       if($request->hasFile('image')){
        $img = $request->file('image');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "job-{$t}-{$file_name}";
        $img_url = "uploads/job/{$img_name}";
        // Upload File
        $img->move(public_path('uploads/job'), $img_name);
        $job->update([
            'title'=>$request->title,
            'des'=>$request->des,
            'image'=>$img_url,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'job_position_id'=>$request->job_position_id,
            'job_link'=>$request->job_link,
            'job_video'=>$request->video_link,
            'status'=>$request->status,
            'scroll'=>$request->scroll,
         
            'tag'=>json_encode($request->tag)
         
        ]);
        return redirect('/admin/jobs')->with('success', 'Jobs Updated successfully');
    }else{
        $job->update([
            'title'=>$request->title,
            'des'=>$request->des,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'job_position_id'=>$request->job_position_id,
            'job_link'=>$request->job_link,
            'job_video'=>$request->video_link,
            'status'=>$request->status,
            'scroll'=>$request->scroll,
            'image'=>$job->image,
            'tag'=>json_encode($request->tag)
        ]);
        return redirect('/admin/jobs')->with('success', 'Jobs Updated successfully');

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Job $job)
    {
       File::delete($job->image);
       Job::where('id',$request->jobs)->delete();
        return redirect('/admin/jobs')->with('success', 'Jobs Deleted successfully');
    }

    function jobTypeApi(Request $request){

        $jobs = Job::where('job_position_id', $request->type)->get();
        return $jobs;
    }
}
