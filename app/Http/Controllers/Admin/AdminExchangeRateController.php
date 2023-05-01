<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ExchangneRate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AdminExchangeRateController extends Controller
{
    /**
     * Show Circular Index page method
     */
    public function index()
    {
        Gate::authorize('app.exchange.index');
        $exchange_rates = ExchangneRate::all();
        return view('admin.tools.exchange_rate.index',compact('exchange_rates'));
    }

    /**
     * Create Circular post method
     */
    public function create()
    {
        Gate::authorize('app.exchange.create');
        return view('admin.tools.exchange_rate.create');
    }

    /**
     * Store data method
     */

     public function store(Request $request)
     {
        Gate::authorize('app.exchange.create');
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
        Gate::authorize('app.exchange.edit');
        $exchange_rate = ExchangneRate::findOrfail($id);
        return view('admin.tools.exchange_rate.edit', compact('exchange_rate'));
     }

     /**
      * Update circular data method
      * @param $id
      */
    public function update(Request $request, $id)
    {
        Gate::authorize('app.exchange.edit');
        ExchangneRate::where('id',$id)->update([
            'date' => $request->date,
            'currency' => json_encode($request->currency),
            'buying' => json_encode($request->buying),
            'selling' => json_encode($request->selling),
            'created_at' => Carbon::now()->toDateString()
        ]);

        return redirect()->route('admin.exchange_rate.index');

    }

    /**
     * Delete ExchangeRate method
     * @param $id
     */
    public function destroy($id)
    {
        Gate::authorize('app.exchange.destroy');
        ExchangneRate::findOrfail($id)->delete();
        return redirect()->back();
    }
}
