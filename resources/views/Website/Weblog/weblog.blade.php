@extends('Layouts.app')

@section('style')
    <link href="{{ asset('Assets/Website/weblog/css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
{{--    @dump($articles[1]->tags[3])--}}


        <div id="card" class="album bg-light pt-120">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-9 row">
                        <h1 class="text-center mb-4">پست ها</h1>
                        @foreach($articles as $article)
{{--    @dd($article->image)--}}
                            <div class="col-sm-6 col-md-6 col-lg-4 article">
                                <div class="card mb-4 box-shadow div-card">
                                    <div class="card-header-art">
                                        <img class="card-img-top img-card"
                                             src="{{asset("$article->image")}}"  {{-- {{asset('data/articles/').'/'.$article->id.'/'.$article->primary_image}} --}}
                                             alt="{{$article->slug}}"
                                        >
                                    </div>
                                    <div class="card-body">
                                        <span class="badge p_pill badge-info">
    {{--                                        <a href="#">#{{($article->postCategories->first()->name ?? '')}}</a>--}}
                                        </span>

                                        <a class="content-card" href=""> {{-- {{ route('showArticle',$article->slug) }} --}}
                                            <h2>{{$article->title}}</h2>
                                            <p class="card-text descrip">{{$article->summery}}</p>
                                        </a>
                                        <div class="d-flex justify-content-between align-items-center detail-post">
                                            <div class="d-flex align-items-center">
                                                <div class="div-img-card">
                                                    <img class="img-prof-card"
    {{--                                                     src="{{asset('data/profiles/'.$article->user_id).'/'.$article->user->profile_image }}"--}}
    {{--                                                     alt="{{$article->user->fullname}}"--}}
                                                    >
                                                </div>
                                                <a class="fullName" href="#">{{$article->user_id}}</a>
                                            </div>
    {{--                                        @php(new \App\Services\ReadingTime($article->data))--}}
                                            <small class="text-muted">زمان مطالعه: {{ $article->read_time }} دقیقه</small> {{--{{round(\App\Services\ReadingTime::minutes())}} --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

{{--                        --------------------- sideBar -----------------------}}
                    <div class="col-md-3 sidebar">
                        <h3 class="text-center">محبوب‌ترین‌های لاراول</h3>
                        <div>
                            <ul>
                                @foreach($articles as $article) {{-- //$popularArticles --}}
                                    <section>
    {{--                                    <a href="{{ route('showArticle',$article->slug) }}" class="list-group-item list-group-item-action py-3 lh-tight">--}}
                                            <div class="d-flex w-100 align-items-center header-pup">
                                                <img class="prof_user_popular"
    {{--                                                 src="{{asset('data/profiles/'.$article->user_id).'/'.$article->user->profile_image }}"--}}
    {{--                                                 alt="{{$article->title}}"--}}
                                                >
                                                <h4 class="mb-1">gh</h4>
                                            </div>
                                            <div class="d-flex justify-content-between detail-post body-pup">
    {{--                                            <p class="a_card">{{$article->user->fullname}}</p> --}}{{-- //todo insert single page writer --}}
                                                <small class="text-muted">{{$article->persian_date}}</small>
                                            </div>
                                        </a>
                                    </section>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
