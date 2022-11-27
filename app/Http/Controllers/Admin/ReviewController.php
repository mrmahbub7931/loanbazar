<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Create Circular post method
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store data method
     */

     public function store(Request $request)
     {
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'designation' => 'required',
            'avatar'  =>  'required|mimes:jpeg,png,jpg,gif'
        ]);

        $review = new Review();
        $avatar_image = $request->file('avatar');
        if (isset($avatar_image)) {
            $currentDate = Carbon::now()->toDateString();
                $avatarimagename = $currentDate.uniqid().'.'.$avatar_image->getClientOriginalExtension();
    
                if (!Storage::disk('public')->exists('frontend/assets/img/reviews')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/reviews');
                }
                Storage::disk('public')->putFileAs('frontend/assets/img/reviews/',$avatar_image,$avatarimagename);
            $review->avatar = $avatarimagename;
        }
        $review->user_id = Auth::user()->id;
        $review->name = $request->name;
        $review->company_name = $request->company_name;
        $review->designation = $request->designation;
        $review->body = $request->body;
        $review->save();

        return redirect()->route('admin.reviews.index');
     }

     /**
      * Edit method
      * @param $id
      */
     public function edit($id)
     {
        $review = Review::findOrfail($id);
        return view('admin.reviews.edit', compact('review'));
     }

     /**
      * Update circular data method 
      * @param $id 
      */
    public function update(Request $request, $id)
    {
        $review = Review::findOrfail($id);
        $old_image = $review->avatar;
        $avatar_image = $request->file('avatar');
        if (isset($avatar_image)) {
            $currentDate = Carbon::now()->toDateString();
                $avatarimagename = $currentDate.uniqid().'.'.$avatar_image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('frontend/assets/img/reviews')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/reviews');
                }

                if (!Storage::disk('public')->exists('frontend/assets/img/reviews/'.$old_image)) {
                    Storage::disk('public')->delete('frontend/assets/img/reviews/'.$old_image);
                }

                Storage::disk('public')->putFileAs('frontend/assets/img/reviews/',$avatar_image,$avatarimagename);
            $review->avatar = $avatarimagename;
        }
        $review->user_id = Auth::user()->id;
        $review->name = $request->name;
        $review->company_name = $request->company_name;
        $review->designation = $request->designation;
        $review->body = $request->body;
        $review->update();

        return redirect()->route('admin.reviews.index');
    }

    /**
     * Delete circular post method 
     * @param $id 
     */
    public function delete($id)
    {
        $review = Review::findOrfail($id);
        $old_image = $review->avatar;
        if (Storage::disk('public')->exists('frontend/assets/img/reviews/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/reviews/'.$old_image);
        }
        $review->delete();
        return redirect()->back();
    }
}
