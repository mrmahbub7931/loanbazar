<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Writer;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function PostIndex()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function PostCreate()
    {
        $categories = Category::all();
        $writers = Writer::all();
        return view('admin.posts.create', compact('categories','writers'));
    }

    public function PostStore(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'status' => 'required'
        ]);

        $post = new Post();
        $post->user_id = Auth::user()->id;
        // Featured image
        $featured_image = $request->file('featured_img');
        if (isset($featured_image)) {
            $currentDate = Carbon::now()->toDateString();
                $postfeatreudimage = $currentDate.uniqid().'.'.$featured_image->getClientOriginalExtension();
    
                if (!Storage::disk('public')->exists('frontend/assets/img/blog/featured')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/blog/featured');
                }
                // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                Storage::disk('public')->putFileAs('frontend/assets/img/blog/featured/',$featured_image,$postfeatreudimage);
                $post->featured_img = $postfeatreudimage;
        }
        // Cover image
        $cover_img = $request->file('cover_img');
        if (isset($cover_img)) {
            $currentDate = Carbon::now()->toDateString();
                $postcoverimagename = $currentDate.uniqid().'.'.$cover_img->getClientOriginalExtension();
    
                if (!Storage::disk('public')->exists('frontend/assets/img/blog/cover')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/blog/cover');
                }
                // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                Storage::disk('public')->putFileAs('frontend/assets/img/blog/cover/',$cover_img,$postcoverimagename);
                $post->cover_img = $postcoverimagename;
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = $request->status;
        }
        $post->writer_id = $request->writer_id;
        $post->save();

        $post->categories()->attach($request->get('categories'));
        return redirect()->route('admin.posts.index');
    }

    public function PostEdit($id)
    {
        $post = Post::findOrfail($id);
        $categories = Category::all();
        $writers = Writer::all();
        return view('admin.posts.edit', compact('post','categories','writers'));
    }

    public function PostUpdate(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $post = Post::findOrfail($id);
        $post->user_id = Auth::user()->id;
        // Featured image
        $featured_img = $request->file('featured_img');
        $featured_old_img = $post->featured_img;
        if (isset($featured_img)) {
            $currentDate = Carbon::now()->toDateString();
                $postfeatreudimage = $currentDate.uniqid().'.'.$featured_img->getClientOriginalExtension();
    
                if (!Storage::disk('public')->exists('frontend/assets/img/blog/featured')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/blog/featured');
                }
                
                if (Storage::disk('public')->exists('frontend/assets/img/blog/featured/'.$featured_old_img)) {
                    Storage::disk('public')->delete('frontend/assets/img/blog/featured/'.$featured_old_img);
                }

                Storage::disk('public')->putFileAs('frontend/assets/img/blog/featured/',$featured_img,$postfeatreudimage);
                $post->featured_img = $postfeatreudimage;
        }
        // Cover image
        $cover_img = $request->file('cover_img');
        $cover_old_image = $post->cover_img;
        if (isset($cover_img)) {
            $currentDate = Carbon::now()->toDateString();
                $postcoverimagename = $currentDate.uniqid().'.'.$cover_img->getClientOriginalExtension();
    
                if (!Storage::disk('public')->exists('frontend/assets/img/blog/cover')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/blog/cover');
                }
                
                if (Storage::disk('public')->exists('frontend/assets/img/blog/cover/'.$cover_old_image)) {
                    Storage::disk('public')->delete('frontend/assets/img/blog/cover/'.$cover_old_image);
                }

                Storage::disk('public')->putFileAs('frontend/assets/img/blog/cover/',$cover_img,$postcoverimagename);
                $post->cover_img = $postcoverimagename;
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = $request->status;
        }else {
            $post->status = false;
        }
        $post->writer_id = $request->writer_id;
        $post->save();

        $post->categories()->sync($request->get('categories'));
        return redirect()->route('admin.posts.index');
    }

    public function PostDelete($id)
    {
        $post = Post::findOrfail($id);
        $featured_img = $post->featured_img;
        if (Storage::disk('public')->exists('frontend/assets/img/blog/featured/'.$featured_img)) {
            Storage::disk('public')->delete('frontend/assets/img/blog/featured/'.$featured_img);
        }
        
        $cover_img = $post->cover_img;
        if (Storage::disk('public')->exists('frontend/assets/img/blog/cover/'.$cover_img)) {
            Storage::disk('public')->delete('frontend/assets/img/blog/cover/'.$cover_img);
        }

        $post->categories()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
