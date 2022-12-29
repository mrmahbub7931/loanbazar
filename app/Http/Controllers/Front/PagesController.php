<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Post;
use App\Models\Circular;
use App\Models\Insurance;
use App\Models\CardService;
use Illuminate\Http\Request;
use App\Models\InsurancePost;
use App\Models\CardServiceRow;
use App\Models\LoanServiceRow;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function showCard($page)
    {
        // return $page;
        $card = DB::table('card_services')->where(['slug' => $page])->select('card_services.*')->first();
        // dd($card);
        $cardRows = DB::table('card_services')->where(['slug' => $page])->join('card_service_rows','card_services.id','=','card_service_rows.card_service_id')->select('card_service_rows.*')->get();
        $cardDoc = DB::table('card_services')->where(['slug' =>$page])->join('card_service_docs','card_services.id','=','card_service_docs.card_service_id')->select('card_service_docs.*')->first();
        $cardFaq = DB::table('card_services')->where(['slug' =>$page])->join('card_service_faqs','card_services.id','=','card_service_faqs.card_service_id')->select('card_service_faqs.*')->first();
        return view('frontend.pages.card.cards', compact('card','cardRows','cardFaq','cardDoc'));
    }
    public function showLoan($page)
    {
        // return $page;
        $loan = DB::table('loan_services')->where(['slug' => $page])->select('loan_services.*')->first();
        // dd($loan);
        $loanRows = DB::table('loan_services')->where(['slug' => $page])->join('loan_service_rows','loan_services.id','=','loan_service_rows.loan_service_id')->select('loan_service_rows.*')->get();
        $loanDoc = DB::table('loan_services')->where(['slug' =>$page])->join('loan_service_docs','loan_services.id','=','loan_service_docs.loan_service_id')->select('loan_service_docs.*')->first();
        $loanFaq = DB::table('loan_services')->where(['slug' =>$page])->join('loan_service_faqs','loan_services.id','=','loan_service_faqs.loan_service_id')->select('loan_service_faqs.*')->first();
        return view('frontend.pages.loan.loans', compact('loan','loanRows','loanDoc','loanFaq'));
    }

    public function showInsurance($page)
    {
        $insurance = Insurance::where('url','=',$page)->first();
        $insurancePosts =  $insurance->getInsurancePosts;
        return view('frontend.pages.insurance', compact('insurance','insurancePosts'));
    }

    public function showInsurancePost($page, $post)
    {
        $insurance = Insurance::where('url','=',$page)->first();
        $singlePost = InsurancePost::where([
            ['insurance_id', '=', $insurance->id],
            ['url', '=', $post]
        ])->first();

        return view('frontend.pages.insurance_post',compact('singlePost'));
    }

    /**
     * Display About, Career, Team, Contact page
     * @param $page
     */
    public function showPage($page)
    {
        $page = Page::where('url','=',$page)->first();
        return view('frontend.pages.page',compact('page'));
    }

    public function showDetailsCircular($slug)
    {
        $circular = Circular::where('slug',$slug)->first();
        return view('frontend.pages.single-circular',compact('circular'));
    }

    public function serviceCompare(Request $request)
    {
        $itemID =  $request->serviceItem;
        $type =  $request->type;
        if ($type == 'cards') {
            $data = CardServiceRow::whereIn('id',$itemID)->select('bank_name','interest_period','annual_fee','card_processing','free_supplementary_card','withdrawl_limit','card_image','fees_charges','features','eligibility')->get();
            return response()->json([
                'data' => $data,
                'header' => [
                    'card_image' => 'image',
                    'bank_name' => 'Bank Name',
                    'interest_period' => 'Interest Rate',
                    'annual_fee' => 'Annual Fee',
                    'card_processing' => 'Card Processing',
                    'free_supplementary_card' => 'Free Supplementary Card',
                    'withdrawl_limit' => 'Withdrawl Limit',
                    'eligibility'  => 'Eligibility',
                    'fees_charges'  => 'Fees & Charges',
                    'features'  => 'Features',
                ]
            ]);
        }else {
            $data = LoanServiceRow::whereIn('id',$itemID)->select('ineterest_rate_range','bank_name','processing_fee','loan_amount','loan_tenure','bank_logo','fees_charges','features','eligibility')->get();
            return response()->json([
                'data' => $data,
                'header' => [
                    'bank_logo' => 'image',
                    'bank_name' => 'Bank Name',
                    'ineterest_rate_range' => 'Ineterest Rate',
                    'processing_fee' => 'Processing Fee',
                    'loan_amount' => 'Loan Amount',
                    'loan_tenure' => 'Loan Tenure',
                    'eligibility'  => 'Eligibility',
                    'fees_charges'  => 'Fees & Charges',
                    'features'  => 'Features',
                ]
            ]);
        }
    }

    /**
     * It takes the slug from the URL and uses it to find the post in the database
     * 
     * @param url The URL of the post.
     */
    public function singlePost($url)
    {
        $post = Post::where('slug',$url)->first();
        return view('frontend.pages.single-post',compact('post'));
    }

    /**
     * It fetches all the posts from the database and paginates them by 10
     */
    public function showBlogs()
    {
        $posts = Post::paginate(10);
        return view('frontend.pages.page-blog',compact('posts'));
    }

    /**
     * It returns the view `frontend.pages.policy`
     * 
     * @return A view
     */
    public function showPolicyPage()
    {
        return view('frontend.pages.policy');
    }
    
    public function showTermsPage()
    {
        return view('frontend.pages.terms');
    }
}