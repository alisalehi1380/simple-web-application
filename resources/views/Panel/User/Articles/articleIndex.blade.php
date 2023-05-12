@extends('Panel.Layouts.master-panel')
@section('title' ,  'مقاله '.$article->title)
@include('Panel.layouts.modals.articles.articleDeleteModal')

@section('style')
    <style>
        @media (max-width: 768px) {
            .img-author {
                width: auto !important;
                max-width: 90px !important;
                max-height: 90px !important;
            }

            .author-info {
                display: none;
            }
        }

        .img-author {
            border-radius: 100%;
            height: 90px !important;
            width: 90px !important;
            max-width: 90px !important;
        }
    </style>
@endsection

@section('content')
    <div style="margin:20px auto; max-width: 740px" class="">
        <div style="background-color: #fff; border-radius: 3px; padding: 1rem 0.65rem;" class="">
            {{--// author --}}
            <div class="m-0 pr-3 pl-3">
                <div style="display: block;margin-bottom: 30px;">
                    <a class="btn btn-success" href="{{ route('userPanel.articles.edit' , $article->id) }}">ویرایش</a>
                    <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#article_delete">حذف</button>
                </div>
                <div class="d-flex">
                    <div class="" style="margin-left:0.8rem !important;">
                        <a href="#"> {{--//todo href --}}
                            <img class="img-author" style="" src="{{ $author->profile_image }}" alt="{{ $author->first_name.' '.$author->last_name }}"> {{-- todo href --}}
                        </a>
                    </div>
                    <div class="align-self-center author_info">
                        {{--// author name--}}
                        <div>
                            <a style="font-size: 1.2rem; font-weight:600" href=""> {{-- todo href --}}
                                {{ $author->first_name.' '.$author->last_name }}
                            </a>
                        </div>
                        <div>
                            {{--// author desc--}}
                            <p class="mb-2 author-info" style="color: #7c7c7c">علی صالحی هستم. دانشجو ترم 8 علوم ورزشی. علاقمند به دوچرخه سواری</p> {{-- todo author desc --}}
                        </div>
                        {{--// read time--}}
                        <div>
                            <span style="color: #c8c8c8" class="">{{ $date_diff }} پیش</span>
                            /
                            <span style="color: #c8c8c8" class="">خواندن {{ $article->read_time }} دقیقه</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="p-3" style="padding: 0;">
                @if(isset($article->image))
                    <div class="mb-4 d-flex justify-content-center">
                        <img style="max-height: 500px;" src="{{ $article->image }}" alt="{{ $article->slug }}">
                    </div>
                @endif
                <div class="">
                    <h1 class="mb-4" style="font-size: 2rem;">{{ $article->title }}</h1>
                    <div class="">
                        <p class="" style="font-size: 1.1rem;line-height: 2;">{!! $article->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





