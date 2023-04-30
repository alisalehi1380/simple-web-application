<?php

namespace App\Http\Controllers\Dashboard\UserPanel;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class UserPanelController extends Controller
{
    public function index()
    {
        $carbon = Carbon::now()->setTimezone('+4:30');
//        dump($carbon->format('H'));
//        dump($carbon->format('i'));
//        dump($carbon->format('s'));
//        dd($carbon->format('s'));
        return view('Panel.User.userPanel', [
            'date'  => \verta()->format('%d %B %Y'),
        ]);
    }
}
