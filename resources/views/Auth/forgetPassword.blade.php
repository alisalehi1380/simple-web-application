@extends('Layouts.app')

@section('style')
    <style>

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
                    <h2 class="text-center" style="padding-bottom: 1.5rem; font-size: 20px">رمزت رو فراموش کردی؟</h2>
                    <p>شماره موبایلت رو وارد کن، کد تایید رو برات میفرستیم</p>

                    <form method="post" action="{{ route('forgetPassword.sendForgetPasswordSMS') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number')}}" name="phone_number" placeholder="شماره موبایل">
                            @error('phone_number')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100" style="border-radius: 50px;">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

