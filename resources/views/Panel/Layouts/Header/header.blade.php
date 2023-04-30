@yield('style')


<header class="top-header-area d-flex align-items-center justify-content-between">
    <div class="left-side-content-area d-flex align-items-center">
        <!-- Mobile Logo -->
        <div class="mobile-logo mr-3 mr-sm-4">
            <a href="{{ route('panel.user') }}"><img src="{{ asset('Assets/Panel/Assets/img/companyName-black.png') }}" alt="آرم موبایل"></a>
        </div>

        <!-- Triggers -->
        <div class="ecaps-triggers mr-1 mr-sm-3">
            <div class="menu-collasped" id="menuCollasped">
                <i class="zmdi zmdi-menu"></i>
            </div>
            <div class="mobile-menu-open" id="mobileMenuOpen">
                <i class="zmdi zmdi-menu"></i>
            </div>
        </div>

        <!-- Left Side Nav -->
        <ul class="left-side-navbar d-flex align-items-center mb-0">
            <li class="hide-phone app-search">
                @php
                    $carbon = \Carbon\Carbon::now()->setTimezone('+4:30');
                    $date  = \verta()->format('%d %B %Y');
                    $hours = $carbon->format('H');
                    $min   = $carbon->format('i');
                    $sec   = $carbon->format('s');
                @endphp
                <span>{{ $date }}</span><br>
                <div class="dashboard-clock ltr">
                    <ul class="d-flex align-items-center justify-content-end">
                        <li id="hours">{{ $hours }}</li>
                        <li>:</li>
                        <li id="min">{{ $min }}</li>
                        <li>:</li>
                        <li id="sec">{{ $sec }}</li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <div class="right-side-navbar d-flex align-items-center justify-content-end">
        <!-- Mobile Trigger -->
        <div class="right-side-trigger" id="rightSideTrigger">
            <i class="ti-align-left"></i>
        </div>

        <!-- Top Bar Nav -->
        <ul class="right-side-content d-flex align-items-center">
            <li class="nav-item dropdown">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-volume-up" aria-hidden="true"></i> <span class="active-status"></span></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- Top Notifications Area -->
                    <div class="top-notifications-area">
                        <!-- Heading -->
                        <div class="notifications-heading">
                            <div class="heading-title">
                                <h6>پیام ها</h6>
                            </div>
                            <span>1 جدید</span>
                        </div>

                        <div class="notifications-box" id="notificationsBox">
                            <a href="#" class="dropdown-item"><i class="ti-bell"></i><span>ما یک چیزی برای شما داریم!</span></a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('Assets/Panel/Assets/img/member-img/3.png') }}" alt=""></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- User Profile Area -->
                    <div class="user-profile-area">
                        <div class="user-profile-heading">
                            <!-- Thumb -->
                            <div class="profile-img">
                                <img class="chat-img mr-2" src="{{ asset('Assets/Panel/Assets/img/member-img/3.png') }}" alt="">
                            </div>
                            <!-- Profile Text -->
                            <div class="profile-text">
                                <h6>نام کاربر</h6>
                                <span>توسعه دهنده</span>
                            </div>
                        </div>
                        <a href="#" class="dropdown-item"><i class="fa fa-user profile-icon bg-primary" aria-hidden="true"></i> پروفایل من</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-key profile-icon bg-info" aria-hidden="true"></i> تغییر رمز عبور</a>
                        <a href="{{ route('logout') }}" class="dropdown-item"><i class="fa fa-sign-out profile-icon bg-danger" aria-hidden="true"></i> خروج از سیستم</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
