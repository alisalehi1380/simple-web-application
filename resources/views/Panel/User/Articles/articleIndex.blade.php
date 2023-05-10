@extends('Panel.Layouts.master-panel')

@section('title' ,  'مقاله '.$article->slug)

@section('content')

    <div class="col-12 col-lg-12 box-margin height-card">
        <div class="card card-body">
            <div class="d-flex">
                <div style="margin-left:0.8rem !important;">
                    <a href="">
                        <img style=" border-radius: 100%;height: 90px;width: 90px;}" src="{{ $author->profile_image }}" alt="{{ $author->first_name.' '.$author->last_name }}"> {{-- todo href --}}
                    </a>
                </div>
                <div style="">
                    <div class="mb-2 pt-2">
                        <a style="font-size: 1.2rem; font-weight:600" href=""> {{-- todo href --}}
                            {{ $author->first_name.' '.$author->last_name }}
                        </a>
                    </div>
                    <p class="mb-2" style="color: #7c7c7c">درباره هوش مصنوعی، فوتبال و موسیقی می‌نویسم. علاقه زیادی به استفاده از هوش مصنوعی در تحلیل فوتبال و موسیقی دارم.</p> {{-- todo author desc --}}
                    <div style="color: #c8c8c8">
                        <span class="">۴ سال پیش</span> {{-- todo years ago --}}
                        /
                        <span class="">خواندن {{ $article->read_time }} دقیقه</span>
                    </div>
                </div>
            </div>
            <hr>

            <div class="" style="padding: 15px 350px;">
                @if(isset($article->image))
                    <div class="mb-4 d-flex justify-content-center">
                        <img style="max-height: 500px;" src="{{ $article->image }}" alt="{{ $article->slug }}">
                    </div>
                @endif
                <h1>{{ $article->title }}</h1>
                <div class="post-body renderEditorData">
                    <p class="md-block-unstyled md-block-rtl">{{ $article->description }}</p>
                </div>
            </div>

            <section class="comments" id="comments">
                <div class="container">

                    {{--                    <div class="post-suggestion">--}}
                    {{--                        <div class="section--title">شاید از این نوشته‌ها هم خوشتان بیاید</div>--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div class=" postItem js-button-action">--}}
                    {{--                                <div class="postItemContent">--}}
                    {{--                                    <a href="https://virgool.io/enline/genz-ipxnjnslchfk?source=grid_footer_post-----0-44">--}}
                    {{--                                        <div class="postItem--photo">--}}
                    {{--                                            <img class="post--cover" src="https://files.virgool.io/upload/users/13579/posts/ipxnjnslchfk/jec3b5mdshx5.jpeg?x-img=v1/resize,w_300/optimize,q_100" alt="نسل Z (نخستین نسل از بومی های دیجیتال)  و تأثیر آن بر شرکت ها">--}}
                    {{--                                        </div>--}}
                    {{--                                    </a>--}}
                    {{--                                    <div class="postItem-body">--}}
                    {{--                                        <a href="https://virgool.io/enline/genz-ipxnjnslchfk?source=grid_footer_post-----0-44">--}}
                    {{--                                            <p class="suggest-type">--}}
                    {{--                                                مطلبی دیگر از این انتشارات--}}
                    {{--                                            </p>--}}
                    {{--                                            <h5 class="postItem--title">--}}
                    {{--                                                نسل Z (نخستین نسل از بومی های دیجیتال)  و تأثیر آن بر شرکت ها--}}
                    {{--                                            </h5>--}}
                    {{--                                        </a>--}}
                    {{--                                        <div class="postItem-footer">--}}
                    {{--                                            <a href="https://virgool.io/@behnamkeshani" class="userInfo">--}}
                    {{--                                                <div class="avatar">--}}
                    {{--                                                    <img src="https://files.virgool.io/upload/users/13579/avatar/avatar.png?x-img=v1/resize,h_120,w_120/optimize,q_100" alt="Behnam Keshani">--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="more">--}}
                    {{--                                                    <span class="name">Behnam Keshani</span>--}}
                    {{--                                                    <time class="readTime">خواندن ۱۸ دقیقه</time>--}}
                    {{--                                                </div>--}}
                    {{--                                            </a>--}}
                    {{--                                            <button data-model="post" data-action-name="bookmark" data-identifier="ipxnjnslchfk" data-popover-placement="auto" class="button-bookmark js-bookmark ">--}}
                    {{--                                                <svg viewBox="0 0 18 18" width="20" height="20">--}}
                    {{--                                                    <rect fill="#ff13dc" opacity="0" width="20" height="20"></rect>--}}
                    {{--                                                    <path d="M14,1H4A.944.944,0,0,0,3,2V16.46c0,.4.5.7.8.4l5-4.987a.3.3,0,0,1,.4,0l5,4.987a.473.473,0,0,0,.8-.4V2A.944.944,0,0,0,14,1Z"></path>--}}
                    {{--                                                </svg>--}}
                    {{--                                            </button>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class=" postItem js-button-action">--}}
                    {{--                                <div class="postItemContent">--}}
                    {{--                                    <a href="https://virgool.io/enline/%D9%85%D8%B9%D8%B1%D9%81%DB%8C-%D8%B3%D8%A7%D8%B9%D8%AA-%D9%87%D9%88%D8%B4%D9%85%D9%86%D8%AF-%D8%AA%DB%8C%DA%A9%D9%88%D8%A7%DA%86-ticwatch-c2-uppsp8x4n4bq?source=grid_footer_post-----1-44">--}}
                    {{--                                        <div class="postItem--photo">--}}
                    {{--                                            <img class="post--cover" src="https://files.virgool.io/upload/users/22690/posts/uppsp8x4n4bq/2xtciyckb8td.jpeg?x-img=v1/resize,w_300/optimize,q_100" alt="معرفی ساعت هوشمند تیک‌واچ Ticwatch C2">--}}
                    {{--                                        </div>--}}
                    {{--                                    </a>--}}
                    {{--                                    <div class="postItem-body">--}}
                    {{--                                        <a href="https://virgool.io/enline/%D9%85%D8%B9%D8%B1%D9%81%DB%8C-%D8%B3%D8%A7%D8%B9%D8%AA-%D9%87%D9%88%D8%B4%D9%85%D9%86%D8%AF-%D8%AA%DB%8C%DA%A9%D9%88%D8%A7%DA%86-ticwatch-c2-uppsp8x4n4bq?source=grid_footer_post-----1-44">--}}
                    {{--                                            <p class="suggest-type">--}}
                    {{--                                                مطلبی دیگر از این انتشارات--}}
                    {{--                                            </p>--}}
                    {{--                                            <h5 class="postItem--title">--}}
                    {{--                                                معرفی ساعت هوشمند تیک‌واچ Ticwatch C2--}}
                    {{--                                            </h5>--}}
                    {{--                                        </a>--}}
                    {{--                                        <div class="postItem-footer">--}}
                    {{--                                            <a href="https://virgool.io/@tiksmart" class="userInfo">--}}
                    {{--                                                <div class="avatar">--}}
                    {{--                                                    <img src="https://files.virgool.io/upload/users/22690/avatar/mZSI6B.png?x-img=v1/resize,h_120,w_120/optimize,q_100" alt="تیک اسمارت">--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="more">--}}
                    {{--                                                    <span class="name">تیک اسمارت</span>--}}
                    {{--                                                    <time class="readTime">خواندن ۴ دقیقه</time>--}}
                    {{--                                                </div>--}}
                    {{--                                            </a>--}}
                    {{--                                            <button data-model="post" data-action-name="bookmark" data-identifier="uppsp8x4n4bq" data-popover-placement="auto" class="button-bookmark js-bookmark ">--}}
                    {{--                                                <svg viewBox="0 0 18 18" width="20" height="20">--}}
                    {{--                                                    <rect fill="#ff13dc" opacity="0" width="20" height="20"></rect>--}}
                    {{--                                                    <path d="M14,1H4A.944.944,0,0,0,3,2V16.46c0,.4.5.7.8.4l5-4.987a.3.3,0,0,1,.4,0l5,4.987a.473.473,0,0,0,.8-.4V2A.944.944,0,0,0,14,1Z"></path>--}}
                    {{--                                                </svg>--}}
                    {{--                                            </button>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class=" postItem js-button-action">--}}
                    {{--                                <div class="postItemContent">--}}
                    {{--                                    <a href="https://virgool.io/enline/%D8%AA%DA%A9%D9%86%D9%88%D9%84%D9%88%DA%98%DB%8C%D9%87%D8%A7%DB%8C%DB%8C-%DA%A9%D9%87-%D8%A2%DB%8C%D9%86%D8%AF%D9%87-%D8%A7%D9%86%D8%B3%D8%A7%D9%86-%D8%B1%D8%A7-%D9%85%D8%AA%D8%AD%D9%88%D9%84-%D9%85%DB%8C%DA%A9%D9%86%D9%86%D8%AF-vvfh2c9xcqe8?source=grid_footer_post-----2-44">--}}
                    {{--                                        <div class="postItem--photo">--}}
                    {{--                                            <img class="post--cover" src="https://files.virgool.io/upload/users/41294/posts/vvfh2c9xcqe8/jhunf5nzkaxw.jpeg?x-img=v1/resize,w_300/optimize,q_100" alt="تکنولوژی‌هایی که آینده انسان را متحول می‌کنند">--}}
                    {{--                                        </div>--}}
                    {{--                                    </a>--}}
                    {{--                                    <div class="postItem-body">--}}
                    {{--                                        <a href="https://virgool.io/enline/%D8%AA%DA%A9%D9%86%D9%88%D9%84%D9%88%DA%98%DB%8C%D9%87%D8%A7%DB%8C%DB%8C-%DA%A9%D9%87-%D8%A2%DB%8C%D9%86%D8%AF%D9%87-%D8%A7%D9%86%D8%B3%D8%A7%D9%86-%D8%B1%D8%A7-%D9%85%D8%AA%D8%AD%D9%88%D9%84-%D9%85%DB%8C%DA%A9%D9%86%D9%86%D8%AF-vvfh2c9xcqe8?source=grid_footer_post-----2-44">--}}
                    {{--                                            <p class="suggest-type">--}}
                    {{--                                                مطلبی دیگر از این انتشارات--}}
                    {{--                                            </p>--}}
                    {{--                                            <h5 class="postItem--title">--}}
                    {{--                                                تکنولوژی‌هایی که آینده انسان را متحول می‌کنند--}}
                    {{--                                            </h5>--}}
                    {{--                                        </a>--}}
                    {{--                                        <div class="postItem-footer">--}}
                    {{--                                            <a href="https://virgool.io/@mfta" class="userInfo">--}}
                    {{--                                                <div class="avatar">--}}
                    {{--                                                    <img src="https://files.virgool.io/upload/users/41294/avatar/3ep8Wz.png?x-img=v1/resize,h_120,w_120/optimize,q_100" alt="mfta">--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="more">--}}
                    {{--                                                    <span class="name">mfta</span>--}}
                    {{--                                                    <time class="readTime">خواندن ۱۱ دقیقه</time>--}}
                    {{--                                                </div>--}}
                    {{--                                            </a>--}}
                    {{--                                            <button data-model="post" data-action-name="bookmark" data-identifier="vvfh2c9xcqe8" data-popover-placement="auto" class="button-bookmark js-bookmark ">--}}
                    {{--                                                <svg viewBox="0 0 18 18" width="20" height="20">--}}
                    {{--                                                    <rect fill="#ff13dc" opacity="0" width="20" height="20"></rect>--}}
                    {{--                                                    <path d="M14,1H4A.944.944,0,0,0,3,2V16.46c0,.4.5.7.8.4l5-4.987a.3.3,0,0,1,.4,0l5,4.987a.473.473,0,0,0,.8-.4V2A.944.944,0,0,0,14,1Z"></path>--}}
                    {{--                                                </svg>--}}
                    {{--                                            </button>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </div>
            </section>





    {{--    ===================================--}}

@endsection





