<!-- ====================================
——— PAGE WRAPPER
===================================== -->
<div class="page-wrapper">

    <!-- Header -->
    <header class="main-header" id="header">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
        </button>

        <span class="page-title">dashboard</span>

        <div class="navbar-right ">

        <ul class="nav navbar-nav">
            <!-- Offcanvas -->
            
            <!-- User Account -->
            <li class="dropdown user-menu">
       <button class="dropdown-toggle nav-link" data-toggle="dropdown">
    <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
</button>

            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                <a class="dropdown-link-item" href="{{ route('profile.edit') }}">
                    <i class="mdi mdi-account-outline"></i>
                    <span class="nav-text" >My Profile</span>
                </a>
                </li>
               
                <li class="dropdown-footer">
                    <a class="dropdown-link-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout"></i> Log Out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            </li>
        </ul>
        </div>
    </nav>

    </header>

    <!-- ====================================
    ——— CONTENT WRAPPER
    ===================================== -->
    <div class="content-wrapper" style="background-color: #f0f1f5;">
        <div class="content">
                @yield('content')
        </div>
    </div>
</div>
