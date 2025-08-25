<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Use Material Symbols (optional modern version) -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<aside class="left-sidebar sidebar-dark" id="left-sidebar">
<div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Application Brand -->
    <div class="app-brand">
        <a href="/" class="text-decoration-none">
            <span class="brand-name">Admin Dashboard</span>
        </a>
    </div>

    <!-- Sidebar Scrollbar -->
    <div class="sidebar-left" data-simplebar style="height: 100%;">
        <!-- Sidebar Menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">

            <!-- Dashboard -->
            <li class="active">
                <a class="sidenav-item-link" href="{{ route('admin.admin_home') }}">
                    <span class="material-icons">dashboard</span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

    <!-- Homepage -->
<li class="has-sub">
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Homepage" aria-expanded="false" aria-controls="Homepage">
        <span class="material-icons">home</span>
        <span class="nav-text">Homepage</span>
        <b class="caret"></b>
    </a>
    <ul class="collapse sub-menu" id="Homepage">
        <li><a class="sidenav-item-link" href="{{ route('admin.categories.index') }}"><span class="nav-text">Categories</span></a></li>
        <li><a class="sidenav-item-link" href="{{ route('admin.features.index') }}"><span class="nav-text">Features</span></a></li>
        <li><a class="sidenav-item-link" href="{{ route('admin.stats.index') }}"><span class="nav-text">Stats</span></a></li>
        <li><a class="sidenav-item-link" href="{{ route('admin.gallery.index') }}"><span class="nav-text">Gallery</span></a></li>
        <li><a class="sidenav-item-link" href="{{ route('admin.news.index') }}"><span class="nav-text">News</span></a></li>
    </ul>
</li>

            <!-- Pages Banner -->
            <li class="has-sub">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#banner" aria-expanded="false" aria-controls="banner">
                    <span class="material-icons">image</span>
                    <span class="nav-text">Pages Slider</span>
                    <b class="caret"></b>
                </a>
                <ul class="collapse sub-menu" id="banner">
                    <li><a class="sidenav-item-link" href="{{ route('admin.slider.index') }}"><span class="nav-text">Slider</span></a></li>
                </ul>
            </li>

            <!-- Pages Title -->
            <li class="section-title">Pages</li>

            <!-- About Us -->
            <li class="has-sub">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#About" aria-expanded="false" aria-controls="About">
                    <span class="material-icons">info</span>
                    <span class="nav-text">About Us</span>
                    <b class="caret"></b>
                </a>
                <ul class="collapse sub-menu" id="About">
                    <li><a class="sidenav-item-link" href="{{ route('admin.about.index') }}"><span class="nav-text">About Us</span></a></li>
                </ul>
            </li>

      <!-- Products -->
<li class="has-sub">
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Products" aria-expanded="false" aria-controls="Products">
        <span class="material-icons">shopping_cart</span>
        <span class="nav-text">Products</span>
        <b class="caret"></b>
    </a>
    <ul class="collapse sub-menu" id="Products">
        <!-- Products -->
        <li><a class="sidenav-item-link" href="{{ route('admin.products.index') }}"><span class="nav-text">Products List</span></a></li>
        <li><a class="sidenav-item-link" href="{{ route('admin.products.create') }}"><span class="nav-text">Create Product</span></a></li>

        <!-- Divider -->
        <li class="mt-2 border-top pt-2"><strong class="text-muted px-3">Product Categories</strong></li>

        <!-- Categories -->
        <li><a class="sidenav-item-link" href="{{ route('admin.product_categories.index') }}"><span class="nav-text">All Categories</span></a></li>
        <li><a class="sidenav-item-link" href="{{ route('admin.product_categories.create') }}"><span class="nav-text">Create Category</span></a></li>

        <!-- Subcategories -->
        <li><a class="sidenav-item-link" href="{{ route('admin.product_subcategories.index') }}"><span class="nav-text">All Subcategories</span></a></li>
        <li><a class="sidenav-item-link" href="{{ route('admin.product_subcategories.create') }}"><span class="nav-text">Create Subcategory</span></a></li>
    </ul>
</li>

<!-- Projects -->
<li class="has-sub">
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Projects" aria-expanded="false" aria-controls="Projects">
        <span class="material-icons">work</span>
        <span class="nav-text">Projects</span>
        <b class="caret"></b>
    </a>
    <ul class="collapse sub-menu" id="Projects">
        <!-- Projects -->
        <li><a class="sidenav-item-link" href="{{ route('admin.projects.index') }}"><span class="nav-text">Projects List</span></a></li>
        <li><a class="sidenav-item-link" href="{{ route('admin.projects.create') }}"><span class="nav-text">Create Project</span></a></li>

        <!-- Divider -->
        <li class="mt-2 border-top pt-2"><strong class="text-muted px-3">Project Categories</strong></li>

        <!-- Categories -->
        <li><a class="sidenav-item-link" href="{{ route('admin.projects_categories.index') }}"><span class="nav-text">All Categories</span></a></li>
        <li><a class="sidenav-item-link" href="{{ route('admin.projects_categories.create') }}"><span class="nav-text">Create Category</span></a></li>

        <!-- Subcategories -->
        <li><a class="sidenav-item-link" href="{{ route('admin.projects_subcategories.index') }}"><span class="nav-text">All Subcategories</span></a></li>
        <li><a class="sidenav-item-link" href="{{ route('admin.projects_subcategories.create') }}"><span class="nav-text">Create Subcategory</span></a></li>
    </ul>
</li>

            <!-- Portfolio -->
            <li class="has-sub">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Portfolio" aria-expanded="false" aria-controls="Portfolio">
                    <span class="material-icons">work</span>
                    <span class="nav-text">Company Profile</span>
                    <b class="caret"></b>
                </a>
                <ul class="collapse sub-menu" id="Portfolio">
                    <li><a class="sidenav-item-link" href="{{ route('admin.portfolio.index') }}"><span class="nav-text">Company Profile List</span></a></li>
                </ul>
            </li>

            <!-- FAQ -->
<li class="has-sub">
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Faq" aria-expanded="false" aria-controls="Faq">
        <span class="material-icons">help_outline</span>
        <span class="nav-text">FAQ</span>
        <b class="caret"></b>
    </a>
    <ul class="collapse sub-menu" id="Faq">
        <li>
            <a class="sidenav-item-link" href="{{ route('admin.faq.index') }}">
                <span class="nav-text">FAQ List</span>
            </a>
        </li>
        <li>
            <a class="sidenav-item-link" href="{{ route('admin.faq.create') }}">
                <span class="nav-text">Create FAQ</span>
            </a>
        </li>
    </ul>
</li>

<!-- Services -->
<li class="has-sub">
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Services" aria-expanded="false" aria-controls="Services">
        <span class="material-icons">miscellaneous_services</span>
        <span class="nav-text">Services</span>
        <b class="caret"></b>
    </a>
    <ul class="collapse sub-menu" id="Services">
        <li>
            <a class="sidenav-item-link" href="{{ route('admin.services.index') }}">
                <span class="nav-text">Services List</span>
            </a>
        </li>
        <li>
            <a class="sidenav-item-link" href="{{ route('admin.services.create') }}">
                <span class="nav-text">Create Service</span>
            </a>
        </li>
    </ul>
</li>

            <!-- Website Settings -->
            <li>
                <a class="sidenav-item-link" href="{{ route('admin.setting.index') }}">
                    <span class="material-icons">settings</span>
                    <span class="nav-text">Website Setting</span>
                </a>
            </li>
        </ul>
    </div>

   <!-- Sidebar Footer -->
<div class="sidebar-footer">
<div class="sidebar-footer-content">
    <ul class="d-flex">
        <li>
            <a href="{{ route('admin.setting.index') }}" data-toggle="tooltip" title="Website Settings">
                <span class="material-icons">settings</span>
            </a>
        </li>
        <li>
            <a  href="/" data-toggle="tooltip" title="Home">
                <span class="material-icons" style="margin-left: 4px;">home</span>
            </a>
        </li>
    </ul>
</div>
</div>

</div>
</aside>

