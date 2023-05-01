<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Slider;
use App\Models\Counter;
use App\Models\BestDeal;
use App\Models\DealBody;
use App\Models\HomeImage;
use App\Models\BestService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CorporatePartners;
use App\Models\FinancialPartners;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdminHomePageController extends Controller
{
    public function getSliderList()
    {
        Gate::authorize('app.sliders.index');
        $sliders = Slider::all();

        return view('admin.slider.index', compact('sliders'));
    }
    public function createSliderForm()
    {
        Gate::authorize('app.sliders.create');
        return view('admin.slider.create');
    }

    public function storeSlider(Request $request)
    {
        Gate::authorize('app.sliders.create');
        $this->validate($request, [
            'title'     => 'required|string',
            'description'     => 'required',
            'btn_txt'     => 'required',
            'slider_image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $slider_image = $request->file('slider_image');

        if (isset($slider_image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$slider_image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/slider')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/slider');
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/slider/',$slider_image,$imagename);
        }

        $slider = new Slider();
        $slider->user_id = Auth::user()->id;
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image_src = $imagename;
        $slider->btn_txt = $request->btn_txt;
        $slider->btn_url = $request->btn_url;
        $slider->status = $request->status;

        $slider->save();
        return redirect()->route('admin.getslider');
    }

    public function editSliderForm($id)
    {
        Gate::authorize('app.sliders.edit');
        $slider = Slider::findOrfail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function updateSlider(Request $request, $id)
    {
        Gate::authorize('app.sliders.edit');
        $slider = Slider::findOrfail($id);

        // dd($request->all());

        $slider->title = $request->title;
        $slider->description = $request->description;

        $slider_image = $request->file('slider_image');
        $old_image = $slider->image_src;

        if (isset($slider_image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$slider_image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/slider')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/slider');
            }

            if (Storage::disk('public')->exists('frontend/assets/img/slider/'.$old_image)) {
                Storage::disk('public')->delete('frontend/assets/img/slider/'.$old_image);
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/slider/',$slider_image,$imagename);
            $slider->image_src = $imagename;
        }

        $slider->btn_txt = $request->btn_txt;
        $slider->btn_url = $request->btn_url;
        if ($request->status) {
            $slider->status = $request->status;
        }else {
            $slider->status = false;
        }



        $slider->update();
        return redirect()->route('admin.getslider');

    }

    public function deleteSlider($id){
        Gate::authorize('app.sliders.destroy');
        $slider = Slider::findOrfail($id);
        $slider->delete();
        return redirect()->back();
    }

    // Best Deals methods

    public function getDeals()
    {
        Gate::authorize('app.deals.index');
        $deals = BestDeal::all();
        return view('admin.deals.index', compact('deals'));
    }

    public function createDeals()
    {
        Gate::authorize('app.deals.create');
        return view('admin.deals.create');
    }

    public function storeDeals(Request $request)
    {
        Gate::authorize('app.deals.create');
        $this->validate($request, [
            'title'     => 'required|string',
            'btn_txt'     => 'required',
            'deal_image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $deal_image = $request->file('deal_image');

        if (isset($deal_image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$deal_image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/deals')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/deals');
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/deals/',$deal_image,$imagename);
        }

        $deals = new BestDeal();
        $deals->user_id = Auth::user()->id;
        $deals->title = $request->title;




        $deals->btn_txt = $request->btn_txt;
        $deals->btn_url = $request->btn_url;
        if ($request->status) {
            $deals->status = $request->status;
        }
        $deals->img_src = $imagename;
        $deals->save();

        DealBody::create([
            'best_deal_id' => $deals->id,
            'body' => json_encode($request->body),
        ]);


        return redirect()->route('admin.deals.index');
    }

    public function editeDeals($id)
    {
        Gate::authorize('app.deals.edit');
        $deal =BestDeal::findOrfail($id);
        $dealsBody = $deal->getDealsBody;
        return view('admin.deals.edit', compact('deal','dealsBody'));
    }

    public function updateDeals(Request $request, $id)
    {
        Gate::authorize('app.deals.edit');
        $deal = BestDeal::findOrfail($id);

        $deal_image = $request->file('deal_image');
        $old_image = $deal->img_src;
        if (isset($deal_image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$deal_image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/deals')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/deals');
            }

            if (Storage::disk('public')->exists('frontend/assets/img/deals/'.$old_image)) {
                Storage::disk('public')->delete('frontend/assets/img/deals/'.$old_image);
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/deals/',$deal_image,$imagename);
            $deal->img_src = $imagename;
        }

        $deal->title = $request->title;

        $deal->btn_txt = $request->btn_txt;
        $deal->btn_url = $request->btn_url;
        if ($request->status) {
            $deal->status = $request->status;
        }else{
            $deal->status = false;
        }

        $deal->update();

        DB::table('deal_bodies')
        ->where('best_deal_id', $id)
        ->update(['best_deal_id' => $id, 'body' => json_encode($request->body)]);

        return redirect()->route('admin.deals.index');
    }

    public function deleteDeals($id)
    {
        Gate::authorize('app.deals.destroy');
        $deal = BestDeal::findOrfail($id);
        $old_image = $deal->img_src;
        if (Storage::disk('public')->exists('frontend/assets/img/deals/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/deals/'.$old_image);
        }
        $deal->delete();
        return redirect()->back();
    }

    // Best Services

    public function getservices()
    {
        Gate::authorize('app.services.index');
        $services = BestService::all();
        return view('admin.services.index', compact('services'));
    }

    public function createservices()
    {
        Gate::authorize('app.services.create');
        return view('admin.services.create');
    }

    public function storeservices(Request $request)
    {
        Gate::authorize('app.services.create');
        $this->validate($request, [
            'title'     => 'required|string',
            'url'       => 'required',
            'btn_txt'     => 'required',
            'short_desc'     => 'required',
            'icon_image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);


        $icon_image = $request->file('icon_image');

        if (isset($icon_image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$icon_image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/services')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/services');
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/services/',$icon_image,$imagename);

        }

        $service = new BestService();
        $service->user_id = Auth::user()->id;
        $service->title = $request->title;
        $service->url = $request->url;
        $service->short_desc = $request->short_desc;
        $service->btn_text = $request->btn_txt;
        if ($request->status) {
            $service->status = $request->status;
        }
        if(!empty($imagename)){
            $service->icon_image = $imagename;
        }
        $service->save();

        return redirect()->route('admin.services.index');
    }

    public function editeservices($id)
    {
        Gate::authorize('app.services.edit');
        $service = BestService::findOrfail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function updateservices(Request $request, $id)
    {
        Gate::authorize('app.services.edit');
        // return $request->all();
        $service = BestService::findOrfail($id);

        $icon_image = $request->file('icon_image');
        $old_image = $service->icon_image;
        if (isset($icon_image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$icon_image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/services')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/services');
            }

            if (Storage::disk('public')->exists('frontend/assets/img/services/'.$old_image)) {
                Storage::disk('public')->delete('frontend/assets/img/services/'.$old_image);
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/services/',$icon_image,$imagename);
            if(!empty($imagename)){
                $service->icon_image = $imagename;
            }
        }


        $service->user_id = Auth::user()->id;
        $service->title = $request->title;
        $service->url = $request->url;
        $service->short_desc = $request->short_desc;
        $service->btn_txt = $request->btn_txt;
        if ($request->status) {
            $service->status = $request->status;
        }
        if(!empty($imagename)){
            $service->icon_image = $imagename;
        }
        $service->update();

        return redirect()->route('admin.services.index');
    }

    public function deleteservices($id)
    {
        Gate::authorize('app.services.destroy');
        $service = BestService::findOrfail($id);
        $old_image = $service->service_cover_img;
        if (Storage::disk('public')->exists('frontend/assets/img/services/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/services/'.$old_image);
        }
        $service->delete();
        return redirect()->back();
    }

    // Homepage large image method
    public function homeimgIndex()
    {
        Gate::authorize('app.limage.index');
        $homeimages = HomeImage::all();
        return view('admin.homeimg.index',compact('homeimages'));
    }

    public function homeimgCreate()
    {
        Gate::authorize('app.limage.create');
        return view('admin.homeimg.create');
    }

    public function homeimgStore(Request $request)
    {
        Gate::authorize('app.limage.create');
        $this->validate($request, [
            'image_title'   => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $image = new HomeImage();
        $image->image_title = $request->image_title;

        $large_image = $request->file('image');
        if (isset($large_image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$large_image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/homeimg')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/homeimg');
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/homeimg/',$large_image,$imagename);
            $image->image = $imagename;
            $image->user_id = Auth::user()->id;

            $image->save();
        }

        return redirect()->route('admin.homeimg.index');
    }

    public function homeimgEdit($id)
    {
        Gate::authorize('app.limage.edit');
        $image = HomeImage::findOrfail($id);
        return view('admin.homeimg.edit',compact('image'));
    }

    public function homeimgUpdate(Request $request,$id)
    {
        Gate::authorize('app.limage.edit');
        $image = HomeImage::findOrfail($id);
        $old_image = $image->image;

        $image->image_title = $request->image_title;
        $large_image = $request->file('image');
        if (isset($large_image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$large_image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/homeimg')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/homeimg');
            }

            if (Storage::disk('public')->exists('frontend/assets/img/homeimg/'.$old_image)) {
                Storage::disk('public')->delete('frontend/assets/img/homeimg/'.$old_image);
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/homeimg/',$large_image,$imagename);
            $image->image = $imagename;
            $image->user_id = Auth::user()->id;
            $image->update();
        }

        return redirect()->route('admin.homeimg.index');
    }

    public function homeimgDelete($id)
    {
        Gate::authorize('app.limage.destroy');
        $image = HomeImage::findOrfail($id);
        $old_image = $image->image;
        if (Storage::disk('public')->exists('frontend/assets/img/homeimg/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/homeimg/'.$old_image);
        }
        $image->delete();
        return redirect()->back();
    }

    // Countner

    /**
     * It returns the view of the counters index page.
     */
    public function countersIndex()
    {
        Gate::authorize('app.counters.index');
        $counters = Counter::all();
        return view('admin.counters.index',compact('counters'));
    }

    /**
     * > This function returns the view `admin.counters.create`
     *
     * @return A view
     */
    public function countersCreate()
    {
        Gate::authorize('app.counters.create');
        return view('admin.counters.create');
    }

    /**
     * It validates the request, creates a new counter object, assigns the values from the request to
     * the object, and saves the object to the database
     *
     * @param Request request This is the request object that contains all the data that was submitted
     * from the form.
     */
    public function countersStore(Request $request)
    {
        Gate::authorize('app.counters.create');
        $this->validate($request, [
            'title'                 => 'required|string',
            'card_disbursed'        => 'required',
            'client_served'         => 'required',
            'loan_disbursed'        => 'required',
        ]);

        $counter = new Counter();
        $counter->title = $request->title;
        $counter->user_id = Auth::user()->id;
        $counter->card_disbursed = $request->card_disbursed;
        $counter->client_served = $request->client_served;
        $counter->loan_disbursed = $request->loan_disbursed;
        $counter->save();

        return redirect()->route('admin.counters.index');
    }

    /**
     * A function that is used to edit the counter.
     *
     * @param id The id of the counter you want to edit.
     */
    public function countersEdit($id)
    {
        Gate::authorize('app.counters.edit');
        $counter = Counter::findOrfail($id);
        return view('admin.counters.edit',compact('counter'));
    }

    /**
     * It takes the request from the form, finds the counter with the id, updates the counter with the
     * new data and redirects to the index page
     *
     * @param Request request This is the request object that contains the data that was submitted from
     * the form.
     * @param id The id of the counter you want to update.
     */
    public function countersUpdate(Request $request,$id)
    {
        Gate::authorize('app.counters.edit');
        $counter = Counter::findOrfail($id);
        $counter->title = $request->title;
        $counter->user_id = Auth::user()->id;
        $counter->card_disbursed = $request->card_disbursed;
        $counter->client_served = $request->client_served;
        $counter->loan_disbursed = $request->loan_disbursed;
        $counter->update();

        return redirect()->route('admin.counters.index');
    }

    /**
     * It finds the counter with the given id and deletes it
     *
     * @param id The id of the counter you want to delete.
     */
    public function countersDelete($id)
    {
        Gate::authorize('app.counters.destroy');
        Counter::findOrfail($id)->delete();
        return redirect()->back();
    }

    // Corporate partner method

    /**
     * It returns the view of the corporates index page.
     *
     * @return A view called admin.corporates.index with the variable
     */
    public function corporatesIndex()
    {
        Gate::authorize('app.corporates.index');
        $corporates = CorporatePartners::latest()->get();
        return view('admin.corporates.index',compact('corporates'));
    }

    /**
     * > This function returns the view `admin.corporates.create`
     *
     * @return A view called 'admin.corporates.create'
     */
    public function corporatesCreate()
    {
        Gate::authorize('app.corporates.create');
        return view('admin.corporates.create');
    }

    public function corporatesStore(Request $request)
    {
        Gate::authorize('app.corporates.create');
        $this->validate($request,[
            'name' => 'required|string',
            'corporate_logo' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $clogo = new CorporatePartners();
        $clogo->user_id = Auth()->user()->id;
        $clogo->name = $request->name;
        $corporate_logo = $request->file('corporate_logo');
        if (isset($corporate_logo)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$corporate_logo->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/corporates')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/corporates');
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/corporates/',$corporate_logo,$imagename);
            $clogo->corporate_logo = $imagename;
        }

        $clogo->save();
        return redirect()->route('admin.corporates.index');
    }

    public function corporatesEdit($id)
    {
        Gate::authorize('app.corporates.edit');
        $corporate = CorporatePartners::findOrFail($id);
        return view('admin.corporates.edit',compact('corporate'));
    }

    public function corporatesUpdate(Request $request,$id)
    {
        Gate::authorize('app.corporates.edit');
        $clogo = CorporatePartners::findOrfail($id);
        $old_image = $clogo->corporate_logo;
        $clogo->user_id = Auth()->user()->id;
        $clogo->name = $request->name;
        $corporate_logo = $request->file('corporate_logo');
        if (isset($corporate_logo)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$corporate_logo->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/corporates')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/corporates');
            }

            if (Storage::disk('public')->exists('frontend/assets/img/corporates/'.$old_image)) {
                Storage::disk('public')->delete('frontend/assets/img/corporates/'.$old_image);
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/corporates/',$corporate_logo,$imagename);
            $clogo->corporate_logo = $imagename;
        }

        $clogo->update();
        return redirect()->route('admin.corporates.index');
    }

    public function corporatesDelete($id)
    {
        Gate::authorize('app.corporates.destroy');
        $corporate = CorporatePartners::findOrfail($id);
        $old_image = $corporate->corporate_logo;
        if (Storage::disk('public')->exists('frontend/assets/img/corporates/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/corporates/'.$old_image);
        }
        $corporate->delete();
        return redirect()->back();
    }

    // Financial Logo method
    public function financialIndex()
    {
        Gate::authorize('app.financials.index');
        $financials = FinancialPartners::latest()->get();
        return view('admin.financials.index',compact('financials'));
    }

    /**
     * > This function returns the view `admin.corporates.create`
     *
     * @return A view called 'admin.corporates.create'
     */
    public function financialCreate()
    {
        Gate::authorize('app.financials.create');
        return view('admin.financials.create');
    }

    public function financialStore(Request $request)
    {
        Gate::authorize('app.financials.create');
        $this->validate($request,[
            'name' => 'required|string',
            'financial_logo' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $flogo = new FinancialPartners();
        $flogo->user_id = Auth()->user()->id;
        $flogo->name = $request->name;
        $financial_logo = $request->file('financial_logo');
        if (isset($financial_logo)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$financial_logo->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/financials')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/financials');
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/financials/',$financial_logo,$imagename);
            $flogo->financial_logo = $imagename;
        }

        $flogo->save();
        return redirect()->route('admin.financial.index');
    }

    public function financialEdit($id)
    {
        Gate::authorize('app.financials.edit');
        $financial = FinancialPartners::findOrFail($id);
        return view('admin.financials.edit',compact('financial'));
    }

    public function financialUpdate(Request $request,$id)
    {
        Gate::authorize('app.financials.edit');
        $flogo = FinancialPartners::findOrfail($id);
        $old_image = $flogo->financial_logo;
        $flogo->user_id = Auth()->user()->id;
        $flogo->name = $request->name;
        $financial_logo = $request->file('financial_logo');
        if (isset($financial_logo)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.uniqid().'.'.$financial_logo->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('frontend/assets/img/financials')) {
                Storage::disk('public')->makeDirectory('frontend/assets/img/financials');
            }

            if (Storage::disk('public')->exists('frontend/assets/img/financials/'.$old_image)) {
                Storage::disk('public')->delete('frontend/assets/img/financials/'.$old_image);
            }
            // $image = Image::make($slider_image)->resize(450, 500)->save($imagename,80);
            Storage::disk('public')->putFileAs('frontend/assets/img/financials/',$financial_logo,$imagename);
            $flogo->financial_logo = $imagename;
        }

        $flogo->update();
        return redirect()->route('admin.financial.index');
    }

    public function financialDelete($id)
    {
        Gate::authorize('app.financials.destroy');
        $financial = FinancialPartners::findOrfail($id);
        $old_image = $financial->financial_logo;
        if (Storage::disk('public')->exists('frontend/assets/img/financials/'.$old_image)) {
            Storage::disk('public')->delete('frontend/assets/img/financials/'.$old_image);
        }
        $financial->delete();
        return redirect()->back();
    }
}

