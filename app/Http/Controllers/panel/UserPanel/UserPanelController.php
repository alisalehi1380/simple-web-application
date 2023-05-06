<?php

namespace App\Http\Controllers\panel\UserPanel;

use App\Constants\SweetAlertToast;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\storeArticleRequest;
use App\Http\Requests\UserPanel\changePasswordRequest;
use App\Http\Requests\UserPanel\CheckPasswordInputRequest;
use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $read_time = $this->readingTime($request->description);
        $persian_date = verta(carbon::now())->format('y-n-j');
        $imageName = $this->imageRename($request);
        $this->imageSaveToStorage($request, $imageName);
        $slug = SlugService::createSlug(Article::class, 'slug', "$request->title");

        article::create([
            'user_id'      => Auth::id(),
            'title'        => $request->title,
            'slug'         => $slug,
            'summery'      => $request->summery,
            'description'  => $request->description,
            'image'        => $imageName,
            'read_time'    => $read_time,
            'persian_date' => $persian_date,
//            'tags'         => $request->tags,
        ]);

        toast(sweetalerttoast::createArticleSuccess, 'success');
        return redirect()->back();
    }

    public function updatePassword(changePasswordRequest $request)
    {
        $user_id = \auth()->id();
        $getUser = User::where('id', $user_id)->first();
        $passwordInDatabase = $getUser->password;
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');

        if (Hash::check($old_password, $passwordInDatabase)) {
            $getUser->update([
                'password' => bcrypt($new_password)
            ]);
            toast(SweetAlertToast::changePasswordSuccess, 'success');
            return redirect()->route('userPanel');
        }
        toast(SweetAlertToast::incorrectPassword, 'error');
        return redirect()->back();
    }

    /**
     * @param string $content
     * @return int
     */
    private function readingTime(string $content): int
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
        $slug = SlugService::createSlug(Article::class, 'slug', "$request->title");
        $carbon = Carbon::now();
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
