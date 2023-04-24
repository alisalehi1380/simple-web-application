<?php

namespace App\Http\Controllers\Dashboard\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPanelController extends Controller
{
    public function index()
    {
        return route('user.panel');
    }
}
