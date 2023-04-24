<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>@yield('title' , 'پنل مدیریت')</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/AdminPanel/css/style.css') }}">
    @yield('style')

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="ctn-preloader" class="ont-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                    <span data-text-preloader="لاراول لرن" class="letters-loading" style="color:#ff2d20;">
                        لاراول لرن
                     </span>
            </div>
        </div>

        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Preloader -->

<!-- ======================================
******* Page Wrapper Area Start **********
======================================= -->
<div class="ecaps-page-wrapper">
    <!-- Sidemenu Area -->
    <div class="ecaps-sidemenu-area">
        <!-- Desktop Logo -->
        <div class="ecaps-logo">
            <a href="index.html"><img class="desktop-logo" src="img/core-img/logo.png" alt="لوگوی دسک تاپ"> <img class="small-logo" src="img/core-img/small-logo.png" alt="آرم موبایل"></a>
        </div>

        <!-- Side Nav -->
        <div class="ecaps-sidenav" id="ecapsSideNav">
            <!-- Side Menu Area -->
            <div class="side-menu-area">
                <!-- Sidebar Menu -->

                <nav>
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="active"><a href="index.html"><i class="zmdi zmdi-view-dashboard"></i><span>داشبورد</span></a></li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="fa fa-newspaper-o"></i> <span>مقالات</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="article-categories.html">دسته بندی</a></li>
                                <li><a href="article-tags.html">برچسب</a></li>
                                <li><a href="articles.html">لیست مقالات</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="fa fa-file-image-o"></i> <span>رسانه ها</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="banners.html">بنر ها</a></li>
                                <li><a href="sliders.html">اسلایدر ها</a></li>
                            </ul>
                        </li>

                        <li><a href="pages.html"><i class="zmdi zmdi-assignment"></i><span>صفحات</span></a></li>
                        <li><a href="menus.html"><i class="zmdi zmdi-menu"></i><span>منو ها</span></a></li>
                        <li><a href="comments.html"><i class="zmdi zmdi-comments"></i><span>نظرات</span></a></li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="zmdi zmdi-accounts-alt"></i> <span>کاربران</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="users.html">لیست کاربران</a></li>
                                <li><a href="#">افزودن کاربر</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="fa fa-cube"></i> <span>فروشندگان</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="vendors.html">لیست فروشندگان</a></li>
                                <li><a href="#">افزودن فروشنده</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="fa fa-user-secret"></i> <span>سطوح دسترسی</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#">نقش ها</a></li>
                                <li><a href="#">سطح دسترسی</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="fa fa-shopping-bag"></i> <span>محصولات</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="product-categories.html">دسته بندی</a></li>
                                <li><a href="product-tags.html">برچسب</a></li>
                                <li><a href="products.html">لیست محصولات</a></li>
                                <li><a href="#">برندها</a></li>
                                <li><a href="#">رنگ ها</a></li>
                                <li><a href="#">گارانتی ها</a></li>
                                <li><a href="#">تنوع قیمت</a></li>
                                <li><a href="#">مشخصات محصولات-مقادیر</a></li>
                                <li><a href="#">پیشنهادات شگفت انگیز</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="zmdi zmdi-file-text"></i> <span>جزییات فروشگاه</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#">آدرس ها</a></li>
                                <li><a href="#">آدرس های انبار</a></li>
                                <li><a href="#">زمان های ارسال</a></li>
                                <li><a href="#">اطلاع رسانی</a></li>
                                <li><a href="#">لیست عمومی</a></li>
                                <li><a href="#">کالاهای مورد علاقه</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="zmdi zmdi-rss"></i><span>خبرنامه</span></a></li>
                        <li><a href="#"><i class="fa fa-id-badge"></i><span>تبلیغات</span></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i><span>تراکنش ها</span></a></li>
                        <li><a href="logs.html"><i class="zmdi zmdi-chart"></i><span>گزارشات سیستم</span></a></li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="zmdi zmdi-card-giftcard"></i> <span>تخفیفات</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#">کد های تخفیف</a></li>
                                <li><a href="#">کارت های هدیه</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="fa fa-first-order"></i> <span>سفارشات</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#">تمام سفارشات</a></li>
                                <li><a href="#">در انتظار</a></li>
                                <li><a href="#">در حال پردازش</a></li>
                                <li><a href="#">تکمیل شده</a></li>
                                <li><a href="#">مرجوعی</a></li>
                                <li><a href="#">لغو شده</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="zmdi zmdi-replay"></i> <span>مرجوعی ها</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#">جزییات مرجوعی</a></li>
                                <li><a href="#">دلایل مرجوعی</a></li>
                                <li><a href="#">مرجوعی های تائید شده</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="zmdi zmdi-notifications"></i> <span>اطلاع رسانی ها</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#">ایمیلی</a></li>
                                <li><a href="#">پیامکی</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="fa fa-ticket"></i> <span>تیکت ها</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#">بسته شده</a></li>
                                <li><a href="#">در حال بررسی</a></li>
                                <li><a href="#">باز</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="fa fa-calculator"></i> <span>حسابداری</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#">فروش ها</a></li>
                                <li><a href="#">تسویه حساب ها</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="fa fa-cubes"></i> <span>انبارداری</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#">موجودی</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="javascript:void(0)"><i class="zmdi zmdi-settings"></i> <span>تنظیمات</span> <i class="fa fa-angle-left"></i></a>
                            <ul class="treeview-menu">
                                <!-- تنظیمات فوتر-برچسب ها-تنظیمات عمومی(لوگو و ...) -  -->
                                <li><a href="#">تنظیمات عمومی</a></li>
                                <!-- استان و شهر و ... -  -->
                                <li><a href="#">تنظیمات فروشگاه</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="zmdi zmdi-cloud-done"></i><span>بکاپ گیری</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="ecaps-page-content">
        <!-- Top Header Area -->
        <header class="top-header-area d-flex align-items-center justify-content-between">
            <div class="left-side-content-area d-flex align-items-center">
                <!-- Mobile Logo -->
                <div class="mobile-logo mr-3 mr-sm-4">
                    <a href="index.html"><img src="img/core-img/small-logo.png" alt="آرم موبایل"></a>
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
                <ul class="left-side-navbar d-flex align-items-center">
                    <li class="hide-phone app-search">
                        <div class="dashboard-clock ltr">
                            <span>دوشنبه 15 آبان</span><br>
                            <ul class="d-flex align-items-center justify-content-end">
                                <li id="hours">12</li>
                                <li>:</li>
                                <li id="min">10</li>
                                <li>:</li>
                                <li id="sec">14</li>
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
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/member-img/3.png" alt=""></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- User Profile Area -->
                            <div class="user-profile-area">
                                <div class="user-profile-heading">
                                    <!-- Thumb -->
                                    <div class="profile-img">
                                        <img class="chat-img mr-2" src="img/member-img/3.png" alt="">
                                    </div>
                                    <!-- Profile Text -->
                                    <div class="profile-text">
                                        <h6>نام کاربر</h6>
                                        <span>توسعه دهنده</span>
                                    </div>
                                </div>
                                <a href="#" class="dropdown-item"><i class="fa fa-user profile-icon bg-primary" aria-hidden="true"></i> پروفایل من</a>
                                <a href="#" class="dropdown-item"><i class="fa fa-key profile-icon bg-info" aria-hidden="true"></i> تغییر رمز عبور</a>
                                <a href="#" class="dropdown-item"><i class="fa fa-sign-out profile-icon bg-danger" aria-hidden="true"></i> خروج از سیستم</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        <!-- Main Content Area -->
        <div class="main-content">
            <nav aria-label="خرده نان" class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#">کتابخانه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">داده ها</li>
                </ol>
            </nav>

            <div class="dashboard-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 box-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">نظرات تائید نشده</h4>
                                    <div class="table-responsive" id=" ">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>نظردهنده</th>
                                                <th>وضعیت</th>
                                                <th>تاریخ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>2864</td>
                                                <td>81</td>
                                                <td>1،912.00 تومان</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-success" style="width: 82%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 box-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">گزارشات سیستمی</h5>
                                    <div class="product-table-area">
                                        <div class="table-responsive" id=" ">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>آیپی کاربر</th>
                                                    <th>نام و سمت</th>
                                                    <th>موبایل</th>
                                                    <th>شرح عملیات</th>
                                                    <th>تاریخ و ساعت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="media align-items-center">
                                                            <div>
                                                                <span>تلفن تلفن</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>2864</td>
                                                    <td>81</td>
                                                    <td>1،912.00 تومان</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar bg-success" style="width: 82%"></div>
                                                            </div>
                                                            <div>
                                                                824
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-xl-12 mb-3">
                            <div class="card bg-boxshadow full-height">
                                <div class="card-header bg-transparent user-area d-flex align-items-center justify-content-between">
                                    <h5 class="card-title mb-0">وضعیت سفارشات</h5>
                                    <!-- Nav Tabs -->
                                    <ul class="nav total-earnings nav-tabs mb-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link show" id="today-users-tab" data-toggle="tab" href="#today-users" role="tab" aria-controls="today-users" aria-selected="false">در حال پردازش</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mr-0 active" id="month-users-tab" data-toggle="tab" href="#month-users" role="tab" aria-controls="month-users" aria-selected="true">آماده ارسال</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content" id="userList2">
                                        <div class="tab-pane fade" id="today-users" role="tabpanel" aria-labelledby="today-users-tab">
                                            <div class="table-responsive" id=" ">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>شماره سفارش</th>
                                                        <th>نام خریدار</th>
                                                        <th>موبایل</th>
                                                        <th>مبلغ قابل پرداخت</th>
                                                        <th>تاریخ و ساعت</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="media align-items-center">
                                                                <div class="chat-img mr-2">
                                                                    <img src="img/shop-img/best-4.png" alt="">
                                                                </div>
                                                                <div>
                                                                    <span>تلفن تلفن</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>2864</td>
                                                        <td>81</td>
                                                        <td>1،912.00 تومان</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar bg-success" style="width: 82%"></div>
                                                                </div>
                                                                <div>
                                                                    824
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade active show" id="month-users" role="tabpanel" aria-labelledby="month-users-tab">
                                            <div class="table-responsive" id=" ">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>شماره سفارش</th>
                                                        <th>نام خریدار</th>
                                                        <th>موبایل</th>
                                                        <th>مبلغ قابل پرداخت</th>
                                                        <th>تاریخ و ساعت</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="media align-items-center">
                                                                <div class="chat-img mr-2">
                                                                    <img src="img/shop-img/best-4.png" alt="">
                                                                </div>
                                                                <div>
                                                                    <span>تلفن تلفن</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>2864</td>
                                                        <td>81</td>
                                                        <td>1،912.00 تومان</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar bg-success" style="width: 82%"></div>
                                                                </div>
                                                                <div>
                                                                    824
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 box-margin">
                            <div class="card code-table">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">کاربران جدید سایت</h5>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>نام</th>
                                                <th>موبایل</th>
                                                <th>ایمیل</th>
                                                <th>وضعیت موبایل</th>
                                                <th>نقش کاربری</th>
                                                <th>تاریخ ایجاد</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    شماره 2154
                                                </td>
                                                <td>
                                                    8965482
                                                </td>
                                                <td>
                                                    1398/5/8
                                                </td>
                                                <td>
                                                    7523 تومان
                                                </td>
                                                <td><a href="#!" class="badge badge-success badge-pill">فعال</a></td>
                                                <td>
                                                    1400/05/02
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======================================
********* Page Wrapper Area End ***********
======================================= -->

<!-- Must needed plugins to the run this Template -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bundle.js"></script>
<script src="js/default-assets/date-time.js"></script>
<script src="js/default-assets/setting.js"></script>
<script src="js/default-assets/fullscreen.js"></script>
<script src="js/default-assets/bootstrap-growl.js"></script>

<!-- Active JS -->
<script src="js/default-assets/active.js"></script>

<!-- These plugins only need for the run this page -->
<script src="js/default-assets/peity.min.js"></script>
<script src="js/default-assets/peity-demo.js"></script>
<script src="js/default-assets/gauge.js"></script>
<script src="js/default-assets/serial.js"></script>
<script src="js/default-assets/light.js"></script>
<script src="js/default-assets/ammap.min.js"></script>
<script src="js/default-assets/worldlow.js"></script>
<script src="js/default-assets/radar.js"></script>
<script src="js/default-assets/dashboard-2.js"></script>

@yield('js')
</body>
</html>
