<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = DB::table('loan_card_apply')->latest()->get();
        return view('admin.application.index', compact('applications'));
    }

    public function edit($id)
    {
        $application = DB::table('loan_card_apply')->where('id', $id)->first();
        $role = Role::where('slug','vendor')->first()->id;
        $vendors = Role::findOrFail($role)->users()->get();
        // dd($vendors);
        return view('admin.application.edit', compact('application','vendors'));
    }

    public function update(Request $request, $id) {
        // return $request->all();
        $data = [
            'author_note' => $request->author_note,
            'status' => $request->status
        ];

        $formUpdate = DB::table('loan_card_apply')->where('id', $id)->update($data);
        return redirect()->route('admin.application.index');
    }

    public function destroy($id) {
        DB::table('loan_card_apply')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function lifegeneralIndex()
    {
        $applications = DB::table('life_general_form')->get();
        return view('admin.application.life-general.index', compact('applications'));
    }

    public function lifegeneralEdit($id)
    {
        $application = DB::table('life_general_form')->where('id', $id)->first();
        return view('admin.application.life-general.edit', compact('application'));
    }

    public function lifegeneralUpdate(Request $request,$id)
    {
        // return $request->all();
        $data = [
            'admin_note' => $request->admin_note,
            'status' => $request->status
        ];

        $formUpdate = DB::table('life_general_form')->where('id', $id)->update($data);
        return redirect()->route('admin.application.life.index');
    }

    public function lifegeneralDestroy($id) {
        DB::table('life_general_form')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function transportIndex()
    {
        $applications = DB::table('bike_car_form')->get();
        return view('admin.application.bike_car.index', compact('applications'));
    }

    public function transportEdit($id)
    {
        $application = DB::table('bike_car_form')->where('id', $id)->first();
        return view('admin.application.bike_car.edit', compact('application'));
    }

    public function transportUpdate(Request $request,$id)
    {
        // return $request->all();
        $data = [
            'admin_note' => $request->admin_note,
            'status' => $request->status
        ];

        $formUpdate = DB::table('bike_car_form')->where('id', $id)->update($data);
        return redirect()->route('admin.application.transport.index');
    }

    public function transportDestroy($id) {
        $old_file = DB::table('bike_car_form')->where('id', '=', $id)->select('file')->get();
        if (Storage::disk('public')->exists('frontend/assets/files/insurances/form/pdf/'.$old_file)) {
            Storage::disk('public')->delete('frontend/assets/files/insurances/form/pdf/'.$old_file);
        }
        DB::table('bike_car_form')->where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
