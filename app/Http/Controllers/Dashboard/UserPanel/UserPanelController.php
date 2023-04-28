<?php

namespace App\Http\Controllers\Dashboard\UserPanel;

use App\Http\Controllers\Controller;

class UserPanelController extends Controller
{
    public function index()
    {
//            $clock = $carbon->format('H:i:s'); todo
        return view('Panel.User.userPanel', [
            'date' => \verta()->format('%d %B %Y'),
        ]);
    }
}
