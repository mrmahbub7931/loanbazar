<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\CardService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CardServiceDoc;
use App\Models\CardServiceFaq;
use App\Models\CardServiceRow;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminCardServiceController extends Controller
{
    public function index()
    {
        $cards = CardService::all();
        return view('admin.cards.index', compact('cards'));
    }
    
    public function create()
    {
        return view('admin.cards.create');
    }
    
    public function store(Request $request)
    {

        $request->validate( [
            'service_title' => 'required|max:255',
            'status' => 'required',
            'header_image' => 'required|mimes:jpeg,png,jpg,gif'
        ] );

        $header_image = $request->file('header_image');
        if (isset($header_image)) {
            $currentDate = Carbon::now()->toDateString();
                $headerimagename = $currentDate.uniqid().'.'.$header_image->getClientOriginalExtension();
    
                if (!Storage::disk('public')->exists('frontend/assets/img/cards')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/cards');
                }
                // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                Storage::disk('public')->putFileAs('frontend/assets/img/cards/',$header_image,$headerimagename);
        }
        $card_id = DB::table('card_services')->insertGetId([
            'user_id' => Auth::user()->id, 'header_image' => $headerimagename, 'service_title' => $request->service_title, 'slug' => Str::slug($request->service_title), 'title_description' => strip_tags($request->title_description), 'disclaimer' => strip_tags($request->disclaimer), 'status' => $request->status
        ]);

        $cardServiceRow = new CardServiceRow();
        if (isset($request->service) && count($request->service) > 0) {
            foreach ($request->service as $row_service) {
                $card_image = $row_service['card_image'];
                if (isset($card_image)) {
                        $currentDate = Carbon::now()->toDateString();
                        $cardimagename = $currentDate.uniqid().'.'.$card_image->getClientOriginalExtension();
            
                        if (!Storage::disk('public')->exists('frontend/assets/img/cards')) {
                            Storage::disk('public')->makeDirectory('frontend/assets/img/cards');
                        }
                        // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                        Storage::disk('public')->putFileAs('frontend/assets/img/cards/',$card_image,$cardimagename);
                        $cardServiceRow->card_image = $cardimagename;
                
                }
                DB::table('card_service_rows')->insert([
                    'card_service_id' => $card_id, 'card_image' => $cardimagename,'notify_top' => $row_service['notify_top'],'bank_name' => $row_service['bank_name'], 'interest_period' => $row_service['interest_period'], 'annual_fee' => $row_service['annual_fee'], 'card_processing' => $row_service['card_processing'], 'free_supplementary_card' => $row_service['free_supplementary_card'], 'withdrawl_limit' => $row_service['withdrawl_limit'], 'fees_charges' => json_encode($row_service['fees_charges']), 'features' => json_encode($row_service['features']), 'eligibility' => json_encode($row_service['eligibility']), 'notify_bottom' => $row_service['notify_bottom'], 'status' => $row_service['status']
                ]);
            }
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $card = CardService::findOrFail($id);
        $cardsRows = $card->getServiceRows;
        return view('admin.cards.edit', compact('card','cardsRows'));
    }

    public function udpate( Request $request, $id)
    {
        // dd($request->all());
        $card = CardService::findOrfail($id);
        $header_image = $request->file('header_image');
        $old_image = $card->header_image;
        if (isset($header_image)) {
            $currentDate = Carbon::now()->toDateString();
                $headerimagename = $currentDate.uniqid().'.'.$header_image->getClientOriginalExtension();
    
                if (!Storage::disk('public')->exists('frontend/assets/img/cards')) {
                    Storage::disk('public')->makeDirectory('frontend/assets/img/cards');
                }
                
                if (Storage::disk('public')->exists('frontend/assets/img/cards/'.$old_image)) {
                    Storage::disk('public')->delete('frontend/assets/img/cards/'.$old_image);
                }

                Storage::disk('public')->putFileAs('frontend/assets/img/cards/',$header_image,$headerimagename);

                $card->header_image = $headerimagename;
                // $card_id = DB::table('card_services')->where(['id' => $id])->update([
                //     'user_id' => Auth::user()->id, 'header_image' => $headerimagename, 'service_title' => $request->service_title, 'slug' => Str::slug($request->service_title), 'title_description' => strip_tags($request->title_description), 'disclaimer' => strip_tags($request->disclaimer), 'status' => $request->status
                // ]);
        }

        $card->user_id = Auth::user()->id;
        $card->service_title = $request->service_title;
        $card->slug = Str::slug($request->service_title);
        $card->title_description = strip_tags($request->title_description);
        $card->disclaimer = strip_tags($request->disclaimer);
        $card->status = $request->status;
        $card_id = $card->save();
        
        
        if (isset($request->service) && count($request->service) > 0) {
            foreach ($request->service as $row_service) {
                    // dd($row_service);
                    if (!empty($row_service['service_row_id'])) {
                        
                        $cardServiceRow = CardServiceRow::findOrfail($row_service['service_row_id']);
                        
                        $old_row_image = $cardServiceRow->card_image;
                        if (isset($row_service['card_image'])) {
                            $card_image = $row_service['card_image'];
                            $currentDate = Carbon::now()->toDateString();
                            $cardimagename = $currentDate.uniqid().'.'.$card_image->getClientOriginalExtension();
                
                            if (!Storage::disk('public')->exists('frontend/assets/img/cards')) {
                                Storage::disk('public')->makeDirectory('frontend/assets/img/cards');
                            }
                            
                            if (Storage::disk('public')->exists('frontend/assets/img/cards/'.$old_row_image)) {
                                Storage::disk('public')->delete('frontend/assets/img/cards/'.$old_row_image);
                            }
                            Storage::disk('public')->putFileAs('frontend/assets/img/cards/',$card_image,$cardimagename);
                            // $cardServiceRow->card_image = $cardimagename;
                            DB::table('card_service_rows')->where('id', $row_service['service_row_id'])->update([
                                'card_image' => $cardimagename,
                            ]);
                        }

                        DB::table('card_service_rows')->where('id', $row_service['service_row_id'])->update([
                            'card_service_id' => $id,'notify_top' => $row_service['notify_top'], 'bank_name' => $row_service['bank_name'],'interest_period' => $row_service['interest_period'], 'annual_fee' => $row_service['annual_fee'], 'card_processing' => $row_service['card_processing'], 'free_supplementary_card' => $row_service['free_supplementary_card'], 'withdrawl_limit' => $row_service['withdrawl_limit'], 'fees_charges' => json_encode($row_service['fees_charges']), 'features' => json_encode($row_service['features']), 'eligibility' => json_encode($row_service['eligibility']), 'notify_bottom' => $row_service['notify_bottom'],'status' => $row_service['status']
                        ]);
                    }else {
                        // $cardServiceRow = new CardServiceRow();
                        $card_image = $row_service['card_image'];
                        if (isset($card_image)) {
                                $currentDate = Carbon::now()->toDateString();
                                $cardimagename = $currentDate.uniqid().'.'.$card_image->getClientOriginalExtension();
                    
                                if (!Storage::disk('public')->exists('frontend/assets/img/cards')) {
                                    Storage::disk('public')->makeDirectory('frontend/assets/img/cards');
                                }
                                // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
                                Storage::disk('public')->putFileAs('frontend/assets/img/cards/',$card_image,$cardimagename);
                                // $cardServiceRow->card_image = $cardimagename;
                        
                        }
                        DB::table('card_service_rows')->insert([
                            'card_service_id' => $id, 'card_image' => $cardimagename,'notify_top' => $row_service['notify_top'],'bank_name' => $row_service['bank_name'],  'interest_period' => $row_service['interest_period'], 'annual_fee' => $row_service['annual_fee'], 'card_processing' => $row_service['card_processing'], 'free_supplementary_card' => $row_service['free_supplementary_card'], 'withdrawl_limit' => $row_service['withdrawl_limit'], 'fees_charges' => json_encode($row_service['fees_charges']), 'features' => json_encode($row_service['features']), 'eligibility' => json_encode($row_service['eligibility']), 'notify_bottom' => $row_service['notify_bottom'], 'status' => $row_service['status']
                        ]);
                    }
                    
                
            }
        }
        return redirect()->route('admin.cards.index');
    }

    public function destroy($id)
    {
        $card = CardService::findOrfail($id);
        $old_image = $card->header_image;
        if (Storage::disk('public')->exists('frontend/assets/img/cards/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/cards/'.$old_image);
        }
        $card->delete();
        return redirect()->back();
    }

    // Cards Documents

    public function docsIndex()
    {
        $cardDocs = CardServiceDoc::all();
        return view('admin.cards.docs.index',compact('cardDocs'));
    }

    public function docsCreate()
    {
        $cards = CardService::all();
        return view('admin.cards.docs.create', compact('cards'));
    }

    public function docsStore(Request $request)
    {
        // return $request->all();
        $docs = new CardServiceDoc();

        $docs->card_service_id = $request->card_service_id;
        $docs->title = $request->service_title;
        $docs->body = preg_replace('/\s+/', ' ', $request->service_docs);
        $docs->status = $request->status;
        $docs->save();

        return redirect()->back();
    }

    public function docsEdit($id)
    {
        $cardDoc = CardServiceDoc::findOrfail($id);
        $cards = CardService::all();
        return view('admin.cards.docs.edit', compact('cardDoc','cards'));
    }
    public function docsUdpate(Request $request, $id)
    {
        $cardDoc = CardServiceDoc::findOrfail($id);

        $cardDoc->card_service_id = $request->card_service_id;
        $cardDoc->title = $request->service_title;
        $cardDoc->body = preg_replace('/\s+/', ' ', $request->service_docs);
        $cardDoc->status = $request->status;
        $cardDoc->update();

        return redirect()->route('admin.cards.docs.index')->with('success','Card Document Successfully Updated!');
    }

    public function docsDestroy($id)
    {
        $cardDoc = CardServiceDoc::findOrfail($id);
        $cardDoc->delete();
        return redirect()->back();
    }

    // faq card
    public function faqsIndex()
    {
        $faqs = CardServiceFaq::all();
        return view('admin.cards.faqs.index',compact('faqs'));
    }
    
    public function faqsCreate(){
        $cards = CardService::all();
        return view('admin.cards.faqs.create',compact('cards'));
    }

    public function faqsStore(Request $request){
        $cardServiceId = $request->card_service_id;
        $faq = new CardServiceFaq();
        $faq->card_service_id = $cardServiceId;
        $faq->faq_title = $request->faq_title;
        $faq->faq_description = preg_replace('/\s+/', ' ', $request->faq_description);
        $faq->save();
        return redirect()->route('admin.cards.faqs.index');
    }

    public function faqsEdit($id)
    {
        $cardFaq = CardServiceFaq::findOrfail($id);
        $cards = CardService::all();
        return view('admin.cards.faqs.edit', compact('cardFaq','cards'));
    }

    public function faqsUdpate(Request $request, $id)
    {
        $cardFaq = CardServiceFaq::findOrfail($id);

        $cardFaq->card_service_id = $request->card_service_id;
        $cardFaq->faq_title = $request->faq_title;
        $cardFaq->faq_description = preg_replace('/\s+/', ' ', $request->faq_description);
        $cardFaq->update();

        return redirect()->route('admin.cards.faqs.index')->with('success','Card Faq Successfully Updated!');
    }

    public function faqsDestroy($id)
    {
        $cardFaq = CardServiceFaq::findOrfail($id);
        $cardFaq->delete();
        return redirect()->back();
    }
}
