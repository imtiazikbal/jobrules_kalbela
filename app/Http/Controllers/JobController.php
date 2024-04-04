<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Inertia::render('Job/Index');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $sub_category = SubCategory::where('status',true)->get();
  
    return Inertia::render('Job/Create',['category' => $category, 'sub_category' => $sub_category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $img = $request->file('image');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "job-{$t}-{$file_name}";
        $img_url = "uploads/job/{$img_name}";
        // Upload File
        $img->move(public_path('uploads/job'), $img_name);

          Job::create([
            'title'=>$request->title,
            'des'=>$request->nBody,
            'image'=>$img_url,
           
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'job_position_id'=>$request->job_position_id,
            'job_link'=>$request->job_link,
            'job_video'=>$request->video_link,
            'status'=>$request->status,
            'scroll'=>$request->scroll
        ]);
        return redirect('/admin/news')->with('success', 'News created successfully');
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
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
