<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\BestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ExchangneRate;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function getApplyForm()
    {
        return view('frontend.pages.loancreditapply');
    }

    public function storeApplyForm(Request $request)
    {

        $this->validate($request, [
            'type'     => 'required',
            'full_name'     => 'required|string',
            'phone'     => 'required',
            'present_address' => 'required',
            'profession' => 'required',
        ]);
        $tracking_id = mt_rand(111111,999999);
        $data = [
            'tracking_id' => $tracking_id,
            'type' => $request->type,
            'loan_name' => $request->loan_name,
            'card_name' => $request->card_name,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'present_address' => $request->present_address,
            'profession' => $request->profession,
            'company_name' => $request->company_name,
            'designation' => $request->designation != null ? $request->designation : $request->s_designation,
            'monthly_salary' => $request->monthly_salary,
            'salary_paid_by' => $request->salary_paid_by,
            'business_name' => $request->business_name,
            'business_type' => $request->business_type,
            'business_monthly_income' => $request->business_monthly_income,
            'house_type' => $request->house_type,
            'monthly_rental_income' => $request->monthly_rental_income,
            'existing_lc' => $request->existing_lc,
            'existing_etin' => $request->existing_etin,
            'user_note' => $request->user_note ,
            'status' => 'Pending',
            'created_at' => Carbon::now()->toDateString()
        ];
        // dd($data);
        $FormId = DB::table('loan_card_apply')->insertGetId($data);

        $formInfo = [];
        $formInfo['tracking_info'] = DB::table('loan_card_apply')->where('id','=',$FormId)->select('full_name','tracking_id')->first();
        return redirect()->route('front.thanks.page')->with('appliedPerson',$formInfo);
    }

    public function getThankyouPage()
    {
        return view('frontend.pages.thank_you');
    }

    public function singleService($slug)
    {
        // return view('frontend.pages.service.single');
        $singleService = BestService::where(['slug' => $slug])->first();
        return view('frontend.pages.service.single', compact('singleService'));
    }

    // EMI calculator

    public function emiCalculator()
    {
        return view('frontend.pages.emi');
    }

    // Exchange rate
    public function exchangeRate()
    {
        $exchange_rates = ExchangneRate::latest()->first();
        return view('frontend.pages.exchange_rate',compact('exchange_rates'));
    }

    public function storeLifeGeneralForm(Request $request)
    {
        $request->validate([
            'full_name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required',
        ]);

        if ($request->insurance_type == 'life-insurance' || $request->insurance_type == 'general-insurance') {
            // return $request->all();
            $data = [
                'insurance_type' => $request->insurance_type,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'date_of_birth' => $request->date_of_birth,
                'profession'    => $request->profession,
                'location'  => $request->location,
                'created_at' => Carbon::now()->toDateString()
            ];
            DB::table('life_general_form')->insert($data);
            return redirect()->back();
        }else{
            // return $request->all();
            $file = $request->file('file');
            if (isset($file)) {
                $currentDate = Carbon::now()->toDateString();
                $filename = $currentDate.uniqid().'.'.$file->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('frontend/assets/files/insurances/form/pdf')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/files/insurances/form/pdf');
                }

                Storage::disk('public')->putFileAs('frontend/assets/files/insurances/form/pdf',$file,$filename);

                // $insurance->pdf_file = $pdffilename;
                DB::table('bike_car_form')->insert([
                    'insurance_type' => $request->insurance_type,'full_name' => $request->full_name,'email' => $request->email, 'phone' => $request->phone, 'receiving_address' => $request->receiving_address, 'insurance_date' => $request->insurance_date, 'file' => $filename
                ]);
            }

            return redirect()->back();
        }
    }
}
