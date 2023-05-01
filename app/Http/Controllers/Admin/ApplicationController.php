<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->role->slug);
        Gate::authorize('app.loan.applications.index');
        if (Auth::user()->role->slug == 'super-admin') {
            $applications = DB::table('loan_card_apply')->where('type','loan')->latest()->get();
        }else {
            $applications = DB::table('loan_card_apply')->where('send_to_vendor',Auth::user()->id)->where('type','loan')->latest()->get();
        }
    //    dd($applications);

        return view('admin.application.loan.index', compact('applications'));
    }

    public function cardIndex()
    {
        // dd(Auth::user()->role->slug);
        Gate::authorize('app.card.applications.index');
        if (Auth::user()->role->slug == 'super-admin') {
            $applications = DB::table('loan_card_apply')->where('type','card')->latest()->get();
        }else {
            $applications = DB::table('loan_card_apply')->where('send_to_vendor',Auth::user()->id)->where('type','card')->latest()->get();
        }
    //    dd($applications);

        return view('admin.application.card.index', compact('applications'));
    }

    public function edit($id)
    {
        Gate::authorize('app.applications.edit');
        $application = DB::table('loan_card_apply')->where('id', $id)->first();
        $role = Role::where('slug','vendor')->first()->id;
        $vendors = Role::findOrFail($role)->users()->get();
        // dd($vendors);
        return view('admin.application.edit', compact('application','vendors'));
    }

    public function update(Request $request, $id) {
        // return $request->all();
        Gate::authorize('app.applications.edit');
        $formData = DB::table('loan_card_apply')->where('id', $id)->first();
        $data = [
            'author_note' => $request->author_note,
            'vendor_note' => isset($request->vendor_note) ? $request->vendor_note : null,
            'send_to_vendor' => isset($request->send_to_vendor) ? $request->send_to_vendor : $formData->send_to_vendor,
            'status' => $request->status
        ];
        // dd($data);
        $formUpdate = DB::table('loan_card_apply')->where('id', $id)->update($data);
        return redirect()->back();
    }

    public function destroy($id) {
        Gate::authorize('app.applications.destroy');
        DB::table('loan_card_apply')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function lifegeneralIndex()
    {
        Gate::authorize('app.lg.applications.index');
        $applications = DB::table('life_general_form')->get();
        return view('admin.application.life-general.index', compact('applications'));
    }

    public function lifegeneralEdit($id)
    {
        Gate::authorize('app.lg.applications.edit');
        $application = DB::table('life_general_form')->where('id', $id)->first();
        return view('admin.application.life-general.edit', compact('application'));
    }

    public function lifegeneralUpdate(Request $request,$id)
    {
        Gate::authorize('app.lg.applications.edit');
        // return $request->all();
        $data = [
            'admin_note' => $request->admin_note,
            'status' => $request->status
        ];

        $formUpdate = DB::table('life_general_form')->where('id', $id)->update($data);
        return redirect()->route('admin.application.life.index');
    }

    public function lifegeneralDestroy($id) {
        Gate::authorize('app.lg.applications.destroy');
        DB::table('life_general_form')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function transportIndex()
    {
        Gate::authorize('app.bc.applications.index');
        $applications = DB::table('bike_car_form')->get();
        return view('admin.application.bike_car.index', compact('applications'));
    }

    public function transportEdit($id)
    {
        Gate::authorize('app.bc.applications.edit');
        $application = DB::table('bike_car_form')->where('id', $id)->first();
        return view('admin.application.bike_car.edit', compact('application'));
    }

    public function transportUpdate(Request $request,$id)
    {
        // return $request->all();
        Gate::authorize('app.bc.applications.edit');
        $data = [
            'admin_note' => $request->admin_note,
            'status' => $request->status
        ];

        $formUpdate = DB::table('bike_car_form')->where('id', $id)->update($data);
        return redirect()->route('admin.application.transport.index');
    }

    public function transportDestroy($id) {
        Gate::authorize('app.bc.applications.destroy');
        $old_file = DB::table('bike_car_form')->where('id', '=', $id)->select('file')->get();
        if (Storage::disk('public')->exists('frontend/assets/files/insurances/form/pdf/'.$old_file)) {
            Storage::disk('public')->delete('frontend/assets/files/insurances/form/pdf/'.$old_file);
        }
        DB::table('bike_car_form')->where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
