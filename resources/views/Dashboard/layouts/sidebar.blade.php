<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="https://cdn3d.iconscout.com/3d/free/thumb/google-5148287-4299203.png" alt="" height="50">
                    </span>
            <span class="logo-lg">
                        <img src="https://cdn3d.iconscout.com/3d/free/thumb/google-5148287-4299203.png" alt="" height="170">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="https://cdn3d.iconscout.com/3d/free/thumb/google-5148287-4299203.png" alt="" height="50">
                    </span>
            <span class="logo-lg">
                        <img src="https://cdn3d.iconscout.com/3d/free/thumb/google-5148287-4299203.png" alt="" height="170">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('dashboard')" href="{{ route('home') }}" >
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Product List</span>
                    </a>

                </li>

                <li class="menu-title"><span data-key="t-menu">Category Manager</span></li>
                <li class="nav-item mb-5 pb-5 ">
                    <a class="nav-link menu-link" href="#ProductCategory" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="ProductCategory">
                        <i class="ri-product-hunt-fill"></i> <span data-key="t-dashboards">Category</span>
                    </a>
                    <div class="collapse menu-dropdown" id="ProductCategory">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item @yield('category_create')" >
                                <a href="{{ route('category.create') }}" class="nav-link" data-key="t-analytics">
                                    Create Category
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('subCategory.create') }}" class="nav-link" data-key="t-analytics">
                                    Create SubCategory
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
