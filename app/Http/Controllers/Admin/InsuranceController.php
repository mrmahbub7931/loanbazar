<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Insurance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\InsurancePost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class InsuranceController extends Controller
{
    public function index()
    {
        Gate::authorize('app.insurances.index');
        $insurances = Insurance::all();
        return view('admin.insurance.index', compact('insurances'));
    }

    public function create()
    {
        Gate::authorize('app.insurances.create');
        return view('admin.insurance.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.insurances.create');
        $request->validate([
            'title' => 'required|max:255',
            'status' => 'required',
            'header_image' => 'mimes:jpeg,png,jpg,gif'
        ]);

        $header_image = $request->file('header_image');
        if (isset($header_image)) {
            $currentDate = Carbon::now()->toDateString();
                $headerimagename = $currentDate.uniqid().'.'.$header_image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('frontend/assets/img/insurances')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/insurances');
                }
                // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                Storage::disk('public')->putFileAs('frontend/assets/img/insurances/',$header_image,$headerimagename);
                $data = [
                    'title' => $request->title,
                    'url' => Str::slug($request->title),
                    'description'   => $request->description,
                    'header_image' => $headerimagename,
                    'status'    => $request->status,
                ];
                Insurance::create($data);
        }else {
            $data = [
                'title' => $request->title,
                'url' => Str::slug($request->title),
                'description'   => $request->description,
                'status'    => $request->status,
            ];
            Insurance::create($data);
        }

        return redirect()->route('admin.insurance.index');

    }

    public function edit($id)
    {
        Gate::authorize('app.insurances.edit');
        $insurance = Insurance::findOrFail($id);
        return view('admin.insurance.edit',compact('insurance'));
    }

    public function update(Request $request, $id)
    {
        Gate::authorize('app.insurances.edit');
        $insurance = Insurance::findOrfail($id);
        $header_image = $request->file('header_image');
        $old_image = $insurance->header_image;
        if (isset($header_image)) {
            $currentDate = Carbon::now()->toDateString();
                $headerimagename = $currentDate.uniqid().'.'.$header_image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('frontend/assets/img/insurances')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/insurances');
                }

                if (Storage::disk('public')->exists('frontend/assets/img/insurances/'.$old_image)) {
                    Storage::disk('public')->delete('frontend/assets/img/insurances/'.$old_image);
                }

                Storage::disk('public')->putFileAs('frontend/assets/img/insurances/',$header_image,$headerimagename);

                $insurance->header_image = $headerimagename;

                $data = [
                    'title' => $request->title,
                    'url' => Str::slug($request->title),
                    'description'   => $request->description,
                    'header_image' => $headerimagename,
                    'status'    => $request->status,
                ];
                Insurance::where('id',$id)->update($data);
        }else{
            $data = [
                'title' => $request->title,
                'url' => Str::slug($request->title),
                'description'   => $request->description,
                'status'    => $request->status,
            ];
            Insurance::where('id',$id)->update($data);
        }
        return redirect()->route('admin.insurance.index');
    }

    public function destroy($id)
    {
        Gate::authorize('app.insurances.destroy');
        $insurance = Insurance::findOrFail($id)->delete();
        return redirect()->back();
    }

    // Insurance posts
    public function InsurancePostIndex()
    {
        Gate::authorize('app.insurances.posts.index');
        $insurancePosts = InsurancePost::all();
        return view('admin.insurance.posts.index',compact('insurancePosts'));
    }

    public function InsurancePostCreate()
    {
        Gate::authorize('app.insurances.posts.create');
        $insurances = Insurance::all();
        return view('admin.insurance.posts.create',compact('insurances'));
    }

    public function InsurancePostStore(Request $request)
    {
        Gate::authorize('app.insurances.posts.create');

        $request->validate([
            'title' => 'required|max:255',
            'status' => 'required',
            'featured_image' => 'mimes:jpeg,png,jpg,gif'
        ]);
        $insurance = new InsurancePost();
        $featured_image = $request->file('featured_image');
        $pdf_file = $request->file('pdf_file');
        if(isset($featured_image)){
            $currentDate = Carbon::now()->toDateString();
            $featuredimagename = $currentDate.uniqid().'.'.$featured_image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('frontend/assets/img/insurances/posts')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/insurances/posts');
            }

            Storage::disk('public')->putFileAs('frontend/assets/img/insurances/posts',$featured_image,$featuredimagename);

            $insurance->featured_image = $featuredimagename;
        }
        if (isset($pdf_file)) {
            $currentDate = Carbon::now()->toDateString();
            $pdffilename = $currentDate.uniqid().'.'.$pdf_file->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('frontend/assets/files/insurances/posts/pdf')) {
                Storage::disk('public')->makeDirectory('frontend/assets/files/insurances/posts/pdf');
            }

            Storage::disk('public')->putFileAs('frontend/assets/files/insurances/posts/pdf',$pdf_file,$pdffilename);

            $insurance->pdf_file = $pdffilename;
        }

        $insurance->insurance_id = $request->insurance_id;
        $insurance->title = $request->title;
        $insurance->url = Str::slug($request->title);
        $insurance->description = $request->description;
        $insurance->status = $request->status;

        $insurance->save();

        return redirect()->route('admin.insurance.posts.index');
    }

    public function InsurancePostEdit($id)
    {
        Gate::authorize('app.insurances.posts.edit');
        $insurances = Insurance::all();
        $insurancePost = InsurancePost::findOrFail($id);
        return view('admin.insurance.posts.edit',compact('insurancePost','insurances'));
    }

    public function InsurancePostUpdate(Request $request, $id)
    {
        Gate::authorize('app.insurances.posts.edit');
        $insurance = InsurancePost::findOrFail($id);
        $featured_image = $request->file('featured_image');
        $pdf_file = $request->file('pdf_file');
        $old_image = $insurance->featured_image;
        $old_file = $insurance->pdf_file;
        if(isset($featured_image)){
            $currentDate = Carbon::now()->toDateString();
            $featuredimagename = $currentDate.uniqid().'.'.$featured_image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('frontend/assets/img/insurances/posts')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/insurances/posts');
            }

            if (Storage::disk('public')->exists('frontend/assets/img/insurances/posts/'.$old_image)) {
                Storage::disk('public')->delete('frontend/assets/img/insurances/posts/'.$old_image);
            }

            Storage::disk('public')->putFileAs('frontend/assets/img/insurances/posts',$featured_image,$featuredimagename);

            $insurance->featured_image = $featuredimagename;
        }
        if (isset($pdf_file)) {
            $currentDate = Carbon::now()->toDateString();
            $pdffilename = $currentDate.uniqid().'.'.$pdf_file->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('frontend/assets/files/insurances/posts/pdf')) {
                Storage::disk('public')->makeDirectory('frontend/assets/files/insurances/posts/pdf');
            }

            if (Storage::disk('public')->exists('frontend/assets/files/insurances/posts/pdf/'.$old_file)) {
                Storage::disk('public')->delete('frontend/assets/files/insurances/posts/pdf/'.$old_file);
            }

            Storage::disk('public')->putFileAs('frontend/assets/files/insurances/posts/pdf/',$pdf_file,$pdffilename);

            $insurance->pdf_file = $pdffilename;
        }

        $insurance->insurance_id = $request->insurance_id;
        $insurance->title = $request->title;
        $insurance->url = Str::slug($request->title);
        $insurance->description = $request->description;
        $insurance->status = $request->status;

        $insurance->update();

        return redirect()->route('admin.insurance.posts.index');
    }

    public function InsurancePostDestroy($id)
    {
        Gate::authorize('app.insurances.posts.destroy');
        $insurance = InsurancePost::findOrFail($id);
        $old_image = $insurance->featured_image;
        $old_file = $insurance->pdf_file;
        if (Storage::disk('public')->exists('frontend/assets/img/insurances/posts/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/insurances/posts/'.$old_image);
        }

        if (Storage::disk('public')->exists('frontend/assets/files/insurances/posts/pdf/'.$old_file)) {
            Storage::disk('public')->delete('frontend/assets/files/insurances/posts/pdf/'.$old_file);
        }
        $insurance->delete();
        return redirect()->back();
    }
}
