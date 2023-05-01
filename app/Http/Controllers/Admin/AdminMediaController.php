<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdminMediaController extends Controller
{
    public function index()
    {
        Gate::authorize('app.media.index');
        $medias = Media::all();
        return view('admin.media.index',compact('medias'));
    }

    public function create()
    {
        Gate::authorize('app.media.create');
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.media.create');
        $request->validate( [
            'file' => 'required|mimes:jpeg,png,jpg,gif'
        ] );
        $media = new Media();
        $media_file = $request->file('file');
        if (isset($media_file)) {
            $currentDate = Carbon::now()->toDateString();
                $mediafilename = $currentDate.uniqid().'.'.$media_file->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('frontend/assets/img/media')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/media');
                }
                // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                Storage::disk('public')->putFileAs('frontend/assets/img/media/',$media_file,$mediafilename);

            $media->user_id = Auth::user()->id;
            $media->file = $mediafilename;
            $media->save();
        }

        return redirect()->route('admin.media.index');
    }

    public function destroy($id)
    {
        Gate::authorize('app.media.destroy');
        $media = Media::findOrFail($id);
        $old_image = $media->file;
        if (Storage::disk('public')->exists('frontend/assets/img/media/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/media/'.$old_image);
        }
        $media->delete();
        return redirect()->back();
    }
}
