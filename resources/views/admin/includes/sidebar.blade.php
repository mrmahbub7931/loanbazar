<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        {{-- <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>--}}
        <div>
            <h4 class="logo-text">Loanbazar</h4>
        </div>
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
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Slider</div>
            </a>
            <ul>
                @role('super-admin')
                <li> <a href="{{route('admin.getslider')}}"><i class="bx bx-right-arrow-alt"></i>All Sliders</a>
                </li>
                <li> <a href="{{route('admin.createSlider')}}"><i class="bx bx-right-arrow-alt"></i>Create</a>
                </li>
                @endrole
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-smile"></i>
                </div>
                <div class="menu-title">Home Page</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.deals.index')}}"><i class="bx bx-right-arrow-alt"></i>Best Deals</a>
                </li>
                <li> <a href="{{route('admin.services.index')}}"><i class="bx bx-right-arrow-alt"></i>Best Services</a>
                </li>
                <li> <a href="{{route('admin.teams.index')}}"><i class="bx bx-right-arrow-alt"></i>Teams</a>
                </li>
                <li> <a href="{{route('admin.reviews.index')}}"><i class="bx bx-right-arrow-alt"></i>Reviews</a>
                </li>
                <li> <a href="{{route('admin.homeimg.index')}}"><i class="bx bx-right-arrow-alt"></i>Large Image</a>
                </li>
                <li> <a href="{{route('admin.counters.index')}}"><i class="bx bx-right-arrow-alt"></i>Counters</a>
                </li>
                <li> <a href="{{route('admin.corporates.index')}}"><i class="bx bx-right-arrow-alt"></i>Corporates</a>
                </li>
                <li> <a href="{{route('admin.financial.index')}}"><i class="bx bx-right-arrow-alt"></i>Financials</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-bible"></i>
                </div>
                <div class="menu-title">Pages</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.page.index')}}"><i class="bx bx-right-arrow-alt"></i>All Pages</a>
                </li>
                <li> <a href="{{route('admin.page.create')}}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-smile"></i>
                </div>
                <div class="menu-title">Posts</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.posts.index')}}"><i class="bx bx-right-arrow-alt"></i>All Posts</a>
                </li>
                <li> <a href="{{route('admin.posts.create')}}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                </li>
                <li> <a href="{{route('admin.categories.index')}}"><i class="bx bx-right-arrow-alt"></i>Category</a>
                </li>
                <li> <a href="{{route('admin.writers.index')}}"><i class="bx bx-right-arrow-alt"></i>Writers</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Tools</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.exchange_rate.index')}}"><i class="bx bx-right-arrow-alt"></i>All Exchange Rate</a>
                </li>
                <li> <a href="{{route('admin.exchange_rate.create')}}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-photo-album"></i>
                </div>
                <div class="menu-title">Media</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.media.index')}}"><i class="bx bx-right-arrow-alt"></i>All Media</a>
                </li>
                <li> <a href="{{route('admin.media.create')}}"><i class="bx bx-right-arrow-alt"></i>New Media</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-briefcase"></i>
                </div>
                <div class="menu-title">Jobs</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.circular.index')}}"><i class="bx bx-right-arrow-alt"></i>All Circulars</a>
                </li>
                <li> <a href="{{route('admin.circular.create')}}"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-smile"></i>
                </div>
                <div class="menu-title">Applications</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('admin.application.index')}}">
                        <div class="menu-title">Loan and Card Application</div>
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
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-smile"></i>
                </div>
                <div class="menu-title">Services</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('admin.cards.index')}}">
                        <div class="menu-title">Cards</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.cards.docs.index')}}">
                        <div class="menu-title">Cards Docs</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.cards.faqs.index')}}">
                        <div class="menu-title">Cards Faq</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.loans.index')}}">
                        <div class="menu-title">loans</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.loans.docs.index')}}">
                        <div class="menu-title">Loans Docs</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.loans.faqs.index')}}">
                        <div class="menu-title">Loans Faq</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.insurance.index')}}">
                        <div class="menu-title">Insurances</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.insurance.posts.index')}}">
                        <div class="menu-title">Insurances Posts</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-shape-polygon"></i>
                </div>
                <div class="menu-title">Administration</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('admin.roles.index')}}">
                        <div class="menu-title">Roles</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.users.index')}}">
                        <div class="menu-title">User</div>
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
    </ul>
    <!--end navigation-->
</div>
