<x-layout>
    <x-slot name="title">
        Works | たからのポートフォリオサイト
    </x-slot>
    <x-slot name="admin">
        false
    </x-slot>
    <x-slot name="body_class">
        works
    </x-slot>

    <section class="sec-content" id="personal">

        @component('components.breadcrumb')
        @slot('body_class')
        works
        @endslot
        @endcomponent

        <h2 class="top-title_sub"><span>P</span>ersonal</h2>
        <p class="sec-message">個人で作ったもの</p>
        <div class="post-conts">
            <div class="items top-works">
                    @forelse($works as $work)
                    @if( $work->category === 'personal' )
                    <div class="item work-item shadow-box hov hov-box swiper-slide">
                        <a href="/works/{{ e($work->id) }}">
                            <div class="item-img">
                                @if ($work->img)
                                <img loading="lazy" src="data:image/webp;base64, {{ e($work->img) }}" alt="">
                                @else
                                <img src="{{ e(url('images/common/noimage.png')) }}" alt="">
                                @endif
                            </div>
                        </a>
                        <a href="/works/{{ e($work->id) }}">
                            <div class="item-txt">
                                <h3 class="item-ttl">{{ e($work['title']) }}</h3>
                                <p class="item-body">{{mb_strimwidth( e($work->content), 0, 60, "...", "UTF-8" ); }}</p>
                            </div>
                        </a>
                    </div>
                    @endif
                    @empty
                    <div class="item work-item shadow-box hov hov-box">
                        <a href="#">
                            <div class="item-img">
                                <img src="{{ url('images/common/noimage.png') }}" alt="">
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
        </div>

    </section>
    <section class="sec-content" id="company">

        <h2 class="top-title_sub"><span>C</span>ompany</h2>
        <p class="sec-message">会社で作ったもの</p>
        <div class="post-conts">
            <div class="items top-works scroll swiper-wrapper">
                    @forelse($works as $work)
                    @if( $work->category === 'company' )
                    <div class="item work-item shadow-box hov hov-box swiper-slide">
                        <a href="/works/{{ e($work->id) }}">
                            <div class="item-img">
                                @if ($work->img)
                                <img src="data:image/webp;base64, {{ e($work->img) }}" alt="">
                                @else
                                <img src="{{ e(url('images/common/noimage.png')) }}" alt="">
                                @endif
                            </div>
                        </a>
                        <a href="/works/{{ e($work->id) }}">
                            <div class="item-txt">
                                <h3 class="item-ttl">{{ e($work['title']) }}</h3>
                                <p class="item-body">{{mb_strimwidth( e($work->content), 0, 60, "...", "UTF-8" ); }}</p>
                            </div>
                        </a>
                    </div>
                    @endif
                    @empty
                    <div class="item work-item shadow-box hov hov-box">
                        <a href="#">
                            <div class="item-img">
                                <img src="{{ url('images/common/noimage.png') }}" alt="">
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
        </div>

    </section>

    <section class="sec-content" id="friend">

        <h2 class="top-title_sub"><span>F</span>riends</h2>
        <p class="sec-message">友達と作ったもの</p>
        <div class="post-conts">
            <div class="items top-works scroll swiper-wrapper">
                    @forelse($works as $work)
                    @if( $work->category === 'friends' )
                    <div class="item work-item shadow-box hov hov-box swiper-slide">
                        <a href="/works/{{ e($work->id) }}">
                            <div class="item-img">
                                @if ($work->img)
                                <img src="data:image/webp;base64, {{ e($work->img) }}" alt="">
                                @else
                                <img src="{{ e(url('images/common/noimage.png')) }}" alt="">
                                @endif
                            </div>
                        </a>
                        <a href="works/{{ e($work->id) }}">
                            <div class="item-txt">
                                <h3 class="item-ttl">{{ e($work['title']) }}</h3>
                                <p class="item-body">{{mb_strimwidth( e($work->content), 0, 60, "...", "UTF-8" ); }}</p>
                            </div>
                        </a>
                    </div>
                    @endif
                    @empty
                    <div class="item work-item shadow-box hov hov-box">
                        <a href="#">
                            <div class="item-img">
                                <img src="{{ url('images/common/noimage.png') }}" alt="">
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
        </div>

    </section>

    {{-- <section class="sec-content">

        <h2 class="top-title_sub shadow-txt"><span>C</span>ontact</h2>

    </section> --}}

</x-layout>
