<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Writer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class WriterCotroller extends Controller
{
    public function index()
    {
        Gate::authorize('app.writers.index');
        $writers = Writer::latest()->get();
        return view('admin.writer.index',compact('writers'));
    }

    public function create()
    {
        Gate::authorize('app.writers.create');
        return view('admin.writer.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.writers.create');
        $request->validate([
            'writer_name' => 'required|max:255',
        ]);

        $writer = new Writer();
        $writer_image = $request->file('writer_image');
        if (isset($writer_image)) {
            $currentDate = Carbon::now()->toDateString();
                $writerimagename = $currentDate.uniqid().'.'.$writer_image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('frontend/assets/img/writers')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/writers');
                }
                // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                Storage::disk('public')->putFileAs('frontend/assets/img/writers/',$writer_image,$writerimagename);
                $writer->writer_image = $writerimagename;
        }

        $writer->writer_name = $request->writer_name;
        $writer->writer_bio = $request->writer_bio;
        $writer->save();
        return redirect()->route('admin.writers.index');
    }

    public function edit(Request $request,$id)
    {
        Gate::authorize('app.writers.edit');
        $writer = Writer::findOrfail($id);
        return view('admin.writer.edit',compact('writer'));
    }

    public function update(Request $request, $id)
    {
        Gate::authorize('app.writers.edit');
        $writer = Writer::findOrfail($id);
        $writer_image = $request->file('writer_image');
        $old_image = $writer->writer_image;
        if (isset($writer_image)) {
            $currentDate = Carbon::now()->toDateString();
                $writerimagename = $currentDate.uniqid().'.'.$writer_image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('frontend/assets/img/writers')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/writers');
                }

                if (Storage::disk('public')->exists('frontend/assets/img/writers/'.$old_image)) {
                    Storage::disk('public')->delete('frontend/assets/img/writers/'.$old_image);
                }

                Storage::disk('public')->putFileAs('frontend/assets/img/writers/',$writer_image,$writerimagename);

                $writer->writer_image = $writerimagename;
        }
        $writer->writer_name = $request->writer_name;
        $writer->writer_bio = $request->writer_bio;
        $writer->update();
        return redirect()->route('admin.writers.index');
    }

    public function delete($id)
    {
        Gate::authorize('app.writers.destroy');
        Writer::findOrfail($id)->delete();
        return redirect()->back();
    }
}
