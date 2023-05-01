<?php

namespace App\Http\Controllers\Dashboard\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Article;
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
            'date' => \verta()->format('%d %B %Y'),
        ]);
    }

    public function articleLists()
    {
        return view('Panel.User.Articles.articleList', [
            'articles' => Article::select('title', 'summery', 'tags', 'image', 'persian_date' , 'slug')->get(),
        ]);
    }

    public function articleCreate()  //todo createArticleRequest $request
    {

//      $read_time = $this->reading_time($request->description);
        $persian_date = verta(Carbon::now())->format('Y-n-j');

//        Article::create([
//            'title'        => $request->title,
////            'slug'       => $request->slugable, //todo add package
//            'summery'      => $request->summery,
//            'description'  => $request->description,
//            'image'        => $request->image,
//            'read_time'    => $read_time, //todo
//            'persian_date' => $persian_date, //todo
//            'tags'         => $request->tags,
//        ]);

        return view('Panel.User.Articles.articleCreate');
    }


    private function reading_time($content)
    {
        $word_per_minute = 200;
        $words = count(explode(" ", strip_tags($content)));
        return ceil($words / $word_per_minute);
    }
}
