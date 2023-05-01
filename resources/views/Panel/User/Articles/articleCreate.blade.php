@extends('Panel.Layouts.master-panel')

@section('title' , 'افزودن مقاله')

@section('content')

    {{--     //todo create Article --}}
    <div class="col-12 col-lg-9 box-margin height-card">
        <div class="card card-body">
            <h4 class="card-title">افزودن مقاله</h4>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form>
                        <div class="form-group">
                            <label for="title">عنوان مقاله:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="summery">خلاصه مقاله:</label>
                            <textarea class="form-control" rows="3" id="summery" name="summery">{{ old('summery') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">متن مقاله:</label>
                            <textarea class="form-control" rows="10" id="description" name="description">{{ old('description') }}</textarea>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="">تگ ها:</label>--}}
                            {{--                            <select class="form-control" id="meta-description"></select>--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:left;"><i class="fa fa-save"></i> ذخیره</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-3 box-margin height-card">
        <div class="card card-body">
            <h4 class="card-title">اطلاعات پایه مقاله</h4>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail12">نویسنده مقاله:</label>
                            <select class="js-example-basic-single form-control select2-hidden-accessible" name="" style="width: 100%;" data-select2-id="select2-data-1-sbbc" tabindex="-1" aria-hidden="true">
                                <option value="AL" data-select2-id="select2-data-3-dve8">Alabama</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-2-nngu" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2--bi-container" aria-controls="select2--bi-container"><span class="select2-selection__rendered" id="select2--bi-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                        <div class="input-group cust-file-button mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="inputGroupFile03">
                                <label class="custom-file-label" for="inputGroupFile03">تصویر شاخص</label>
                            </div>
                        </div>
{{--                        <div class="form-group mb-3">--}}
{{--                            <label>تاریخ انتشار:</label>--}}
{{--                            <input type="text" id="pdpF2" class="form-control usage pdp-el" pdp-id="pdp-892957">--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="exampleInputEmail12">دسته بندی ها:</label>
                            <select class="js-example-basic-single form-control select2-hidden-accessible" multiple="" name="" style="width: 100%;" data-select2-id="select2-data-4-1nzk" tabindex="-1" aria-hidden="true">
                                <option value="AL">Alabama</option>
                            </select>
{{--                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-5-6zvf" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered" id="select2--d2-container"></ul><span class="select2-search select2-search--inline"><textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search" aria-describedby="select2--d2-container" placeholder="" style="width: 0.75em;"></textarea></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail12">برچسب ها:</label>
                            <select class="js-example-basic-single form-control select2-hidden-accessible" multiple="" name="tags" style="width: 100%;" data-select2-id="select2-data-6-53ok" tabindex="-1" aria-hidden="true">
{{--                                @foreach($tags as $tag)--}}
                                <option value="">برونگرا</option>
                                <option value="">بازاریابی</option>
{{--                                @endforeach--}}
                            </select>
{{--                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-7-7lj4" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered" id="select2--xo-container"></ul><span class="select2-search select2-search--inline"><textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search" aria-describedby="select2--xo-container" placeholder="" style="width: 0.75em;"></textarea></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                        </div>
                        <div class="checkbox checkbox-primary d-inline">
                            <input type="checkbox" name="checkbox-p-1" id="checkbox-p-1" checked="">
                            <label for="checkbox-p-1" class="cr">فعال</label>
                        </div>
                        <button type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:left;"><i class="fa fa-save"></i> ذخیره</button>
                    </form>
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

