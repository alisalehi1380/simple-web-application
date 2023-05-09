<nav aria-label="خرده نان" class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a style="{{ request()->routeIs('userPanel')?'font-weight: 600':'' }}" href="{{ route('userPanel') }}">خانه</a></li>
        <li class="breadcrumb-item active"><a style="{{ request()->routeIs([
                                                                            'userPanel.articles.list',
                                                                            'userPanel.articles.create',
                                                                            'userPanel.settings.changePassword',
                                                                            'userPanel.settings.changeProfile'
                                                                            ])?'font-weight: 600':'' }}" href="{{ request()->url() }}"> @yield('title')</a></li>
    </ol>
</nav>
