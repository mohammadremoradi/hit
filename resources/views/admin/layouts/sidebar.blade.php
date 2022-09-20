<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Hit institute</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.index') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('landing.en') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>
                            Website
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="{{ route('register-form.index') }}" class="nav-link">
                        <i class="fas fa-mail-bulk nav-icon   "></i>
                        <p>
                            Registered Applicant
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('question.index') }}" class="nav-link">
                        <i class="fas fa-mail-bulk nav-icon   "></i>
                        <p>
                            Client Message
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('course.index') }}" class="nav-link">
                        <i class="fa fa-graduation-cap nav-icon" aria-hidden="true"></i>
                        <p>
                            Course
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="fas fa-users    "></i> --}}
                        <i class="fa-sharp fa-solid fa-file-circle-plus nav-icon"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('landing.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Landing
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact_us.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Contact us
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('about-us.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    About us
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('partner.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Partner
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admission.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Admission
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-bell nav-icon" aria-hidden="true"></i>
                        <p>
                            Notification
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('sms.index') }}" class="nav-link">
                                <i class="fas fa-sms nav-icon"></i>
                                <p>
                                    Sms
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('email.index') }}" class="nav-link">
                                <i class="fa fa-envelope nav-icon" aria-hidden="true"></i>
                                <p>
                                    Email
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-brands fa-google nav-icon" aria-hidden="true"></i>
                        <p>
                            Seo
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('seo-all-pages.index') }}" class="nav-link">
                                <i class="fas fa-sms nav-icon"></i>
                                <p>
                                    All pages
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact-us-page.index') }}" class="nav-link">
                                <i class="fas fa-sms nav-icon"></i>
                                <p>
                                    Contact Us
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course-page.index') }}" class="nav-link">
                                <i class="fas fa-sms nav-icon"></i>
                                <p>
                                    Courses
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('register-page.index') }}" class="nav-link">
                                <i class="fas fa-sms nav-icon"></i>
                                <p>
                                    Register form
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('whyus-page.index') }}" class="nav-link">
                                <i class="fas fa-sms nav-icon"></i>
                                <p>
                                    Why Hit
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header"> Settings </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-users nav-icon"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>


                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
