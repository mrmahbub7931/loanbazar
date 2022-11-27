<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display page index 
     */
    public function PageIndex()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }
    /**
     * Display page create form 
     */
    public function PageCreate()
    {
        return view('admin.pages.create');
    }

    /**
     * Store Page data
     */
    public function PageStore(Request $request)
    {
        $request->validate( [
            'title' => 'required|max:255',
            'status' => 'required',
            'cover_img' => 'mimes:jpeg,png,jpg,gif'
        ] );

        $page = new Page();
        $cover_img = $request->file('cover_img');
        if (isset($cover_img)) {
            $currentDate = Carbon::now()->toDateString();
            $coverimagename = $currentDate.uniqid().'.'.$cover_img->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/pages')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/pages');
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/pages/',$cover_img,$coverimagename);
            $page->cover_img = $coverimagename;
        }
        $page->title = $request->title;
        $page->url = Str::slug($request->title);
        $page->body = $request->body;
        $page->meta_title = $request->meta_title;
        $page->meta_desc = $request->meta_desc;
        $page->status = $request->status;
        $page->save();

        return redirect()->route('admin.page.index');
    }

    public function PageEdit($id)
    {
        $page = Page::findOrfail($id);
        return view('admin.pages.edit',compact('page'));
    }

    /**
     * Update page data 
     * @param $id
     */
    public function PageUpdate(Request $request, $id)
    {
        $page = Page::findOrfail($id);
        $cover_img = $request->file('cover_img');
        $old_image = $page->cover_img;
        if (isset($cover_img)) {
            $currentDate = Carbon::now()->toDateString();
                $coverimagename = $currentDate.uniqid().'.'.$cover_img->getClientOriginalExtension();
    
                if (!Storage::disk('public')->exists('frontend/assets/img/pages')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/pages');
                }
                
                if (Storage::disk('public')->exists('frontend/assets/img/pages/'.$old_image)) {
                    Storage::disk('public')->delete('frontend/assets/img/pages/'.$old_image);
                }

                Storage::disk('public')->putFileAs('frontend/assets/img/pages/',$cover_img,$coverimagename);

                $page->cover_img = $coverimagename;
        }
        $page->title = $request->title;
        $page->url = Str::slug($request->title);
        $page->body = $request->body;
        $page->meta_title = $request->meta_title;
        $page->meta_desc = $request->meta_desc;
        $page->status = $request->status;
        $page->update();

        return redirect()->route('admin.page.index');
    }

    public function PageDelete($id)
    {
        $page = Page::findOrfail($id);
        $old_image = $page->cover_img;
        if (Storage::disk('public')->exists('frontend/assets/img/pages/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/pages/'.$old_image);
        }
        $page->delete();
        return redirect()->back();
    }
}
