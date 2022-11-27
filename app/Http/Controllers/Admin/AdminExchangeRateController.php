<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ExchangneRate;
use App\Http\Controllers\Controller;

class AdminExchangeRateController extends Controller
{
    /**
     * Show Circular Index page method
     */
    public function index()
    {
        $exchange_rates = ExchangneRate::all();
        return view('admin.tools.exchange_rate.index',compact('exchange_rates'));
    }

    /**
     * Create Circular post method
     */
    public function create()
    {
        return view('admin.tools.exchange_rate.create');
    }

    /**
     * Store data method
     */

     public function store(Request $request)
     {
        // dd($request->all());
        $request->validate([
            'date' => 'required',
            'currency' => 'required',
            'buying' => 'required',
            'selling' => 'required',
        ]);

        ExchangneRate::create([
            'date' => $request->date,
            'currency' => json_encode($request->currency),
            'buying' => json_encode($request->buying),
            'selling' => json_encode($request->selling),
            'created_at' => Carbon::now()->toDateString()
        ]);

        return redirect()->route('admin.exchange_rate.index');
     }

     /**
      * Edit method
      * @param $id
      */
     public function edit($id)
     {
        $exchange_rate = ExchangneRate::findOrfail($id);
        return view('admin.tools.exchange_rate.edit', compact('exchange_rate'));
     }

     /**
      * Update circular data method 
      * @param $id 
      */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        ExchangneRate::where('id',$id)->update([
            'date' => $request->date,
            'currency' => json_encode($request->currency),
            'buying' => json_encode($request->buying),
            'selling' => json_encode($request->selling),
            'created_at' => Carbon::now()->toDateString()
        ]);

        return redirect()->route('admin.exchange_rate.index');
        // $circular = Circular::findOrfail($id);
        // $circular->job_title = $request->job_title;
        // $circular->slug = Str::slug($request->job_title);
        // $circular->job_location = $request->job_location;
        // $circular->job_description = $request->job_description;
        // $circular->status = $request->status;
        // $circular->update();
        // return redirect()->route('admin.circular.index');
    }

    /**
     * Delete ExchangeRate method 
     * @param $id 
     */
    public function destroy($id)
    {
        ExchangneRate::findOrfail($id)->delete();
        return redirect()->back();
    }
}
