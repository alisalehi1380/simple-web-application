@extends('Layouts.app')

@section('style')
    <style>
        .loginByGoogle:hover {
            background-color: #f4f4f4;
        }

        .forgetPassword:hover {
            text-decoration: underline !important;
        }
    </style>
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <div>
            <div class="" style="padding-bottom: 2.5rem;">
                <div class="d-flex justify-content-center" style="">
                    <a href="#"><img style="width: 4.5rem;border-radius: 8px;" src="{{ asset('Assets/Website/Images/yourCompanyLogo.png') }}"></a>
                </div>
            </div>
            <div style="border: 1px solid white;background-color: white;border-radius: 8px;padding: 35px;width: 360px;">
                <div>
                    <h2 class="text-center" style="padding-bottom: 1.5rem; font-size: 20px">سلام به لاراول خوش اومدید!</h2>
                    <div class="mb-3" style="">
                        <a class="btn w-100 loginByGoogle" href="{{route('loginByGoogle')}}" style="border-color: black;">
                            با گوگل
                            <svg class="svg" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.481h4.844c-.209 1.125-.843 2.078-1.796 2.717v2.258h2.908c1.702-1.567 2.684-3.874 2.684-6.615z" fill-rule="evenodd" fill-opacity="1" fill="#4285f4" stroke="none"></path>
                                <path d="M9.003 18c2.43 0 4.467-.806 5.956-2.18L12.05 13.56c-.806.54-1.836.86-3.047.86-2.344 0-4.328-1.584-5.036-3.711H.96v2.332C2.44 15.983 5.485 18 9.003 18z" fill-rule="evenodd" fill-opacity="1" fill="#34a853" stroke="none"></path>
                                <path d="M3.964 10.712c-.18-.54-.282-1.117-.282-1.71 0-.593.102-1.17.282-1.71V4.96H.957C.347 6.175 0 7.55 0 9.002c0 1.452.348 2.827.957 4.042l3.007-2.332z" fill-rule="evenodd" fill-opacity="1" fill="#fbbc05" stroke="none"></path>
                                <path d="M9.003 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.464.891 11.428 0 9.002 0 5.485 0 2.44 2.017.96 4.958L3.967 7.29c.708-2.127 2.692-3.71 5.036-3.71z" fill-rule="evenodd" fill-opacity="1" fill="#ea4335" stroke="none"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="d-flex justify-content-center"><p>یا</p></div>
                    <form method="post" action="{{ route('login.post') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control @error('data_login') is-invalid @enderror" value="{{old('data_login')}}" name="data_login" placeholder="ایمیل یا شماره موبایل">
                            @error('data_login')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="mb-3">
                            <a class="forgetPassword" style="float: left;font-size: 0.6rem;text-decoration: none;" href="{{ route('forgetPassword') }}">فراموش کرده اید؟</a>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="رمز عبور">
                            @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        {{--                <div class="mb-3 form-check">--}}
                        {{--                    <input type="checkbox" class="form-check-input" id="rememberMe">--}}
                        {{--                    <label class="form-check-label" for="rememberMe">مرا به خاطر بسپار</label>--}}
                        {{--                </div>--}}
                        <button type="submit" class="btn btn-primary w-100" style="border-radius: 50px;">ورود
                        </button>
                    </form>
                    <div class="d-flex justify-content-center" style="padding-top: 5px">
                        <p class="" style="font-size: 0.73rem;color: #3f4064;">ورود شما به معنای پذیرش<a class="mx-1 d-inline-block" href="#">شرایط لاراول</a>است</p> <!--//todo siteName -->
                    </div>
                    <div class="d-flex justify-content-center" style="padding-top: 80px;">
                        <p class="d-inline-block" style="padding-left: 4px; margin: 0px !important;">حساب کاربری ندارید؟</p>
                        <a href="{{ route('register') }}" class="text-decoration-none">ثبت نام</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

