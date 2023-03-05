<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PagesController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\Front\CardServiceController;

// use App\Http\Controllers\Admin\CardServiceController;

// Frontend


Route::group(['middleware' => ['prevent-back-history']], function(){
    Auth::routes();
});

Route::group(['as' => 'front.'], function(){
    // card service
    Route::get('/', [HomeController::class, 'home'])->name('home');
    // loan service
    Route::get('/personal-loan', [CardServiceController::class, 'getPersonalLoan'])->name('personal.loan');
    Route::get('/apply-now', [FrontendController::class,'getApplyForm'])->name('gapply');
    Route::post('/apply-now', [FrontendController::class,'storeApplyForm'])->name('store.apply');
    Route::post('/life-general-form', [FrontendController::class,'storeLifeGeneralForm'])->name('insurance_lg.apply');
    Route::get('/thank_you', [FrontendController::class,'getThankyouPage'])->name('thanks.page');
    Route::get('/emi-calculator', [FrontendController::class, 'emiCalculator'])->name('tools.emi');
    Route::get('/exchange-rates', [FrontendController::class, 'exchangeRate'])->name('tools.exchange_rate');
});

Route::get('/credit-cards/{page}', [PagesController::class, 'showCard'])->name('cards.page.url');
Route::get('/loans/{page}', [PagesController::class, 'showLoan'])->name('loans.page.url');
Route::get('/insurances/{page}', [PagesController::class, 'showInsurance'])->name('insurances.page.url');
Route::get('/insurances/{page}/{post}', [PagesController::class, 'showInsurancePost'])->name('insurances.post.url');
Route::get('/blog',[PagesController::class, 'showBlogs'])->name('blog.page');
Route::get('/privacy-policy',[PagesController::class,'showPolicyPage'])->name('page.policy');
Route::get('/terms-condition',[PagesController::class,'showTermsPage'])->name('page.terms');
Route::get('/disclaimer',[PagesController::class,'showDisclaimerPage'])->name('page.disclaimer');
Route::get('/complaints',[PagesController::class,'showComplaintsPage'])->name('page.complaints');
Route::get('/compare',[PagesController::class, 'serviceCompare'])->name('service.compare');
Route::get('{page}',[PagesController::class, 'showPage'])->name('pages.url');
Route::get('career/{slug}',[PagesController::class, 'showDetailsCircular'])->name('circular.url');
Route::get('/blog/{url}',[PagesController::class, 'singlePost'])->name('post.url');
Route::post('/comments',[CommentController::class,'commentStore'])->name('comment.store');


Route::group(['prefix' => 'editor', 'as' => 'editor.'], function ()
{

});

Route::group(['prefix' => 'user', 'as' => 'user.','middleware' => ['auth','isUser','prevent-back-history']],function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

Route::group(['prefix' => 'vendor', 'as' => 'vendor'],function (){

});

