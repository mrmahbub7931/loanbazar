<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdminTeamController extends Controller
{
    public function index()
    {
        Gate::authorize('app.teams.index');
        $teams = Team::all();
        return view('admin.teams.index',compact('teams'));
    }

    public function create()
    {
        Gate::authorize('app.teams.create');
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.teams.create');
        $request->validate([
            'name' => 'required|max:255',
            'designation' => 'required|max:255',
            'status' => 'required',
            'team_image' => 'required|mimes:jpeg,png,jpg,gif'
        ]);
        $team = new Team();
        $team_image = $request->file('team_image');
        if (isset($team_image)) {
            $currentDate = Carbon::now()->toDateString();
                $teamimagename = $currentDate.uniqid().'.'.$team_image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('frontend/assets/img/teams')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/teams');
                }
                Storage::disk('public')->putFileAs('frontend/assets/img/teams/',$team_image,$teamimagename);
                $team->team_image = $teamimagename;
        }

        $team->user_id = Auth::user()->id;
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->facebook_url = $request->facebook_url;
        $team->linkedin_url = $request->linkedin_url;
        $team->instagram_url = $request->instagram_url;
        $team->status = $request->status;
        $team->save();

        return redirect()->route('admin.teams.index');

    }

    public function edit($id)
    {
        Gate::authorize('app.teams.edit');
        $team = Team::findOrfail($id);
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        Gate::authorize('app.teams.edit');
        $team = Team::findOrfail($id);
        $team_image = $request->file('team_image');
        $old_image = $team->team_image;
        if (isset($team_image)) {
            $currentDate = Carbon::now()->toDateString();
                $teamimagename = $currentDate.uniqid().'.'.$team_image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('frontend/assets/img/teams')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/teams');
                }

                if (Storage::disk('public')->exists('frontend/assets/img/teams/'.$old_image)) {
                    Storage::disk('public')->delete('frontend/assets/img/teams/'.$old_image);
                }

                Storage::disk('public')->putFileAs('frontend/assets/img/teams/',$team_image,$teamimagename);

                $team->team_image = $teamimagename;
        }

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->facebook_url = $request->facebook_url;
        $team->linkedin_url = $request->linkedin_url;
        $team->instagram_url = $request->instagram_url;
        $team->status = $request->status;
        $team->update();

        return redirect()->route('admin.teams.index');
    }

    public function destroy($id)
    {
        Gate::authorize('app.teams.destroy');
        $team = Team::findOrFail($id)->delete();
        $old_image = $team->team_image;
        if (Storage::disk('public')->exists('frontend/assets/img/teams/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/teams/'.$old_image);
        }
        return redirect()->back();
    }
}
