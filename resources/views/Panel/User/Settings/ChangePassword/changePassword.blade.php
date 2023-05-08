@extends('Panel.Layouts.master-panel')

@section('title' , 'تغییر رمز عبور')


@section('style')
    <style>

    </style>
@endsection

@section('content')

    <div class="container d-flex justify-content-center align-items-center">
        <div style="padding: 200px 0;">
            <div style="border: 1px solid white;background-color: white;border-radius: 8px;padding: 35px;width: 360px;">
                <div>
{{--                    <h2 class="text-center" style="padding-bottom: 1.5rem; font-size: 20px">رمزعبور فعلی ت رو وارد کن</h2>--}}

                    <form method="post" action="{{ route('userPanel.settings.updatePassword') }}">
                        @csrf
                        <div class="mb-3">
                            <label>پسورد فعلی:</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">
                            @error('old_password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="mb-3">
                            <label>پسورد جدید:</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                            @error('new_password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="mb-3">
                            <label>تکرار پسورد جدید:</label>
                            <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation">
                            @error('new_password_confirmation')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100" style="border-radius: 50px;">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

