@extends('Panel.Layouts.master-panel')
@section('title' , 'لیست مقالات')
@section('content')
    <div class="row">
        <div class="col-md-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="">لیست مقالات</h4>
                    <a href="{{ route('userPanel.articles.create') }}" class="btn btn-warning mb-2 mr-2" style="float:left;margin-top:-37px;">
                        <i class="fa fa-plus-square"></i> افزودن
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr style="background-color: #e9ecef;">
                                <th>شماره</th>
                                <th>عنوان</th>
                                <th>خلاصه</th>
                                <th>تصویر</th>
                                <th>تگ ها</th>
                                <th>تاریخ تالیف</th>
                                <th>عملیات</th>
                                {{--                                                        <th>وضعیت</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr style="overflow: scroll; height: 60px;">
                                    <td>{{ $article->id }}</td>
                                    <td style="width: 20%"><a href="{{ route('userPanel.articles.index' , $article->slug) }}">{{ $article->title }}</a></td>
                                    <td style="width: 30%">{{ $article->summery }}</td>
                                    <td style="width: 10%">
                                        <a target="_blank" href="{{ url($article->image) }}"><img style="max-height: 60px;width: auto;" src="{{ url($article->image) }}" alt="{{ $article->slug }}"></a>
                                    </td>
                                    <td style="width: 10%">
                                        @foreach (json_decode($article->tags) as $tag)
                                            <a href="#"><span class="badge badge-pill badge-info"> {{ $tag }} </span></a>
                                        @endforeach
                                    </td>
                                    <td style="width: 10%">{{ $article->persian_date }}</td>
                                    <td style="width: 10%">
                                        <button class="btn btn-danger" type="button" data-toggle="button" aria-pressed="false">حذف</button>
                                        <a href="{{ route('userPanel.articles.edit'  , $article->id) }}" class="btn btn-success">ویرایش</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
