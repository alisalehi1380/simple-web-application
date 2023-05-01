<nav aria-label="خرده نان" class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a style="{{ request()->routeIs('panel.user')?'font-weight: 600':'' }}" href="{{ route('panel.user') }}">خانه</a></li>
        {{--        <li class="breadcrumb-item"><a href="#">کتابخانه</a></li>--}}
        <li class="breadcrumb-item active"><a style="{{ request()->routeIs([
                                                                            'panel.user.article.list',
                                                                            'panel.user.article.create',
                                                                            ])?'font-weight: 600':'' }}" href="{{ request()->url() }}"> @yield('title')</a></li>
    </ol>
</nav>
