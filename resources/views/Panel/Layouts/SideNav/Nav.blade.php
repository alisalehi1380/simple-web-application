<div class="ecaps-sidemenu-area">
    <!-- Desktop Logo -->
    <div class="ecaps-logo">
        <a href="{{ route('userPanel') }}">
            <img class="desktop-logo" src="{{ asset('Assets/Panel/Assets/img/companyName.png') }}" alt="نام کمپانی شما"> {{-- //todo company name --}}
            <img class="small-logo" src="{{ asset('Assets/Panel/Assets/img/companyName.png') }}" alt="نام کمپانی شما"></a> {{-- //todo company name --}}
    </div>

    <!-- Side Nav -->
    <div class="ecaps-sidenav" id="ecapsSideNav">

        <!-- Side Menu Area -->
        <div class="side-menu-area">

            <!-- Sidebar Menu -->
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="{{ request()->routeIs('userPanel')?'active':'' }}"><a href="{{ route('userPanel') }}"><i class="zmdi zmdi-view-dashboard"></i><span>داشبورد</span></a></li>

                    <li class="treeview {{request()->routeIs([
                                                              'userPanel.article.list',
                                                              'userPanel.article.create',
                                                             ])?'active':'' }}">
                        <a href="#"><i class="fa fa-newspaper-o"></i><span>مقالات</span><i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a style="{{ request()->routeIs([
                                                                 'userPanel.article.list',
                                                                 'userPanel.article.create'
                                                                 ])?'color:#54c6d0;':'' }}" href="{{ route('userPanel.article.list') }}">لیست مقالات</a></li>
                            {{--                            <li><a class="active" href="#">دسته بندی</a></li>--}}
                            {{--                            <li><a href="#">برچسب</a></li>--}}
                        </ul>
                    </li>

                    <li class="treeview {{ request()->routeIs([
                                                                'userPanel.setting.changePassword',
                                                               ])? 'active':''}}">
                        <a href="#"><i style="color: #EEEEEE;font-size: 19px;" class="fa fa-cog"></i> <span>تنظیمات</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a style="{{ request()->routeIs([
                                                                 'userPanel.setting.changePassword'
                                                                ])? 'color:#54c6d0;':'' }}" href="{{ route('userPanel.setting.changePassword') }}">تفییر رمز عبور</a></li>
                        </ul>
                    </li>


                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="fa fa-file-image-o"></i> <span>رسانه ها</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">بنر ها</a></li>--}}
                    {{--                            <li><a href="#">اسلایدر ها</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}

                    {{--                    <li><a href="#"><i class="zmdi zmdi-assignment"></i><span>صفحات</span></a></li>--}}
                    {{--                    <li><a href="#"><i class="zmdi zmdi-menu"></i><span>منو ها</span></a></li>--}}
                    {{--                    <li><a href="#"><i class="zmdi zmdi-comments"></i><span>نظرات</span></a></li>--}}

                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="zmdi zmdi-accounts-alt"></i> <span>کاربران</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">لیست کاربران</a></li>--}}
                    {{--                            <li><a href="#">افزودن کاربر</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}

                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="fa fa-cube"></i> <span>فروشندگان</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">لیست فروشندگان</a></li>--}}
                    {{--                            <li><a href="#">افزودن فروشنده</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="fa fa-user-secret"></i> <span>سطوح دسترسی</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">نقش ها</a></li>--}}
                    {{--                            <li><a href="#">سطح دسترسی</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="fa fa-shopping-bag"></i> <span>محصولات</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">دسته بندی</a></li>--}}
                    {{--                            <li><a href="#">برچسب</a></li>--}}
                    {{--                            <li><a href="#">لیست محصولات</a></li>--}}
                    {{--                            <li><a href="#">برندها</a></li>--}}
                    {{--                            <li><a href="#">رنگ ها</a></li>--}}
                    {{--                            <li><a href="#">گارانتی ها</a></li>--}}
                    {{--                            <li><a href="#">تنوع قیمت</a></li>--}}
                    {{--                            <li><a href="#">مشخصات محصولات-مقادیر</a></li>--}}
                    {{--                            <li><a href="#">پیشنهادات شگفت انگیز</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="zmdi zmdi-file-text"></i> <span>جزییات فروشگاه</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">آدرس ها</a></li>--}}
                    {{--                            <li><a href="#">آدرس های انبار</a></li>--}}
                    {{--                            <li><a href="#">زمان های ارسال</a></li>--}}
                    {{--                            <li><a href="#">اطلاع رسانی</a></li>--}}
                    {{--                            <li><a href="#">لیست عمومی</a></li>--}}
                    {{--                            <li><a href="#">کالاهای مورد علاقه</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li><a href="#"><i class="zmdi zmdi-rss"></i><span>خبرنامه</span></a></li>--}}
                    {{--                    <li><a href="#"><i class="fa fa-id-badge"></i><span>تبلیغات</span></a></li>--}}
                    {{--                    <li><a href="#"><i class="fa fa-credit-card"></i><span>تراکنش ها</span></a></li>--}}
                    {{--                    <li><a href="#"><i class="zmdi zmdi-chart"></i><span>گزارشات سیستم</span></a></li>--}}
                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="zmdi zmdi-card-giftcard"></i> <span>تخفیفات</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">کد های تخفیف</a></li>--}}
                    {{--                            <li><a href="#">کارت های هدیه</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="fa fa-first-order"></i> <span>سفارشات</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">تمام سفارشات</a></li>--}}
                    {{--                            <li><a href="#">در انتظار</a></li>--}}
                    {{--                            <li><a href="#">در حال پردازش</a></li>--}}
                    {{--                            <li><a href="#">تکمیل شده</a></li>--}}
                    {{--                            <li><a href="#">مرجوعی</a></li>--}}
                    {{--                            <li><a href="#">لغو شده</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="zmdi zmdi-replay"></i> <span>مرجوعی ها</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">جزییات مرجوعی</a></li>--}}
                    {{--                            <li><a href="#">دلایل مرجوعی</a></li>--}}
                    {{--                            <li><a href="#">مرجوعی های تائید شده</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="zmdi zmdi-notifications"></i> <span>اطلاع رسانی ها</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">ایمیلی</a></li>--}}
                    {{--                            <li><a href="#">پیامکی</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="fa fa-ticket"></i> <span>تیکت ها</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">بسته شده</a></li>--}}
                    {{--                            <li><a href="#">در حال بررسی</a></li>--}}
                    {{--                            <li><a href="#">باز</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="fa fa-calculator"></i> <span>حسابداری</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">فروش ها</a></li>--}}
                    {{--                            <li><a href="#">تسویه حساب ها</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="fa fa-cubes"></i> <span>انبارداری</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <li><a href="#">موجودی</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}

                    {{--                    <li class="treeview">--}}
                    {{--                        <a href="#"><i class="zmdi zmdi-settings"></i> <span>تنظیمات</span> <i class="fa fa-angle-left"></i></a>--}}
                    {{--                        <ul class="treeview-menu">--}}
                    {{--                            <!-- تنظیمات فوتر-برچسب ها-تنظیمات عمومی(لوگو و ...) -  -->--}}
                    {{--                            <li><a href="#">تنظیمات عمومی</a></li>--}}
                    {{--                            <!-- استان و شهر و ... -  -->--}}
                    {{--                            <li><a href="#">تنظیمات فروشگاه</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li><a href="#"><i class="zmdi zmdi-cloud-done"></i><span>بکاپ گیری</span></a></li>--}}
                </ul>
            </nav>
        </div>
    </div>
</div>
