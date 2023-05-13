<?php

namespace App\Http\Controllers\panel\UserPanel;

use App\Constants\SweetAlertToast;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\articleStoreRequest;
use App\Http\Requests\UserPanel\Settings\changePasswordRequest;
use App\Http\Requests\UserPanel\Settings\changeProfileRequest;
use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserPanelController extends Controller
{
    /**
     * show user panel page
     * @return View
     */
    public function index()
    {
        return view('Panel.User.userPanel', [
            'date'                  => \verta()->format('%d %B %Y'),
            'PhoneNumberIsVerified' => User::where('id', auth()->id())->where('phone_number_verified_at', true)->exists(),
        ]);
    }


//    ========================================== Articles ==========================================

    /**
     * single page article
     * @param string $slug
     * @return RedirectResponse|View
     */
    public function articleIndex(string $slug): RedirectResponse|view
    {
        $article = Article::withTrashed()->where('slug', $slug);
        $checkArticleExists = $this->checkArticleExists($article);

        if ($checkArticleExists) {
            return \view('panel.User.articles.articleIndex', [
                'article'   => $article->first(['id', 'title', 'summery', 'description', 'tags', 'image', 'persian_date', 'slug', 'read_time']),
                'author'    => User::where('id', \auth()->id())->first(['first_name', 'last_name', 'profile_image']),
                'date_diff' => $this->dateDiffNowToUpdatedArticle($slug)
            ]);
        }
        toast(SweetAlertToast::notExistsArticle, 'warning');
        return redirect()->route('userPanel');
    }

    /**
     * show article lists page
     * @return View
     */
    public function articleLists(): view
    {
        return view('Panel.User.Articles.articleList', [
            'articles' => Article::where('user_id', \auth()->id())->select('id', 'title', 'summery', 'tags', 'image', 'persian_date', 'slug')->get(),
        ]);
    }

    /**
     * show article create page
     * @return View
     */
    public function articleCreate(): View
    {
        return view('Panel.User.Articles.articleCreate');
    }

    /**
     * article saving
     * @param articleStoreRequest $request
     * @return RedirectResponse
     */
    public function articleStore(articleStoreRequest $request): RedirectResponse
    {
        $read_time = $this->readingTime($request->description);
        $persian_date = verta()->format('Y-m-j');
        $imageName = $this->correctingFileNameWithSlug('image', Article::class, 'slug', "$request->title", $request);
        $this->saveImageToStorage('image', $request, 'public/articles/' . \auth()->id(), $imageName);
        $slug = SlugService::createSlug(Article::class, 'slug', $this->DeleteHtmlSpecialChars($request->title));

        article::create([
            'user_id'      => Auth::id(),
            'title'        => $this->DeleteHtmlSpecialChars($request->title),
            'slug'         => $slug,
            'summery'      => $this->DeleteHtmlSpecialChars($request->summery),
            'description'  => $this->DeleteHtmlSpecialChars($request->description),
            'image'        => 'storage/articles/' . auth()->id() . '/' . $imageName,
            'read_time'    => $read_time,
            'persian_date' => $persian_date,
//            'tags'         => $request->tags,
        ]);

        toast(sweetalerttoast::createArticleSuccess, 'success');
        return redirect()->route('userPanel.articles.list');
    }

    /**
     * show article edit page
     * @param string $id
     * @return RedirectResponse | View
     */
    public function articleEdit(string $id): RedirectResponse | View
    {
        $article = Article::withTrashed()->where('id', $id);
        $checkArticleExists = $this->checkArticleExists($article);
        if ($checkArticleExists) {
            return \view('Panel.User.Articles.articleEdit', [
                'article' => Article::withTrashed()->where('id', $id)->first(['id', 'title', 'slug', 'summery', 'description', 'image', 'read_time'])
            ]);
        }
        toast(SweetAlertToast::notExistsArticle, 'warning');
        return redirect()->route('userPanel');
    }

    /**
     * article updating
     * @param articleStoreRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function articleUpdate(articleStoreRequest $request, string $id): RedirectResponse
    {
        $article = Article::withTrashed()->where('id', $id);

        // if the title article changes , slug will also change.
        $checkTitleChange = $this->checkTitleChange($article , $request);
        if ($checkTitleChange){
            toast(SweetAlertToast::updateArticleSuccess, 'success');
            return redirect()->route('userPanel.articles.list');
        }

        // if upload image
        $this->ifUploadImage($request, $article);

        $read_time = $this->readingTime($request->description);
        $article->update([
            'summery'     => $this->DeleteHtmlSpecialChars($request->summery),
            'description' => $this->DeleteHtmlSpecialChars($request->description),
            'read_time'   => $read_time,
//            'tags'         => $request->tags, //todo
        ]);

        toast(SweetAlertToast::updateArticleSuccess, 'success');
        return redirect()->back();
    }

    /**
     * article deleting
     * @param string $id
     * @return RedirectResponse
     */
    public function articleSoftDelete(string $id): RedirectResponse
    {
        Article::where('id', $id)->delete();
        toast(SweetAlertToast::deleteArticleSuccess, 'success');
        return redirect()->route('userPanel.articles.list');
    }

    /**
     * show trashBin articles page
     * @return View
     */
    public function articleTrashed(): View
    {
        return \view('Panel.User.Articles.articleTrashed', [
            'articlesTrashed' => Article::onlyTrashed()->get()
        ]);
    }

    /**
     * delete article for ever
     * @param string $id
     * @return RedirectResponse
     */
    public function articleHardDelete(string $id): RedirectResponse
    {
        Article::where('id', $id)->forceDelete();
        toast(SweetAlertToast::forceDeleteArticleSuccess, 'success');
        return redirect()->back();
    }

    /**
     * article restoring from trash bin
     * @param $id
     * @return RedirectResponse
     */
    public function articleRestore($id): RedirectResponse
    {
        Article::withTrashed()->where('id', $id)->restore();
        toast(SweetAlertToast::restoreArticleSuccess, 'success');
        return redirect()->route('userPanel.articles.trashed');
    }
//    ========================================== Settings ==========================================
//    -------------------- Profile --------------------
    /**
     * show change profile page
     * @return View
     */
    public function changeProfile(): View
    {
        return view('Panel.User.Settings.ChangeProfile.changeProfile', [
            'user' => User::where('id', \auth()->id())->first(['first_name', 'last_name', 'email', 'phone_number', 'profile_image']),
        ]);
    }

    /**
     * user profile updating
     * @param changeProfileRequest $request
     * @return RedirectResponse
     */
    public function updateProfile(changeProfileRequest $request): RedirectResponse
    {
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


//    -------------------- Change Password --------------------

    /**
     * user password updating
     * @param changePasswordRequest $request
     * @return RedirectResponse
     */
    public function updatePassword(changePasswordRequest $request): RedirectResponse
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


//    ========================================== helper function ==============================================

    /**
     * delete html tags in content
     * @param string $string
     * @return string
     */
    private function DeleteHtmlSpecialChars(string $string): string
    {
        return htmlspecialchars(strip_tags($string));
    }

    /**
     * calculate the time to read a text
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
     * change file name to correct formatting with slug
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
     * save profile_image to database
     * @param Request $request
     * @return void
     */
    private function saveImageProfile(Request $request): void
    {
        if ($request->hasFile('profile_image')) {
            $user = User::where('id', \auth()->id());
            $imagName = $this->correctingFileName($request, 'profile_image', $user->first()->first_name . '-' . $user->first()->last_name);
            $this->saveImageToStorage('profile_image', $request, env('PATH_USER_PROFILE_IMAGE_IN_STORAGE') . \auth()->id(), $imagName);
            $user->update([
                'profile_image' => env('PATH_USER_PROFILE_IMAGE_IN_DATABASE') . auth()->id() . '/' . $imagName
            ]);
        }
    }

    /**
     * Compares two dates
     * @param Carbon $from
     * @param Carbon $to
     * @return string
     */
    private function dateDiff(Carbon $from, Carbon $to): string
    {
        $years = $from->diffInYears($to);
        $months = $from->diffInMonths($to);
        $weeks = $from->diffInWeeks($to);
        $days = $from->diffInDays($to);
        $hours = $from->diffInHours($to);
        $minutes = $from->diffInMinutes($to);
        $seconds = $from->diffInSeconds($to);

        switch (isset($from, $to)) {
            case $years !== 0:
                return $years . 'سال';
            case $months !== 0:
                return $months . 'ماه';
            case $weeks !== 0:
                return $weeks . ' هفته';
            case $days !== 0:
                return $days . 'روز';
            case $hours !== 0:
                return $hours . 'ساعت';
            case $minutes !== 0:
                return $minutes . ' دقیقه';
            case $seconds !== 0:
                return $seconds . ' ثانیه';
        }
    }

    /**
     * It shows that this article is from some time ago.
     * @param string $slug
     * @return string
     */
    private function dateDiffNowToUpdatedArticle(string $slug): string
    {
        $article = Article::where('slug', $slug)->first('updated_at');
        $to = Carbon::parse("$article->updated_at");
        $from = now();
        return $this->dateDiff($from, $to);
    }

    /**
     * check article exists in database or not
     * @param Builder $article
     * @return bool
     */
    public function checkArticleExists(Builder $article):bool
    {
        return $article->exists();
    }

    /**
     * check title article changes or not => if changed, create slug and updating in database
     * @param Builder $article
     * @param articleStoreRequest $request
     * @return bool
     */
    private function checkTitleChange(Builder $article, articleStoreRequest $request):bool
    {
        $articleTitle = $article->first('title');
        if ($articleTitle->title !== $request->input('title')) {
            $slug = SlugService::createSlug(Article::class, 'slug', $this->DeleteHtmlSpecialChars($request->title));
            $article->update([
                'title' => $this->DeleteHtmlSpecialChars($request->title),
                'slug'  => $slug
            ]);
            return true;
        }
        return false;
    }

    /**
     * if upload image article => save to storage and update in database
     * @param articleStoreRequest $request
     * @param Builder $article
     * @return void
     */
    private function ifUploadImage(articleStoreRequest $request, Builder $article): void
    {
        if ($request->hasFile('image')) {
            $imageName = $this->correctingFileNameWithSlug('image', Article::class, 'slug', "$request->title", $request);
            $this->saveImageToStorage('image', $request, env('PATH_ARTICLES_IMAGE_IN_STORAGE') . \auth()->id(), $imageName);
            $article->update([
                'image' => env('PATH_ARTICLES_IMAGE_IN_DATABASE') . auth()->id() . '/' . $imageName,
            ]);
        }
    }
}
