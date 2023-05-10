@extends('Panel.Layouts.master-panel')

@section('title' , 'اطلاعات پروفایل')


@section('style')
    <style>

    </style>
@endsection
@section('content')

    <div class="col-12 col-lg-12 box-margin height-card">
        <div class="card card-body">
            <h4 class="card-title">اطلاعات پروفایل</h4>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{ route('userPanel.settings.updateProfile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>نام</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}">
                                    @error('first_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="mb-3">
                                    <label>نام خانوادگی</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}">
                                    @error('last_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="mb-3">
                                    <label>ایمیل</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $user->email }}"> {{--//todo name="email" --}}
                                    <span class="invalid-feedback" style="display: inline-block !important;" role="alert"><strong>متاسفانه درحال حاضر امکان تغییر ایمیل وجود ندارد.</strong></span>
                                </div>
                                <div class="mb-3">
                                    <label>شماره موبایل</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $user->phone_number }}"> {{--//todo name="phone_number" --}}
                                    <span class="invalid-feedback" style="display: inline-block !important;" role="alert"><strong>متاسفانه درحال حاضر امکان تغییر شماره موبایل وجود ندارد.</strong></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">آپلود تصویر پروفایل</label>
                                    <input class="form-control" type="file" id="formFile" name="profile_image"> {{-- //todo profile_image --}}
                                </div>
                                @if(isset($user->profile_image))
                                    <div class="mb-4">
                                        <img src="{{ $user->profile_image }}" alt="{{ $user->first_name .'-'.$user->last_name }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success mb-2" style="float:left;">
                            <i style="padding-left: 5px;" class="fa fa-save"></i>ثبت
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>














    <div class="container d-flex justify-content-center align-items-center">
        <div style="padding: 200px 0;">
            <div style="border: 1px solid white;background-color: white;border-radius: 8px;padding: 35px;width: 360px;">
                <div>
                    {{--                    <h2 class="text-center" style="padding-bottom: 1.5rem; font-size: 20px">رمزعبور فعلی ت رو وارد کن</h2>--}}

                </div>
            </div>
        </div>
    </div>
@endsection

