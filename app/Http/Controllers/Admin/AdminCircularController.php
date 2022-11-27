<?php

namespace App\Http\Controllers\Admin;

use App\Models\Circular;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminCircularController extends Controller
{
    /**
     * Show Circular Index page method
     */
    public function index()
    {
        $circulars = Circular::all();
        return view('admin.circulars.index',compact('circulars'));
    }

    /**
     * Create Circular post method
     */
    public function create()
    {
        return view('admin.circulars.create');
    }

    /**
     * Store data method
     */

     public function store(Request $request)
     {
        $request->validate([
            'job_title' => 'required',
            'status' => 'required',
        ]);

        $circular = new Circular();
        $circular->user_id = Auth::user()->id;
        $circular->job_title = $request->job_title;
        $circular->slug = Str::slug($request->job_title);
        $circular->job_location = $request->job_location;
        $circular->job_description = $request->job_description;
        $circular->status = $request->status;
        $circular->save();

        return redirect()->route('admin.circular.index');
     }

     /**
      * Edit method
      * @param $id
      */
     public function edit($id)
     {
        $circular = Circular::findOrfail($id);
        return view('admin.circulars.edit', compact('circular'));
     }

     /**
      * Update circular data method 
      * @param $id 
      */
    public function update(Request $request, $id)
    {
        $circular = Circular::findOrfail($id);
        $circular->job_title = $request->job_title;
        $circular->slug = Str::slug($request->job_title);
        $circular->job_location = $request->job_location;
        $circular->job_description = $request->job_description;
        $circular->status = $request->status;
        $circular->update();
        return redirect()->route('admin.circular.index');
    }

    /**
     * Delete circular post method 
     * @param $id 
     */
    public function delete($id)
    {
        Circular::findOrfail($id)->delete();
        return redirect()->back();
    }
}
