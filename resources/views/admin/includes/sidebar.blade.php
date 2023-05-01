<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('frontend/assets/img/logo.png') }}" class="logo-icon" alt="logo icon">
        </div>
        {{-- <div>
            <h4 class="logo-text">Loanbazar</h4>
        </div> --}}
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        {{-- @role('super-admin') --}}
        @can('app.sliders.index')
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Slider</div>
            </a>
            <ul>

                <li> <a href="{{route('admin.getslider')}}"><i class="bx bx-right-arrow-alt"></i>All Sliders</a>
                </li>
                @can('app.sliders.create')
                <li> <a href="{{route('admin.createSlider')}}"><i class="bx bx-right-arrow-alt"></i>Create</a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        @if (auth()->user()->can('app.deals.index') || auth()->user()->can('app.services.index') || auth()->user()->can('app.teams.index') || auth()->user()->can('app.reviews.index') || auth()->user()->can('app.homeimg.index') || auth()->user()->can('app.counters.index') || auth()->user()->can('app.corporates.index') || auth()->user()->can('app.financial.index') )
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-smile"></i>
                </div>
                <div class="menu-title">Home Page</div>
            </a>
            <ul>
                @can('app.deals.index')
                <li> <a href="{{route('admin.deals.index')}}"><i class="bx bx-right-arrow-alt"></i>Best Deals</a>
                </li>
                @endcan
                @can('app.services.index')
                <li> <a href="{{route('admin.services.index')}}"><i class="bx bx-right-arrow-alt"></i>Best Services</a>
                </li>
                @endcan
                @can('app.teams.index')
                <li> <a href="{{route('admin.teams.index')}}"><i class="bx bx-right-arrow-alt"></i>Teams</a>
                </li>
                @endcan
                @can('app.reviews.index')
                <li> <a href="{{route('admin.reviews.index')}}"><i class="bx bx-right-arrow-alt"></i>Reviews</a>
                </li>
                @endcan
                @can('app.limage.index')
                <li> <a href="{{route('admin.homeimg.index')}}"><i class="bx bx-right-arrow-alt"></i>Large Image</a>
                </li>
                @endcan
                @can('app.counters.index')
                <li> <a href="{{route('admin.counters.index')}}"><i class="bx bx-right-arrow-alt"></i>Counters</a>
                </li>
                @endcan
                @can('app.corporates.index')
                <li> <a href="{{route('admin.corporates.index')}}"><i class="bx bx-right-arrow-alt"></i>Corporates</a>
                </li>
                @endcan
                @can('app.financials.index')
                <li> <a href="{{route('admin.financial.index')}}"><i class="bx bx-right-arrow-alt"></i>Financials</a>
                </li>
                @endcan
            </ul>
        </li>
        @endif
        @if (auth()->user()->can('app.pages.index') || auth()->user()->can('app.pages.create')  )
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-bible"></i>
                </div>
                <div class="menu-title">Pages</div>
            </a>
            <ul>
                @can('app.pages.index')
                <li> <a href="{{route('admin.page.index')}}"><i class="bx bx-right-arrow-alt"></i>All Pages</a>
                </li>
                @endcan
                @can('app.pages.create')
                <li> <a href="{{route('admin.page.create')}}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                </li>
                @endcan
            </ul>
        </li>
        @endif
        @if (auth()->user()->can('app.posts.index') || auth()->user()->can('app.posts.create') || auth()->user()->can('app.categories.index') || auth()->user()->can('app.writers.index')  )
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-smile"></i>
                </div>
                <div class="menu-title">Posts</div>
            </a>
            <ul>
                @can('app.posts.index')
                <li> <a href="{{route('admin.posts.index')}}"><i class="bx bx-right-arrow-alt"></i>All Posts</a>
                </li>
                @endcan
                @can('app.posts.create')
                <li> <a href="{{route('admin.posts.create')}}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                </li>
                @endcan
                @can('app.categories.index')
                <li> <a href="{{route('admin.categories.index')}}"><i class="bx bx-right-arrow-alt"></i>Category</a>
                </li>
                @endcan
                @can('app.writers.index')
                <li> <a href="{{route('admin.writers.index')}}"><i class="bx bx-right-arrow-alt"></i>Writers</a>
                </li>
                @endcan
            </ul>
        </li>
        @endif
        @if (auth()->user()->can('app.exchange.index') || auth()->user()->can('app.exchange.create') )
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Tools</div>
            </a>
            <ul>
                @can('app.exchange.index')
                <li> <a href="{{route('admin.exchange_rate.index')}}"><i class="bx bx-right-arrow-alt"></i>All Exchange Rate</a>
                </li>
                @endcan
                @can('app.exchange.create')
                <li> <a href="{{route('admin.exchange_rate.create')}}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                </li>
                @endcan
            </ul>
        </li>
        @endif
        @if (auth()->user()->can('app.media.index') || auth()->user()->can('app.media.create') )
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-photo-album"></i>
                </div>
                <div class="menu-title">Media</div>
            </a>
            <ul>
                @can('app.media.index')
                <li> <a href="{{route('admin.media.index')}}"><i class="bx bx-right-arrow-alt"></i>All Media</a>
                </li>
                @endcan
                @can('app.media.create')
                <li> <a href="{{route('admin.media.create')}}"><i class="bx bx-right-arrow-alt"></i>New Media</a>
                </li>
                @endcan
            </ul>
        </li>
        @endif
        @if (auth()->user()->can('app.jobs.index') || auth()->user()->can('app.jobs.create') )
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-briefcase"></i>
                </div>
                <div class="menu-title">Jobs</div>
            </a>
            <ul>
                @can('app.jobs.index')
                <li> <a href="{{route('admin.circular.index')}}"><i class="bx bx-right-arrow-alt"></i>All Circulars</a>
                </li>
                @endcan
                @can('app.jobs.create')
                <li> <a href="{{route('admin.circular.create')}}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                </li>
                @endcan
            </ul>
        </li>
        @endif
        @if (auth()->user()->can('app.loan.applications.index') || auth()->user()->can('app.card.applications.index') || auth()->user()->can('app.lg.applications.index') || auth()->user()->can('app.bc.applications.index') )
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-home-smile"></i>
                    </div>
                    <div class="menu-title">Applications</div>
                </a>
                <ul>
                    @can('app.loan.applications.index')
                    <li>
                        <a href="{{route('admin.application.loan.index')}}">
                            <div class="menu-title">Loan Application</div>
                        </a>
                    </li>
                    @endcan
                    @can('app.card.applications.index')
                    <li>
                        <a href="{{route('admin.application.card.index')}}">
                            <div class="menu-title">Card Application</div>
                        </a>
                    </li>
                    @endcan
                    @can('app.lg.applications.index')
                    <li>
                        <a href="{{route('admin.application.life.index')}}">
                            <div class="menu-title">Life and General Application</div>
                        </a>
                    </li>
                    @endcan
                    @can('app.bc.applications.index')
                    <li>
                        <a href="{{route('admin.application.transport.index')}}">
                            <div class="menu-title">Bike and Motor Application</div>
                        </a>
                    </li>
                    @endcan
                </ul>

            </li>
        @endif
        @if (auth()->user()->can('app.cards.index') || auth()->user()->can('app.cards.docs.index') || auth()->user()->can('app.cards.faq.index') || auth()->user()->can('app.loans.index') || auth()->user()->can('app.loans.docs.index') || auth()->user()->can('app.loans.faq.index') || auth()->user()->can('app.insurances.index') || auth()->user()->can('app.insurances.posts.index') )
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-smile"></i>
                </div>
                <div class="menu-title">Services</div>
            </a>
            <ul>
                @can('app.cards.index')
                <li>
                    <a href="{{route('admin.cards.index')}}">
                        <div class="menu-title">Cards</div>
                    </a>
                </li>
                @endcan
                @can('app.cards.docs.index')
                <li>
                    <a href="{{route('admin.cards.docs.index')}}">
                        <div class="menu-title">Cards Docs</div>
                    </a>
                </li>
                @endcan
                @can('app.cards.faq.index')
                <li>
                    <a href="{{route('admin.cards.faqs.index')}}">
                        <div class="menu-title">Cards Faq</div>
                    </a>
                </li>
                @endcan
                @can('app.loans.index')
                <li>
                    <a href="{{route('admin.loans.index')}}">
                        <div class="menu-title">loans</div>
                    </a>
                </li>
                @endcan
                @can('app.loans.docs.index')
                <li>
                    <a href="{{route('admin.loans.docs.index')}}">
                        <div class="menu-title">Loans Docs</div>
                    </a>
                </li>
                @endcan
                @can('app.loans.faq.index')
                <li>
                    <a href="{{route('admin.loans.faqs.index')}}">
                        <div class="menu-title">Loans Faq</div>
                    </a>
                </li>
                @endcan
                @can('app.insurances.index')
                <li>
                    <a href="{{route('admin.insurance.index')}}">
                        <div class="menu-title">Insurances</div>
                    </a>
                </li>
                @endcan
                @can('app.insurances.posts.index')
                <li>
                    <a href="{{route('admin.insurance.posts.index')}}">
                        <div class="menu-title">Insurances Posts</div>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endif
        @if (auth()->user()->can('app.roles.index') || auth()->user()->can('app.users.index') )
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-shape-polygon"></i>
                </div>
                <div class="menu-title">Administration</div>
            </a>
            <ul>
                @can('app.roles.index')
                <li>
                    <a href="{{route('admin.roles.index')}}">
                        <div class="menu-title">Roles</div>
                    </a>
                </li>
                @endcan
                @can('app.users.index')
                <li>
                    <a href="{{route('admin.users.index')}}">
                        <div class="menu-title">User</div>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endif
        <li>
            <a class="" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <div class="parent-icon"><i class="bx bx-log-out"></i>
                </div>
                <div class="menu-title">Logout</div>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        {{-- @endrole --}}
        {{-- @role('vendor')
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-smile"></i>
                </div>
                <div class="menu-title">Applications</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('admin.application.loan.index')}}">
                        <div class="menu-title">Loan Application</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.application.card.index')}}">
                        <div class="menu-title">Card Application</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.application.life.index')}}">
                        <div class="menu-title">Life and General Application</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.application.transport.index')}}">
                        <div class="menu-title">Bike and Motor Application</div>
                    </a>
                </li>
            </ul>

        </li>
        <li>
            <a class="" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <div class="parent-icon"><i class="bx bx-log-out"></i>
                </div>
                <div class="menu-title">Logout</div>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        @endrole --}}
    </ul>
    <!--end navigation-->
</div>
