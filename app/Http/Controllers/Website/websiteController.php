<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Quince\PersianGD\GDTool;

class websiteController extends Controller
{
    public function index()
    {
//        return view('welcome'); // todo 'website'
    }

    // write path from public forlder
    private $img = 'Assets/image/saeed.jpg';
    private $newImg = 'Assets/image/new/story/saeed.jpg';

    private $template = 'Assets/image/template.png';

    private $newTemplate = 'Assets/image/new/template/template.png';
    private $font = 'Assets/image/qatar.ttf';

    private $firstLine = 850;
    private $lineHeight = 60;

    // for fit img to width & height template
    private $width = 1024;
    private $height = 1280;

    public function image()
    {
        $title = 'کناره گیری قهرمان ایران به نفع رکابزنان جوان کناره گیری قهرمان ایران';
        dump($title, $array = explode(' ', $title) , implode(' ' , $array));

        $title1 = 'کناره گیری قهرمان ایران به';
        $text = \FaGD\PPersianRender::render($title1, true); //Reversed text for GD

//        $img = public_path($this->img);
        $template = public_path($this->template);
        $font = public_path($this->font);
        $newTemplate = public_path($this->newTemplate);


        $image = Image::make($template);
        $image->text($text, $image->getWidth() / 2, $this->firstLine, function ($font) {
            $font->file(public_path('Assets/image/qatar.ttf'));
            $font->align('center');
            $font->valign('middle');
            $font->size(40);
            $font->color('#ffffff');
        });

        $title2 = 'نفع رکابزنان جوان';
        $text = \FaGD\PPersianRender::render($title2, true); //Reversed text for GD
        $image->text($text, $image->getWidth() / 2, $this->firstLine + $this->lineHeight, function ($font) {
            $font->file(public_path('Assets/image/qatar.ttf'));
            $font->align('center');
            $font->valign('middle');
            $font->size(40);
            $font->color('#ffffff');
        });

        $image->save($newTemplate);

        $this->insertTemplateToImg();
    }

    private function fitImg($image)
    {
        $image->fit($this->width, $this->height);
    }

    private function insertTemplateToImg()
    {
        $img = public_path($this->img);
        $newTemplate = public_path($this->newTemplate);
        $newImg = public_path($this->newImg);

        $image = Image::make($img);
        $this->fitImg($image);
        $image->insert($newTemplate)->save($newImg);
    }

}
