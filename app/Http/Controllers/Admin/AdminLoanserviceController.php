<?php

namespace App\Http\Controllers\Admin;

use App\Models\LoanService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LoanServiceDoc;
use App\Models\LoanServiceFaq;
use App\Models\LoanServiceRow;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminLoanserviceController extends Controller
{
    public function index()
    {
        $loans = LoanService::all();
        return view('admin.loans.index', compact('loans'));
    }

    public function create()
    {
        return view('admin.loans.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate( [
            'service_title' => 'required|max:255',
            'status' => 'required',
            'header_image' => 'required'
        ] );

        $header_image = $request->file('header_image');
        if (isset($header_image)) {
            $currentDate = Carbon::now()->toDateString();
                $headerimagename = $currentDate.uniqid().'.'.$header_image->getClientOriginalExtension();
    
                if (!Storage::disk('public')->exists('frontend/assets/img/loans')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/loans');
                }
                // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                Storage::disk('public')->putFileAs('frontend/assets/img/loans/',$header_image,$headerimagename);
        }
        $loan_id = DB::table('loan_services')->insertGetId([
            'user_id' => Auth::user()->id, 'header_image' => $headerimagename, 'service_title' => $request->service_title, 'slug' => Str::slug($request->service_title), 'title_description' => strip_tags($request->title_description), 'disclaimer' => strip_tags($request->disclaimer), 'status' => $request->status
        ]);

        $laonServiceRow = new LoanServiceRow();
        if (isset($request->service) && count($request->service) > 0) {
            foreach ($request->service as $row_service) {
                $bank_logo = $row_service['bank_logo'];
                if (isset($bank_logo)) {
                        $currentDate = Carbon::now()->toDateString();
                        $banklogoname = $currentDate.uniqid().'.'.$bank_logo->getClientOriginalExtension();
            
                        if (!Storage::disk('public')->exists('frontend/assets/img/loans')) {
                            Storage::disk('public')->makeDirectory('frontend/assets/img/loans');
                        }
                        // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                        Storage::disk('public')->putFileAs('frontend/assets/img/loans/',$bank_logo,$banklogoname);
                        // $laonServiceRow->bank_logo = $banklogoname;
                
                }
                DB::table('loan_service_rows')->insert([
                    'loan_service_id' => $loan_id, 'bank_logo' => $banklogoname,'notify_top' => $row_service['notify_top'],'bank_name' => $row_service['bank_name'], 'ineterest_rate_range' => $row_service['ineterest_rate_range'], 'processing_fee' => $row_service['processing_fee'], 'loan_amount' => $row_service['loan_amount'], 'loan_tenure' => $row_service['loan_tenure'], 'fees_charges' => json_encode($row_service['fees_charges']), 'features' => json_encode($row_service['features']), 'eligibility' => json_encode($row_service['eligibility']), 'notify_bottom' => $row_service['notify_bottom'], 'status' => $row_service['status']
                ]);
            }
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $loan = LoanService::findOrFail($id);
        $loansRows = $loan->getServiceRows;
        return view('admin.loans.edit', compact('loan','loansRows'));
    }

    public function udpate( Request $request, $id)
    {
        // dd($request->all());
        $loan = LoanService::findOrfail($id);
        $header_image = $request->file('header_image');
        $old_image = $loan->header_image;
        if (isset($header_image)) {
            $currentDate = Carbon::now()->toDateString();
                $headerimagename = $currentDate.uniqid().'.'.$header_image->getClientOriginalExtension();
    
                if (!Storage::disk('public')->exists('frontend/assets/img/loans')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/loans');
                }
                
                if (Storage::disk('public')->exists('frontend/assets/img/loans/'.$old_image)) {
                    Storage::disk('public')->delete('frontend/assets/img/loans/'.$old_image);
                }

                Storage::disk('public')->putFileAs('frontend/assets/img/loans/',$header_image,$headerimagename);

                $loan->header_image = $headerimagename;
        }

        $loan->user_id = Auth::user()->id;
        $loan->service_title = $request->service_title;
        $loan->slug = Str::slug($request->service_title);;
        $loan->title_description = strip_tags($request->title_description);
        $loan->disclaimer = strip_tags($request->disclaimer);
        $loan->status = $request->status;
        $loan->save();
        
        
        if (isset($request->service) && count($request->service) > 0) {
            foreach ($request->service as $row_service) {
                    // dd($row_service);
                    if (!empty($row_service['service_row_id'])) {
                        
                        $loanServiceRow = LoanServiceRow::findOrfail($row_service['service_row_id']);
                        
                        $old_row_image = $loanServiceRow->bank_logo;
                        if (isset($row_service['bank_logo'])) {
                            $bank_logo = $row_service['bank_logo'];
                            $currentDate = Carbon::now()->toDateString();
                            $banklogoname = $currentDate.uniqid().'.'.$bank_logo->getClientOriginalExtension();
                
                            if (!Storage::disk('public')->exists('frontend/assets/img/loans')) {
                                Storage::disk('public')->makeDirectory('frontend/assets/img/loans');
                            }
                            
                            if (Storage::disk('public')->exists('frontend/assets/img/loans/'.$old_row_image)) {
                                Storage::disk('public')->delete('frontend/assets/img/loans/'.$old_row_image);
                            }
                            Storage::disk('public')->putFileAs('frontend/assets/img/loans/',$bank_logo,$banklogoname);
                            DB::table('loan_service_rows')->where('id', $row_service['service_row_id'])->update([
                                'bank_logo' => $banklogoname,
                            ]);
                        }

                        DB::table('loan_service_rows')->where('id', $row_service['service_row_id'])->update([
                            'loan_service_id' => $id,'notify_top' => $row_service['notify_top'],'bank_name' => $row_service['bank_name'], 'ineterest_rate_range' => $row_service['ineterest_rate_range'], 'processing_fee' => $row_service['processing_fee'], 'loan_amount' => $row_service['loan_amount'], 'loan_tenure' => $row_service['loan_tenure'], 'fees_charges' => json_encode($row_service['fees_charges']), 'features' => json_encode($row_service['features']), 'eligibility' => json_encode($row_service['eligibility']), 'notify_bottom' => $row_service['notify_bottom'], 'status' => $row_service['status']
                        ]);
                    }else {
                        $bank_logo = $row_service['bank_logo'];
                        if (isset($bank_logo)) {
                                $currentDate = Carbon::now()->toDateString();
                                $banklogoname = $currentDate.uniqid().'.'.$bank_logo->getClientOriginalExtension();
                    
                                if (!Storage::disk('public')->exists('frontend/assets/img/loans')) {
                                    Storage::disk('public')->makeDirectory('frontend/assets/img/loans');
                                }
                                // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                                Storage::disk('public')->putFileAs('frontend/assets/img/loans/',$bank_logo,$banklogoname);
                        
                        }
                        DB::table('loan_service_rows')->insert([
                            'loan_service_id' => $id,'bank_logo' => $banklogoname,'notify_top' => $row_service['notify_top'],'bank_name' => $row_service['bank_name'], 'ineterest_rate_range' => $row_service['ineterest_rate_range'], 'processing_fee' => $row_service['processing_fee'], 'loan_amount' => $row_service['loan_amount'], 'loan_tenure' => $row_service['loan_tenure'], 'fees_charges' => json_encode($row_service['fees_charges']), 'features' => json_encode($row_service['features']), 'eligibility' => json_encode($row_service['eligibility']), 'notify_bottom' => $row_service['notify_bottom'], 'status' => $row_service['status']
                        ]);
                    }
                    
                
            }
        }
        return redirect()->route('admin.loans.index');
    }

    public function destroy($id)
    {
        $loan = LoanService::findOrfail($id);
        $old_image = $loan->header_image;
        if (Storage::disk('public')->exists('frontend/assets/img/loans/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/loans/'.$old_image);
        }
        $loan->delete();
        return redirect()->back();
    }

    public function docsIndex()
    {
        $loanDocs = LoanServiceDoc::all();
        return view('admin.loans.docs.index',compact('loanDocs'));
    }
    public function docsCreate()
    {
        $loans = LoanService::all();
        return view('admin.loans.docs.create', compact('loans'));
    }
    public function docsStore(Request $request)
    {
        // return $request->all();
        $docs = new LoanServiceDoc();

        $docs->loan_service_id = $request->loan_service_id;
        $docs->title = $request->service_title;
        $docs->body = preg_replace('/\s+/', ' ', $request->service_docs);
        $docs->status = $request->status;
        $docs->save();

        return redirect()->back();
    }

    public function docsEdit($id)
    {
        $loanDoc = LoanServiceDoc::findOrfail($id);
        $loans = LoanService::all();
        return view('admin.loans.docs.edit', compact('loanDoc','loans'));
    }
    public function docsUdpate(Request $request, $id)
    {
        $loanDoc = LoanServiceDoc::findOrfail($id);

        $loanDoc->loan_service_id = $request->loan_service_id;
        $loanDoc->title = $request->service_title;
        $loanDoc->body = preg_replace('/\s+/', ' ', $request->service_docs);
        $loanDoc->status = $request->status;
        $loanDoc->update();

        return redirect()->route('admin.loans.docs.index')->with('success','Card Document Successfully Updated!');
    }

    public function docsDestroy($id)
    {
        $cardDoc = LoanServiceDoc::findOrfail($id);
        $cardDoc->delete();
        return redirect()->back();
    }

    // faq card
    public function faqsIndex()
    {
        $faqs = LoanServiceFaq::all();
        return view('admin.loans.faqs.index',compact('faqs'));
    }
    
    public function faqsCreate(){
        $loans = LoanService::all();
        return view('admin.loans.faqs.create',compact('loans'));
    }

    public function faqsStore(Request $request){
        $loanServiceId = $request->loan_service_id;
        $faq = new LoanServiceFaq();
        $faq->loan_service_id = $loanServiceId;
        $faq->faq_title = $request->faq_title;
        $faq->faq_description = preg_replace('/\s+/', ' ', $request->faq_description);
        $faq->save();
        return redirect()->route('admin.loans.faqs.index');
    }

    public function faqsEdit($id)
    {
        $loanFaq = LoanServiceFaq::findOrfail($id);
        $loans = LoanService::all();
        return view('admin.loans.faqs.edit', compact('loanFaq','loans'));
    }

    public function faqsUdpate(Request $request, $id)
    {
        $laonFaq = LoanServiceFaq::findOrfail($id);

        $laonFaq->loan_service_id = $request->loan_service_id;
        $laonFaq->faq_title = $request->faq_title;
        $laonFaq->faq_description = preg_replace('/\s+/', ' ', $request->faq_description);
        $laonFaq->update();

        return redirect()->route('admin.loans.faqs.index')->with('success','Card Faq Successfully Updated!');
    }

    public function faqsDestroy($id)
    {
        $laonFaq = LoanServiceFaq::findOrfail($id);
        $laonFaq->delete();
        return redirect()->back();
    }
}
