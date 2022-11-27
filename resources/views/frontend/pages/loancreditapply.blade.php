@extends('frontend.layouts.master')

@section('title', 'Apply')

@push('style')
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/select2.min.css') }}" type="text/css" media="all">
@endpush

@section('content')
<section class="wrapper bg-soft-light lb__page__header visa__card">
    <div class="container py-12 py-md-12">
        <div class="row text-center">
            <div class="col-12">
                <div class="content">
                    <h1 class="text-white fs-40">Apply Now</h1>
                    <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste deleniti sit
                        animi adipisci nesciunt corporis error voluptatum, ratione in deserunt. Voluptates delectus
                        ipsum sunt? Harum omnis cupiditate voluptas atque fugit?</p>
                    <ul class="lb__breadcrumb">
                        <li><a href="#"><i class="uil uil-home"></i> Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Apply now</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-12 wrapper apply__section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <div class="apply_form__body">
                    <div class="card">
                        <div class="card-header">
                            @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                            {{-- <p> <strong>Apply Form for Loan & Credit Card</strong> </p> --}}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('front.store.apply') }}" method="POST" id="lc__apply__form" class="lc__apply__form">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="type_of_aplication">Application Type</label>
                                            <select class="form-select" id="type_of_aplication" name="type">
                                                <option value="">Select your Application Type</option>
                                                <option value="card">Credit Card</option>
                                                <option value="loan">Loan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="input-group type_of_loan_visible">
                                            <label for="type_of_loan">Select your loan</label>
                                            <select name="loan_name" class="form-select" id="loan_option">
                                                <option value="">Select your loan</option>
                                                <option value="Personal Loan">Personal Loan</option>
                                                <option value="Home Loan">Home Loan</option>
                                                <option value="Car Loan">Car Loan</option>
                                                <option value="SME Loan">SME Loan</option>
                                                <option value="Bike Loan">Bike Loan</option>
                                            </select>
                                        </div>

                                        <div class="input-group type_of_card_visible">
                                            <label for="type_of_card">Select your desired credit card</label>
                                            <select name="card_name" class="form-select" id="card_option">
                                                <option value="">Select your Card</option>
                                                <option value="Visa Credit Card">Visa Credit Card</option>
                                                <option value="Master Card">Master Card</option>
                                                <option value="AMEX (American Express)">AMEX (American Express)</option>
                                                <option value="Co-Brand Card">Co-Brand Card</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="full_name">Your full name</label>
                                            <div class="input_icon">
                                                <input type="text" name="full_name" class="form-control" id="full_name"
                                                    placeholder="Enter your full name">
                                                <i class="uil uil-chat-bubble-user"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="phone">Your contact number</label>
                                            <div class="input_icon">
                                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your contact number">
                                                <i class="uil uil-outgoing-call"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="date_of_birth">Date of birth</label>
                                            <div class="input_icon">
                                                <input type="text" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="Ex: dd/mm/yyyy">
                                                <i class="uil uil-calender"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="email">Your email address</label>
                                            <div class="input_icon">
                                                <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email address">
                                                <i class="uil uil-envelope-add"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="present_address">Your present address</label>
                                            <div class="input_icon">
                                                <input type="text" name="present_address" class="form-control" id="present_address" placeholder="Enter present address">
                                                <i class="uil uil-location"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="profession_type">Select your profession</label>
                                            <select class="form-select" id="profession_type" name="profession">
                                                <option value="">Select your profession</option>
                                                <option value="salaried_person">Salaried Person</option>
                                                <option value="businessman">Businessman</option>
                                                <option value="landlord">Land Lord</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="salaried_person_row">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <label for="s_company_name">Your company name</label>
                                                <div class="input_icon">
                                                    <input type="text" name="company_name" class="form-control" id="s_company_name" placeholder="Enter company name">
                                                    <i class="uil uil-suitcase"></i>
                                                </div>
    
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <label for="s_designation">Your position / designation</label>
                                                <div class="input_icon">
                                                    <input type="text" name="s_designation" class="form-control" id="s_designation" placeholder="Enter your designation">
                                                    <i class="uil uil-crosshairs"></i>
                                                </div>
    
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <label for="s_monthly_salary">Your monthly salary</label>
                                                <div class="input_icon">
                                                    <input type="text" name="monthly_salary" class="form-control" id="s_monthly_salary" placeholder="Enter your monthly salary">
                                                    <i class="uil uil-usd-circle"></i>
                                                </div>
    
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <label for="salary_paid_by">Salary paid by</label>
                                                <select class="form-select" id="salary_paid_by" name="salary_paid_by">
                                                    <option value="">Salary paid by</option>
                                                    <option value="bank_acc">Bank account</option>
                                                    <option value="handcash">Hand cash</option>
                                                    <option value="cheque">Cheque</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="businessman_row">

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <label for="b_business_name">Your business name</label>
                                                <div class="input_icon">
                                                    <input type="text" name="business_name" class="form-control" id="b_business_name" placeholder="Enter your business name">
                                                    <i class="uil uil-analysis"></i>
                                                </div>
    
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <label for="b_business_type">Select your business type</label>
                                                <select class="form-select" id="b_business_type" name="business_type">
                                                    <option value="">Select your business type</option>
                                                    <option value="ltd_company">Ltd company</option>
                                                    <option value="proprietorship">Proprietorship</option>
                                                    <option value="partnership">Partnership</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <label for="designation">Your position / designation</label>
                                                <div class="input_icon">
                                                    <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter your designation">
                                                    <i class="uil uil-crosshairs"></i>
                                                </div>
    
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <label for="b_monthly_income">Your monthly income or yearly bank transaction</label>
                                                <div class="input_icon">
                                                    <input type="text" name="business_monthly_income" class="form-control" id="b_monthly_income" placeholder="Monthly income or yearly bank transaction">
                                                    <i class="uil uil-chart-line"></i>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="land_lord_row">

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <label for="l_house_type">Select your house type</label>
                                                <select class="form-select" id="l_house_type" name="house_type">
                                                    <option value="">Select your house type</option>
                                                    <option value="Tin shade house">Tin shade house</option>
                                                    <option value="Semi-Paka">Semi-Paka</option>
                                                    <option value="Building with plan">Building with plan</option>
                                                    <option value="Building without plan">Building without plan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <label for="l_rental_income">Monthly rental income</label>
                                                <div class="input_icon">
                                                    <input type="text" name="monthly_rental_income" class="form-control" id="l_rental_income" placeholder="Monthly rental income">
                                                    <i class="uil uil-money-bill"></i>
                                                </div>
    
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="existing_loan_card">Any existing loan or credit card?</label>
                                            
                                            <div class="form-check-group d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="existing_lc" id="existing_loan_yes" value="1">
                                                    <label class="form-check-label" for="existing_loan_yes"> Yes </label>
                                                </div>
                                                <div class="form-check mx-3">
                                                    <input class="form-check-input" type="radio" name="existing_lc" id="existing_loan_no" value="0">
                                                    <label class="form-check-label" for="existing_loan_no"> No </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="existing_loan_card">Do you have E-TIN?</label>
                                            
                                            <div class="form-check-group d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="existing_etin" id="etin_yes" value="1">
                                                    <label class="form-check-label" for="etin_yes"> Yes </label>
                                                </div>
                                                <div class="form-check mx-3">
                                                    <input class="form-check-input" type="radio" name="existing_etin" id="etin_no" value="0">
                                                    <label class="form-check-label" for="etin_no"> No </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <label for="user_note">Your message / Any Special note!</label>
                                            <div class="input_icon">
                                                <input type="text" class="form-control" id="user_note" placeholder="Enter your special note" name="user_note">
                                                <i class="uil uil-comment-alt-message"></i>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @if (!Auth::check())
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="password">Enter your password</label>
                                            <div class="input_icon">
                                                <input type="password" class="form-control" id="password" placeholder="Enter your special note" name="password">
                                                <i class="uil uil-padlock"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="cpassword">Re-type your password</label>
                                            <div class="input_icon">
                                                <input type="password" class="form-control" id="cpassword" placeholder="Enter your special note" name="cpassword">
                                                <i class="uil uil-padlock"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endif
                                <br>
                                <div class="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="accept_privacy" checked="">
                                        <label class="form-check-label" for="accept_privacy">I authorize loan bazaar bd it's representatives to call or sms me. I agree to all terms, Conditions & privacy policy</label>
                                      </div>
                                </div>
                                <br>
                                <div class="row text-center">
                                    <div class="col-6 offset-3">
                                        <button type="submit" class="btn btn-sm btn__red"> Submit </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
<script>
    (function ($) {
        $(document).ready(function () {
            $("#loan_option").select2();
            $("#card_option").select2();
            $("#type_of_aplication").select2();
            $("#profession_type").select2();
            $("#salary_paid_by").select2();
            $("#b_business_type").select2();
            $("#l_house_type").select2();
            var loan, card, value, pvalue;
            loan = $('.type_of_loan_visible');
            card = $('.type_of_card_visible');
            $("#type_of_aplication").on("change", function () {
                value = $(this).find(':selected').val();
                if (value == "loan") {
                    card.css('display', 'none')
                    loan.css('display', 'block');
                } else if (value == "card") {
                    loan.css('display', 'none');
                    card.css('display', 'block')
                } else {
                    card.css('display', 'none')
                    loan.css('display', 'none');
                }
            });

            $("#profession_type").on("change", function () {
                pvalue = $(this).find(':selected').val();
                if (pvalue == "salaried_person") {
                    $('.land_lord_row').css('display', 'none')
                    $('.businessman_row').css('display', 'none');
                    $('.salaried_person_row').css('display', 'block');
                } else if (pvalue == "businessman") {
                    $('.land_lord_row').css('display', 'none')
                    $('.salaried_person_row').css('display', 'none');
                    $('.businessman_row').css('display', 'block');
                } else if(pvalue == "landlord") {
                    $('.salaried_person_row').css('display', 'none');
                    $('.businessman_row').css('display', 'none');
                    $('.land_lord_row').css('display', 'block');
                }else{
                    $('.salaried_person_row').css('display', 'none');
                    $('.businessman_row').css('display', 'none');
                    $('.land_lord_row').css('display', 'none');
                }
            });
        });
    })(jQuery);

</script>
@endpush
