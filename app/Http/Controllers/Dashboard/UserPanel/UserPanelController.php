<?php

namespace App\Http\Controllers\Dashboard\UserPanel;

use App\Constants\SweetAlertToast;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\storeArticleRequest;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserPanelController extends Controller
{
    public function index()
    {
        return view('Panel.User.userPanel', [
            'date' => \verta()->format('%d %B %Y'),
        ]);
    }

    public function articleLists()
    {
        return view('Panel.User.Articles.articleList', [
            'articles' => Article::select('title', 'summery', 'tags', 'image', 'persian_date', 'slug')->get(),
        ]);
    }

    public function articleCreate()
    {
        return view('Panel.User.Articles.articleCreate');
    }

    public function articleStore(storeArticleRequest $request)
    {
        $read_time = $this->reading_time($request->description);
        $persian_date = verta(carbon::now())->format('y-n-j');

//        ------------------------- todo install slugable package -------------------------
        $imageName = $this->imageRename($request);
        $this->imageSaveToStorage($request, $imageName);
//        ----------------------------------------------------------------------------------

        dd('end');

        article::create([
            'title'        => $request->title,
////            'slug'       => $request->slugable, //todo add slug package
            'summery'      => $request->summery,
            'description'  => $request->description,
//            'image'        => $imagename, //todo handle slug package
            'read_time'    => $read_time,
            'persian_date' => $persian_date,
//            'tags'         => $request->tags,
        ]);

        toast(sweetalerttoast::createarticlesuccess, 'success');
        return redirect()->back();
    }

    /**
     * @param string $content
     * @return int
     */
    private function reading_time(string $content): int
    {
        $word_per_minute = 200;
        $words = count(explode(" ", strip_tags($content)));
        return ceil($words / $word_per_minute);
    }

    /**
     * imageRename for correct saving to database
     * @param Request $request
     * @return string
     */
    private function imageRename(Request $request): string
    {
        $clientOriginalExtension = $request->file('image')->getclientoriginalextension();
        $slug = $request->title; //todo install slugable package
        $carbon = Carbon::now()->setTimezone("+3:30");
        $now = $carbon->getTimestamp();
        $time = $carbon->format('His');
        $date = verta($now)->format('Y_m_d');
        return $date . '_' . $time . '_' . $slug . '.' . $clientOriginalExtension;
    }

    /**
     * @param Request $request
     * @param string $imageName
     * @return void
     */
    private function imageSaveToStorage(Request $request, string $imageName): void
    {
        $request->file('image')->storeAs('public/articles/' . auth()->id(), $imageName);
    }
}


// 'public/image'.$article->image todo single page article
