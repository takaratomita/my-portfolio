{{-- {{dd(print_r(mb_get_info("all")));}} --}}

<x-layout>
    <x-slot name="title">
        たからのポートフォリオサイト | 携わった作品とブログを公開しています
    </x-slot>
    <x-slot name="admin">
        false
    </x-slot>
    <x-slot name="body_class">
        home
    </x-slot>

    <section class="sec-content" id="top-works">

        <h2 class="top-title_sub shadow-txt"><a href="/works/" class="hov hov-txt"><span>W</span>orks</a></h2>

        <div class="post-conts <?= count($works) > 3 ? "swiper" : ""; ?>">
        <div id="top-works" class="items top-items top-works swiper-wrapper">
                @forelse ( $works as $work )
                @if ( $work->top_show )
                <div class="item top-item work-item shadow-box hov hov-box swiper-slide">
                    <a href="works/{{ e($work->id) }}">
                        <div class="item-img">
                            @if ( isset($work->img) && $work->img !== '' )
                            <img loading="lazy" src="data:image/webp;base64, {{ e($work->img) }}" alt="">
                            @else
                            <img src="{{ url('images/common/noimage.webp') }}" alt="">
                            @endif
                        </div>
                    </a>
                    <div class="item-txt">
                        <a href="works/{{ e($work->id) }}">
                            <h3 class="item-ttl">{{ e($work['title']) }}</h3>
                        </a>
                        <a href="works/#{{ e($work->category) }}">
                            <p class="tag"><span>{{ e($work_tags->{$work->category}) }}</span></p>
                        </a>
                        <a href="works/{{ e($work->id) }}">
                            <p class="item-body">{{mb_strimwidth( e($work->content), 0, 100, "...", "UTF-8" ); }}</p>
                        </a>
                    </div>
                </div>
                @endif
                @empty
                <div class="item top-item work-item shadow-box hov hov-box">
                    <a href="#">
                        <div class="item-img">
                            <img src="{{ url('images/common/noimage.webp') }}" alt="">
                        </div>
                    </a>
                    <a href="#">
                        <div class="item-txt">
                            <h3 class="item-ttl">データがありません</h3>
                        </div>
                    </a>
                </div>
                @endforelse
            </div>
            @if( count($works) > 3 )
            <!-- スクロールバー -->
            <div class="swiper-scrollbar"></div>
            @endif

        </div>

    </section>

    <section class="sec-content" id="top-blog">

        <h2 class="top-title_sub shadow-txt"><a href="/blogs/" class="hov hov-txt"><span>B</span>log</a></h2>

        <div class="post-conts <?= count($blogs) > 3 ? "swiper" : ""; ?>">
            <div id="top-blogs" class="items top-items top-blog scroll swiper-wrapper">

                @forelse($blogs as $blog)
                <div class="item top-item blog-item shadow-box hov hov-box swiper-slide">
                        <a href="/blogs/{{ e($blog->id) }}">
                            <div class="item-img">
                                @if ( isset($blog->img) && $blog->img !== '' )
                                <img loading="lazy" src="data:image/webp;base64, {{ e($blog->img) }}" alt="">
                                @else
                                <img src="{{ url('images/common/noimage.webp') }}" alt="">
                                @endif
                            </div>
                        </a>
                        <a href="/blogs/{{ e($blog->id) }}">
                            <div class="item-txt">
                                <h3 class="item-ttl">{{ e($blog->title)  }}</h3>
                                <p class="item-body">{{
                                mb_strimwidth( e($blog->content), 0, 100, "...", "UTF-8" );
                                }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                <div class="item top-item work-item shadow-box hov hov-box">
                    <a href="#">
                        <div class="item-img">
                            <img src="{{ url('images/common/noimage.webp') }}" alt="">
                        </div>
                    </a>
                    <a href="#">
                        <div class="item-txt">
                            <h3 class="item-ttl">投稿がありません</h3>
                            {{-- <p class="item-body">投稿を管理画面からご確認ください。</p> --}}
                        </div>
                    </a>
                </div>
                @endforelse

            </div>
            @if( count($blogs) > 3 )
            <!-- スクロールバー -->
            <div class="swiper-scrollbar"></div>
            @endif
        </div>

    </section>

    {{-- <section class="sec-content">

        <h2 class="top-title_sub shadow-txt"><span>C</span>ontact</h2>

    </section> --}}

</x-layout>
