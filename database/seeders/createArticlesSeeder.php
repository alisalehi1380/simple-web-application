<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class createArticlesSeeder extends Seeder
{

    public function run()
    {
        Article::create([
            'user_id'      => '1',
            'title'        => 'بازاریابی درونگرا : تعریف، مزایا و نحوه اجرا',
            'slug'         => 'بازاریابی_درونگرا_:_تعریف،_مزایا_و_نحوه_اجرا',
            'summery'      => 'بازاریابی درونگرا یک استراتژی مشتری محور است که به جذب مشتریان احتمالی کمک می‌کند. پایه و بنای اصلی این روش بازاریابی محتواست.',
            'description'  => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
            'image'        => 'Assets/Data/weblog/articles/marketing.jpg',
            'tags'        => '["درونگرا", "بازاریابی"]',
            'read_time'    => '12',
            'persian_date' => '1401/02/20',
            'updated_at'   => new \DateTime(),
            'created_at'   => new \DateTime(),
        ]);

        for ($x = 1; $x <= 5; $x++) {
            Article::create([
                'user_id'     => '1',
                'title'       => 'چرا از لینوکس استفاده میکنم؟',
                'slug'        => 'چرا_از_لینوکس_استفاده_میکنم؟',
                'summery'     => 'دلایل فنی و علمی و سلیقه ای لینوکس رو باهم دیگه یه مروری میکنیم',
                'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                'image'       => 'Assets/Data/weblog/articles/marketing.jpg',
                'tags'        => '["درونگرا", "بازاریابی"]',
                'read_time'   => '5',
                'persian_date' => '1401/02/30',
                'updated_at'  => new \DateTime(),
                'created_at'  => new \DateTime(),
            ]);
        }
    }
}