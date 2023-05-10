<?php

namespace App\Constants;

class SweetAlertToast
{
//--------------------------------------- error ---------------------------------------
    // ForgetPassword Controller
    public const notCorrectInterCode = 'کد وارد شده صحیح نیست.';
    public const expireTokenTime = 'زمان انقضا کد به پایان رسیده است. لطفا مجددا امتحان کنید.';
    public const moreThanSpecifiedLimit_tryAfter = "تعداد تلاش های شما بیش از حد مجاز بوده است !<br/> لطفا 30 دقیقه دیگر مجددا امتحان کنید.";


//--------------------------------------- success ---------------------------------------
    public const loginSuccess = 'با موفقیت وارد شدید.';
    public const changePasswordSuccess = 'رمز شما با موفقیت تغییر کرد.';
    public const changeProfileSuccess = 'پروفایل شما با موفقیت تغییر کرد.';

    public const createArticleSuccess = 'مقاله با موفقیت ایجاد شد.';
    public const updateArticleSuccess = 'مقاله شما با موفقیت تغییر کرد.';

//--------------------------------------- warning (please) ---------------------------------------
    public const pleaseFirstSignup = 'لطفا ابتدا ثبت نام کنید';
    public const pleaseRetry = 'خطایی پیش آمده است، لطفا مجدد امتحان کنید.';
    public const pleaseFirstVerifyPhoneNumber = 'لطفا ابتدا شماره موبایل خود را تایید کنید.';



    public const sendTokenConfirmSMS = 'کد تایید شماره موبایل برای شما ارسال شد';
    public const incorrectPassword = 'رمز فعلی وارد شده، صحیح نیست.';

}
