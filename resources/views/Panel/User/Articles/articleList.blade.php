@extends('Panel.Layouts.master-panel')

@section('title' , 'لیست مقالات')

@section('content')
    <div class="col-md-12 box-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="">لیست مقالات</h4>
                <a href="{{ route('userPanel.article.create') }}" class="btn btn-warning mb-2 mr-2" style="float:left;margin-top:-37px;">
                    <i class="fa fa-plus-square"></i> افزودن
                </a>
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr style="background-color: #e9ecef;">
                            <th>عملیات</th>
                            <th>عنوان</th>
                            <th>خلاصه</th>
                            <th>تصویر</th>
                            <th>تگ ها</th>
                            <th>تاریخ تالیف</th>
                            {{--                                                        <th>وضعیت</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr style="overflow: scroll; height: 60px;">
                                <td style="width: 10%">
                                    <a href="#" class="btn btn-danger">حذف</a>
                                    <a href="#" class="btn btn-success">ویرایش</a>
                                </td>
                                <td style="width: 20%"><a href="#">{{ $article->title }}</a></td> {{--todo {{ route('userPanel.article.show' , $article->slug ?? '') }} --}}
                                <td style="width: 30%">{{ $article->summery }}</td>
                                <td style="width: 10%">
                                    <a href="{{ asset($article->image) }}"><img style="max-height: 60px;width: auto;" src="{{ asset($article->image) }}"></a>
                                </td>
                                <td style="width: 10%">
                                    @foreach (json_decode($article->tags) as $tag)
                                        <a href="#"><span class="badge badge-pill badge-info"> {{ $tag }} </span></a>
                                    @endforeach
                                </td>
                                <td style="width: 10%">{{ $article->persian_date }}</td>
                                {{--                                <td>dd</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection




{{--<div class="card card-body">--}}
{{--    <h4 class="card-title">فرم های اصلی</h4>--}}
{{--    <div class="row">--}}
{{--        <div class="col-sm-12 col-xs-12">--}}
{{--            <form>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail111">نام کاربری</label>--}}
{{--                    <input type="text" class="form-control" id="exampleInputEmail111" placeholder="نام">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail12">آدرس ایمیل</label>--}}
{{--                    <input type="email" class="form-control" id="exampleInputEmail12" placeholder="ایمیل">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputPassword11">کلمه عبور</label>--}}
{{--                    <input type="password" class="form-control" id="exampleInputPassword11" placeholder="رمز عبور">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputPassword12">کلمه عبور</label>--}}
{{--                    <input type="password" class="form-control" id="exampleInputPassword12" placeholder="تکرار رمز عبور">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <div class="custom-control custom-checkbox mr-sm-2">--}}
{{--                        <input type="checkbox" class="custom-control-input" id="checkbox1" value="check">--}}
{{--                        <label class="custom-control-label" for="checkbox1">مرا به خاطر بسپار</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-primary mr-2">ارسال</button>--}}
{{--                <button type="submit" class="btn btn-danger">لغو</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

