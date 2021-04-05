<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                @if(Auth::user()->image)
                <img src="{{ Auth::user()->image }}" alt="User image" class="avatar-md mx-auto rounded-circle">
                @else
                <img src="{{ url('/images/icons/people.png') }}" alt="User image" class="avatar-md mx-auto rounded-circle">
                @endif
            </div>

            <div class="mt-3">
                <a href="#" class="text-dark font-weight-medium font-size-16">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('trips.index') }}" class=" waves-effect">
                        <i class="fas fa-route"></i>
                        <span>Trip</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('merchants.index') }}" class=" waves-effect">
                        <i class="fas fa-store"></i>
                        <span>Merchant</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('vouchers.index') }}" class=" waves-effect">
                        <i class="fas fa-ticket-alt"></i>
                        <span>Voucher</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.index') }}" class=" waves-effect">
                        <i class="fas fa-user-friends"></i>
                        <span>Pengguna</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('blogs.index') }}" class=" waves-effect">
                        <i class="fas fa-book"></i>
                        <span>Artikel</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->