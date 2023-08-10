<?php

namespace App\Services\Poster;

use FaGD\PPersianRender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class createStoryPoster
{

    private string $first_line;
    private string $second_line;
    private string $img;

    // story template
    private $template = __DIR__ . 'app/Services/Poster/resources/templates/story-template.png';
    private $font = __DIR__ . 'app/Services/Poster/resources/fonts/qatar.ttf';

    private $storyPoster = __DIR__ . 'app/Services/Poster/resources/posters/story';
    private $templateWithText = __DIR__. 'app/Services/Poster/resources/templates/template-with-text.jpg';


    private $fromTopToText = 850; //px
    private $lineHeight = 60; //px

    // for fit img to width & height template
    private $width = 1024; //px
    private $height = 1280; //px

    public function __construct($first_line, $second_line, $img)
    {
        $this->first_line = $first_line;
        $this->second_line = $second_line;
        $this->img = $img;
    }

//        $first_line = 'کناره گیری قهرمان ایران به';
//        $second_line = 'نفع رکابزنان جوان';

    public function create()
    {
        $this->putTextToTemplate();
        $this->insertTemplateToImg();

    }

    public function putTextToTemplate()
    {
        $image = Image::make($this->template);
        // run 2 time
        for ($i = 1; $i <= 2; $i++) {
            $text = PPersianRender::render(($i = 1 ? $this->first_line : $this->second_line), true); //Reversed text for GD
            $image->text($text, $image->getWidth() / 2, ($i = 1) ? $this->fromTopToText : $this->fromTopToText + $this->lineHeight, function ($font) {
                $font->file($this->font);
                $font->align('center');
                $font->valign('middle');
                $font->size(40);
                $font->color('#ffffff');
            });
        }
        $image->save($this->templateWithText);
    }

    private function insertTemplateToImg()
    {
        $image = Image::make($this->img);
        $image->fit($this->width, $this->height);
        $image->insert($this->templateWithText)->save($this->storyPoster);
    }

    public function indexBlogPoster()
    {
        return view('Admin.blog-poster', [
//            'posts' => WPost::where('post_type' , 'post')->where('post_status', 'publish')->get()
        ]);
    }

    public function createStoryPoster(Request $request)
    {
        $request->validate([
            'img' => 'required|image|max:2048',
        ]);

        $img = $request->file('img');
        $path = 'blog/wp-content/blog/poster';
        $imgName = $img->getClientOriginalName();
        $request->img->move($path, $imgName);

        $storyPoster = new storyPoster($request->first_line, $request->second_line, $path.'/'.$imgName);
        $storyPoster->create();
    }
}
