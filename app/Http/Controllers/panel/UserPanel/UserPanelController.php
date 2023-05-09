<?php

namespace App\Http\Controllers\panel\UserPanel;

use App\Constants\SweetAlertToast;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\storeArticleRequest;
use App\Http\Requests\UserPanel\Settings\changePasswordRequest;
use App\Http\Requests\UserPanel\Settings\changeProfileRequest;
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
            'date'                  => \verta()->format('%d %B %Y'),
            'PhoneNumberIsVerified' => User::where('id', auth()->id())->where('phone_number_verified_at', true)->exists(),
        ]);
    }

    public function articleLists()
    {
        return view('Panel.User.Articles.articleList', [
            'articles' => Article::where('user_id', \auth()->id())->select('title', 'summery', 'tags', 'image', 'persian_date', 'slug')->get(),
        ]);
    }

    public function articleCreate()
    {
        return view('Panel.User.Articles.articleCreate');
    }

    public function articleStore(storeArticleRequest $request)
    {
        $read_time = $this->readingTime($request->description);
        $persian_date = verta()->format('Y-n-j');
        $imageName = $this->correctingFileNameWithSlug('image', Article::class, 'slug', "$request->title", $request);
        $this->saveImageToStorage('image', $request, 'public/articles/' . \auth()->id(), $imageName);
        $slug = SlugService::createSlug(Article::class, 'slug', $this->DeleteHtmlSpecialChars($request->title));

        article::create([
            'user_id'      => Auth::id(),
            'title'        => $this->DeleteHtmlSpecialChars($request->title),
            'slug'         => $slug,
            'summery'      => $this->DeleteHtmlSpecialChars($request->summery),
            'description'  => $this->DeleteHtmlSpecialChars($request->description),
            'image'        => $imageName,
            'read_time'    => $read_time,
            'persian_date' => $persian_date,
//            'tags'         => $request->tags,
        ]);

        toast(sweetalerttoast::createArticleSuccess, 'success');
        return redirect()->route('userPanel.articles.list');
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

    public function changeProfile()
    {
        return view('Panel.User.Settings.ChangeProfile.changeProfile', [
            'userData' => User::where('id', \auth()->id())->select('first_name', 'last_name', 'email', 'phone_number', 'profile_image')->get(),
        ]);
    }

    public function updateProfile(changeProfileRequest $request)
    {

//        dd($request->all());

        User::where('id', \auth()->id())->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
//            'email' => $request->email,
//            'phone_number' => $request->phone_number,
        ]);

        $this->saveImageProfile($request);

        toast(SweetAlertToast::changeProfileSuccess, 'success');
        return redirect()->back();
    }


    /**
     * @param $string
     * @return string
     */
    private function DeleteHtmlSpecialChars($string): string
    {
        return htmlspecialchars(strip_tags($string));
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
     * change file name to
     * date/time/file_name.format => 1402_02_14_224837_علی-صالحی.PNG
     * @param string $input_name
     * @param $model
     * @param $createSlugFrom
     * @param string $string
     * @param Request $request
     * @return string
     */
    private function correctingFileNameWithSlug(string $input_name, $model, $createSlugFrom, string $string, Request $request,): string
    {
        $clientOriginalExtension = $request->file($input_name)->getclientoriginalextension();
        $slug = SlugService::createSlug($model, $createSlugFrom, $string);
        $carbon = Carbon::now();
        $now = $carbon->getTimestamp();
        $time = $carbon->format('His');
        $date = verta($now)->format('Y_m_d');
        return $date . '_' . $time . '_' . $slug . '.' . $clientOriginalExtension;
    }

    /**
     * save image to storage path
     * @param string $input_name
     * @param Request $request
     * @param string $imageName
     * @param string $path
     * @return void
     */
    private function saveImageToStorage(string $input_name, Request $request, string $path, string $imageName): void
    {
        if ($request->hasFile($input_name)) {
            $request->file($input_name)->storeAs($path, $imageName);
        }
    }


    /**
     * change file name to correct formatting
     * date/time/file_name.format => 1402_02_14_224837_file_name.PNG
     * @param Request $request
     * @param string $input_name
     * @param string $file_name write snake_case format
     * @return string
     */
    private function correctingFileName(Request $request, string $input_name, string $file_name): string
    {
        $clientOriginalExtension = $request->file($input_name)->getclientoriginalextension();
        $carbon = Carbon::now();
        $now = $carbon->getTimestamp();
        $time = $carbon->format('His');
        $date = verta($now)->format('Y_m_d');
        return $date . '_' . $time . '_' . $file_name . '.' . strtolower($clientOriginalExtension);
    }

    /**
     * @param Request $request
     * @return void
     */
    private function saveImageProfile(Request $request): void
    {
        if ($request->hasFile('profile_image')) {
            $user = User::where('id', \auth()->id());
            $imagName = $this->correctingFileName($request, 'profile_image', $user->first()->first_name . '_' . $user->first()->last_name);
            $this->saveImageToStorage('profile_image', $request, 'public/profile_image/' . \auth()->id(), $imagName);
            $user->update([
                'profile_image' => $imagName
            ]);
        }
    }


}



// 'public/image'.$article->image todo single page article
