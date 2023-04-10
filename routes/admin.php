<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WriterCotroller;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InsuranceController;
use App\Http\Controllers\Admin\AdminMediaController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\AdminCircularController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminCardServiceController;
use App\Http\Controllers\Admin\AdminLoanserviceController;
use App\Http\Controllers\Admin\AdminExchangeRateController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth','prevent-back-history','can:app.dashboard']], function ()
{
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/slider', [AdminHomePageController::class, 'getSliderList'])->name('getslider');
    Route::get('/slider/{id}/edit', [AdminHomePageController::class, 'editSliderForm'])->name('slider.edit');
    Route::get('/slider/create', [AdminHomePageController::class, 'createSliderForm'])->name('createSlider');
    Route::post('/slider', [AdminHomePageController::class, 'storeSlider'])->name('slider.store');
    Route::put('/slider/{id}', [AdminHomePageController::class, 'updateSlider'])->name('slider.update');
    Route::delete('/slider/{id}', [AdminHomePageController::class, 'deleteSlider'])->name('slider.delete');
    // Best Deals
    Route::get('/deals', [AdminHomePageController::class, 'getDeals'])->name('deals.index');
    Route::get('/deals/create', [AdminHomePageController::class, 'createDeals'])->name('deals.create');
    Route::get('/deals/{id}/edit', [AdminHomePageController::class, 'editeDeals'])->name('deals.edit');
    Route::post('/deals', [AdminHomePageController::class, 'storeDeals'])->name('deals.store');
    Route::put('/deals/{id}', [AdminHomePageController::class, 'updateDeals'])->name('deals.update');
    Route::delete('/deals/{id}', [AdminHomePageController::class, 'deleteDeals'])->name('deals.delete');
    // Best Services
    Route::get('/services', [AdminHomePageController::class, 'getservices'])->name('services.index');
    Route::get('/services/create', [AdminHomePageController::class, 'createservices'])->name('services.create');
    Route::get('/services/{id}/edit', [AdminHomePageController::class, 'editeservices'])->name('services.edit');
    Route::post('/services', [AdminHomePageController::class, 'storeservices'])->name('services.store');
    Route::put('/services/{id}', [AdminHomePageController::class, 'updateservices'])->name('services.update');
    Route::delete('/services/{id}', [AdminHomePageController::class, 'deleteservices'])->name('services.delete');
    // Application Controller for loan
    Route::get('application/loan', [ApplicationController::class, 'index'])->name('application.loan.index');
    Route::get('application/card', [ApplicationController::class, 'cardIndex'])->name('application.card.index');
    Route::get('/application/{id}', [ApplicationController::class, 'edit'])->name('application.edit');
    Route::put('/application/{id}', [ApplicationController::class, 'update'])->name('application.update');
    Route::delete('/application/{id}', [ApplicationController::class, 'destroy'])->name('application.destroy');

    // Life and General Insurance
    Route::get('applications/life-general-insurance', [ApplicationController::class, 'lifegeneralIndex'])->name('application.life.index');
    Route::get('/applications/life-general-insurance/{id}/edit', [ApplicationController::class, 'lifegeneralEdit'])->name('application.life.edit');
    Route::put('/applications/life-general-insurance/{id}/update', [ApplicationController::class, 'lifegeneralUpdate'])->name('application.life.update');
    Route::delete('/applications/life-general-insurance/{id}/delete', [ApplicationController::class, 'lifegeneralDestroy'])->name('application.life.destroy');
    // Bike and Car Insurance
    Route::get('applications/bike-car-insurance', [ApplicationController::class, 'transportIndex'])->name('application.transport.index');
    Route::get('/applications/bike-car-insurance/{id}/edit', [ApplicationController::class, 'transportEdit'])->name('application.transport.edit');
    Route::put('/applications/bike-car-insurance/{id}/update', [ApplicationController::class, 'transportUpdate'])->name('application.transport.update');
    Route::delete('/applications/bike-car-insurance/{id}/delete', [ApplicationController::class, 'transportDestroy'])->name('application.transport.destroy');

    // Card services
    Route::get('/card-services', [AdminCardServiceController::class, 'index'])->name('cards.index');
    Route::get('/card-service/create', [AdminCardServiceController::class, 'create'])->name('cards.create');
    Route::post('/card-service', [AdminCardServiceController::class, 'store'])->name('cards.store');
    Route::get('/card-service/{id}/edit', [AdminCardServiceController::class, 'edit'])->name('cards.edit');
    Route::put('/card-service/{id}', [AdminCardServiceController::class, 'udpate'])->name('cards.update');
    Route::delete('/card-service/{id}', [AdminCardServiceController::class, 'destroy'])->name('cards.delete');

    // Card services required docs
    Route::get('/card-service/docs', [AdminCardServiceController::class, 'docsIndex'])->name('cards.docs.index');
    Route::get('/card-service/docs/create', [AdminCardServiceController::class, 'docsCreate'])->name('cards.docs.create');
    Route::post('/card-service/docs', [AdminCardServiceController::class, 'docsStore'])->name('cards.docs.store');
    Route::get('/card-service/docs/{id}/edit', [AdminCardServiceController::class, 'docsEdit'])->name('cards.docs.edit');
    Route::put('/card-service/docs/{id}', [AdminCardServiceController::class, 'docsUdpate'])->name('cards.docs.update');
    Route::delete('/card-service/docs/{id}', [AdminCardServiceController::class, 'docsDestroy'])->name('cards.docs.delete');

    // card service faq
    Route::get('/card-service/faqs', [AdminCardServiceController::class, 'faqsIndex'])->name('cards.faqs.index');
    Route::get('/card-service/faqs/create', [AdminCardServiceController::class, 'faqsCreate'])->name('cards.faqs.create');
    Route::post('/card-service/faqs', [AdminCardServiceController::class, 'faqsStore'])->name('cards.faqs.store');
    Route::get('/card-service/faqs/{id}/edit', [AdminCardServiceController::class, 'faqsEdit'])->name('cards.faqs.edit');
    Route::put('/card-service/faqs/{id}', [AdminCardServiceController::class, 'faqsUdpate'])->name('cards.faqs.update');
    Route::delete('/card-service/faqs/{id}', [AdminCardServiceController::class, 'faqsDestroy'])->name('cards.faqs.delete');

    // Loan services
    Route::get('/loan-services', [AdminLoanserviceController::class, 'index'])->name('loans.index');
    Route::get('/loan-service/create', [AdminLoanserviceController::class, 'create'])->name('loans.create');
    Route::post('/loan-service', [AdminLoanserviceController::class, 'store'])->name('loans.store');
    Route::get('/loan-service/{id}/edit', [AdminLoanserviceController::class, 'edit'])->name('loans.edit');
    Route::put('/loan-service/{id}', [AdminLoanserviceController::class, 'udpate'])->name('loans.update');
    Route::delete('/loan-service/{id}', [AdminLoanserviceController::class, 'destroy'])->name('loans.delete');

    // Loan services required docs
    Route::get('/loan-service/docs', [AdminLoanserviceController::class, 'docsIndex'])->name('loans.docs.index');
    Route::get('/loan-service/docs/create', [AdminLoanserviceController::class, 'docsCreate'])->name('loans.docs.create');
    Route::post('/loan-service/docs', [AdminLoanserviceController::class, 'docsStore'])->name('loans.docs.store');
    Route::get('/loan-service/docs/{id}/edit', [AdminLoanserviceController::class, 'docsEdit'])->name('loans.docs.edit');
    Route::put('/loan-service/docs/{id}', [AdminLoanserviceController::class, 'docsUdpate'])->name('loans.docs.update');
    Route::delete('/loan-service/docs/{id}', [AdminLoanserviceController::class, 'docsDestroy'])->name('loans.docs.delete');

    // loan service faq
    Route::get('/loan-service/faqs', [AdminLoanserviceController::class, 'faqsIndex'])->name('loans.faqs.index');
    Route::get('/loan-service/faqs/create', [AdminLoanserviceController::class, 'faqsCreate'])->name('loans.faqs.create');
    Route::post('/loan-service/faqs', [AdminLoanserviceController::class, 'faqsStore'])->name('loans.faqs.store');
    Route::get('/loan-service/faqs/{id}/edit', [AdminLoanserviceController::class, 'faqsEdit'])->name('loans.faqs.edit');
    Route::put('/loan-service/faqs/{id}', [AdminLoanserviceController::class, 'faqsUdpate'])->name('loans.faqs.update');
    Route::delete('/loan-service/faqs/{id}', [AdminLoanserviceController::class, 'faqsDestroy'])->name('loans.faqs.delete');

    // Insurance route
    Route::get('/insurances',[InsuranceController::class, 'index'])->name('insurance.index');
    Route::get('/insurances/create',[InsuranceController::class, 'create'])->name('insurance.create');
    Route::post('/insurance',[InsuranceController::class, 'store'])->name('insurance.store');
    Route::get('/insurances/{id}/edit',[InsuranceController::class, 'edit'])->name('insurance.edit');
    Route::put('/insurances/{id}',[InsuranceController::class, 'update'])->name('insurance.update');
    Route::delete('/insurances/{id}/delete',[InsuranceController::class, 'destroy'])->name('insurance.destroy');

    // Insurance post route
    Route::get('/insurances/posts/',[InsuranceController::class,'InsurancePostIndex'])->name('insurance.posts.index');
    Route::get('/insurances/post/create',[InsuranceController::class,'InsurancePostCreate'])->name('insurance.posts.create');
    Route::post('/insurances/post/',[InsuranceController::class,'InsurancePostStore'])->name('insurance.posts.store');
    Route::get('/insurances/post/{id}/edit',[InsuranceController::class,'InsurancePostEdit'])->name('insurance.posts.edit');
    Route::put('/insurances/post/{id}/update',[InsuranceController::class,'InsurancePostUpdate'])->name('insurance.posts.update');
    Route::delete('/insurances/post/{id}/update',[InsuranceController::class,'InsurancePostDestroy'])->name('insurance.posts.destroy');

    // Team route
    Route::get('/teams', [AdminTeamController::class,'index'])->name('teams.index');
    Route::get('/teams/create',[AdminTeamController::class,'create'])->name('teams.create');
    Route::post('/teams',[AdminTeamController::class,'store'])->name('teams.store');
    Route::get('/teams/{id}/edit',[AdminTeamController::class,'edit'])->name('teams.edit');
    Route::put('/teams/{id}/update',[AdminTeamController::class,'update'])->name('teams.update');
    Route::delete('/teams/{id}/delete',[AdminTeamController::class,'delete'])->name('teams.delete');

    // Post route
    Route::get('/posts', [PostController::class,'PostIndex'])->name('posts.index');
    Route::get('/posts/create', [PostController::class,'PostCreate'])->name('posts.create');
    Route::post('/posts',[PostController::class, 'PostStore'])->name('posts.store');
    Route::get('/posts/{id}/edit',[PostController::class, 'PostEdit'])->name('posts.edit');
    Route::put('/posts/{id}/update',[PostController::class,'PostUpdate'])->name('posts.update');
    Route::delete('/posts/{id}/delete', [PostController::class,'PostDelete'])->name('posts.delete');
    Route::get('/posts/{id}/approve',[PostController::class,'PostApprove'])->name('posts.approve');

    // Categories Route
    Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories',[CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit',[CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}/update',[CategoryController::class,'update'])->name('categories.update');
    Route::delete('/categories/{id}/delete', [CategoryController::class,'delete'])->name('categories.delete');

    // Tags Route

    // Writer Route
    Route::get('/writers', [WriterCotroller::class,'index'])->name('writers.index');
    Route::get('/writers/create', [WriterCotroller::class,'create'])->name('writers.create');
    Route::post('/writers',[WriterCotroller::class, 'store'])->name('writers.store');
    Route::get('/writers/{id}/edit',[WriterCotroller::class, 'edit'])->name('writers.edit');
    Route::put('/writers/{id}/update',[WriterCotroller::class,'update'])->name('writers.update');
    Route::delete('/writers/{id}/delete', [WriterCotroller::class,'delete'])->name('writers.delete');

    // Page route
    Route::get('/pages', [PageController::class,'PageIndex'])->name('page.index');
    Route::get('/pages/create', [PageController::class,'PageCreate'])->name('page.create');
    Route::post('/pages',[PageController::class, 'PageStore'])->name('page.store');
    Route::get('/pages/{id}/edit',[PageController::class, 'PageEdit'])->name('page.edit');
    Route::put('/pages/{id}/update',[PageController::class,'PageUpdate'])->name('page.update');
    Route::delete('/pages/{id}/delete', [PageController::class,'PageDelete'])->name('page.delete');

    // Job Circular Route
    Route::get('/circulars', [AdminCircularController::class,'index'])->name('circular.index');
    Route::get('/circulars/create', [AdminCircularController::class,'create'])->name('circular.create');
    Route::post('/circulars',[AdminCircularController::class, 'store'])->name('circular.store');
    Route::get('/circulars/{id}/edit',[AdminCircularController::class, 'edit'])->name('circular.edit');
    Route::put('/circulars/{id}/update',[AdminCircularController::class,'update'])->name('circular.update');
    Route::delete('/circulars/{id}/delete', [AdminCircularController::class,'delete'])->name('circular.delete');

    // Media Route
    Route::get('/media', [AdminMediaController::class,'index'])->name('media.index');
    Route::get('/media/create', [AdminMediaController::class,'create'])->name('media.create');
    Route::post('/media',[AdminMediaController::class, 'store'])->name('media.store');
    Route::delete('/media/{id}/delete', [AdminMediaController::class,'destroy'])->name('media.delete');

    // Exchange Rate route
    Route::get('/exchange_rate', [AdminExchangeRateController::class,'index'])->name('exchange_rate.index');
    Route::get('/exchange_rate/create', [AdminExchangeRateController::class,'create'])->name('exchange_rate.create');
    Route::post('/exchange_rate',[AdminExchangeRateController::class, 'store'])->name('exchange_rate.store');
    Route::get('/exchange_rate/{id}/edit',[AdminExchangeRateController::class,'edit'])->name('exchange_rate.edit');
    Route::put('/exchange_rate/{id}/update',[AdminExchangeRateController::class,'update'])->name('exchange_rate.update');
    Route::delete('/exchange_rate/{id}/delete', [AdminExchangeRateController::class,'destroy'])->name('exchange_rate.delete');

    // Review Route
    Route::get('/reviews', [ReviewController::class,'index'])->name('reviews.index');
    Route::get('/reviews/create', [ReviewController::class,'create'])->name('reviews.create');
    Route::post('/reviews',[ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{id}/edit',[ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{id}/update',[ReviewController::class,'update'])->name('reviews.update');
    Route::delete('/reviews/{id}/delete', [ReviewController::class,'delete'])->name('reviews.delete');

    // Homepage Large Image Route
    Route::get('/homeimg', [AdminHomePageController::class,'homeimgIndex'])->name('homeimg.index');
    Route::get('/homeimg/create', [AdminHomePageController::class,'homeimgCreate'])->name('homeimg.create');
    Route::post('/homeimg',[AdminHomePageController::class, 'homeimgStore'])->name('homeimg.store');
    Route::get('/homeimg/{id}/edit',[AdminHomePageController::class, 'homeimgEdit'])->name('homeimg.edit');
    Route::put('/homeimg/{id}/update',[AdminHomePageController::class,'homeimgUpdate'])->name('homeimg.update');
    Route::delete('/homeimg/{id}/delete', [AdminHomePageController::class,'homeimgDelete'])->name('homeimg.delete');

    // Counter Route
    Route::get('/counters', [AdminHomePageController::class,'countersIndex'])->name('counters.index');
    Route::get('/counters/create', [AdminHomePageController::class,'countersCreate'])->name('counters.create');
    Route::post('/counters',[AdminHomePageController::class, 'countersStore'])->name('counters.store');
    Route::get('/counters/{id}/edit',[AdminHomePageController::class, 'countersEdit'])->name('counters.edit');
    Route::put('/counters/{id}/update',[AdminHomePageController::class,'countersUpdate'])->name('counters.update');
    Route::delete('/counters/{id}/delete', [AdminHomePageController::class,'countersDelete'])->name('counters.delete');

    // Corporate Partners Route
    Route::get('/corporates', [AdminHomePageController::class,'corporatesIndex'])->name('corporates.index');
    Route::get('/corporates/create', [AdminHomePageController::class,'corporatesCreate'])->name('corporates.create');
    Route::post('/corporates',[AdminHomePageController::class, 'corporatesStore'])->name('corporates.store');
    Route::get('/corporates/{id}/edit',[AdminHomePageController::class, 'corporatesEdit'])->name('corporates.edit');
    Route::put('/corporates/{id}/update',[AdminHomePageController::class,'corporatesUpdate'])->name('corporates.update');
    Route::delete('/corporates/{id}/delete', [AdminHomePageController::class,'corporatesDelete'])->name('corporates.delete');

    // financial Partners Route
    Route::get('/financial', [AdminHomePageController::class,'financialIndex'])->name('financial.index');
    Route::get('/financial/create', [AdminHomePageController::class,'financialCreate'])->name('financial.create');
    Route::post('/financial',[AdminHomePageController::class, 'financialStore'])->name('financial.store');
    Route::get('/financial/{id}/edit',[AdminHomePageController::class, 'financialEdit'])->name('financial.edit');
    Route::put('/financial/{id}/update',[AdminHomePageController::class,'financialUpdate'])->name('financial.update');
    Route::delete('/financial/{id}/delete', [AdminHomePageController::class,'financialDelete'])->name('financial.delete');

    // Administration
    Route::resource('/roles',RoleController::class);
    Route::resource('/users',UserController::class);
});
