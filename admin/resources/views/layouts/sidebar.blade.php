<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="images/users/avatar-2.jpg" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-dark font-weight-medium font-size-16">Patrick Becker</a>
                <p class="text-body mt-1 mb-0 font-size-13">UI/UX Designer</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-airplay"></i><span class="badge badge-pill badge-info float-right">2</span>
                        <span>Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="index">Dashboard 1</a></li>
                        <li><a href="index-2">Dashboard 2</a></li>
                    </ul>
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