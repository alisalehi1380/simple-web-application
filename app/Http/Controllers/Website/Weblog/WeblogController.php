<?php

namespace App\Http\Controllers\Website\Weblog;

use App\Http\Controllers\Controller;
use App\Models\Article;



class WeblogController extends Controller
{
    public function index()
    {
//        dump(\verta('2023-04-30')->format('Y-n-j')); //todo save for persian_date


        return view('Website.Weblog.weblog', [
            'articles' => Article::select('title', 'summery', 'slug', 'read_time', 'tags', 'image', 'persian_date')->get(),

        ]);
    }
}
