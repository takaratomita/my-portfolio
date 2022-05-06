<x-layout>
    <x-slot name="title">
        Works - たからのポートフォリオサイト
    </x-slot>
    <x-slot name="admin">
        false
    </x-slot>
    <x-slot name="body_class">
        works
    </x-slot>

    <section class="sec-content">
        @component('components.breadcrumb')
        @slot('body_class')
        works
        @endslot
        @endcomponent
    </section>
    @foreach($titles as $title_en => $title_ja)
    <section class="sec-content" id="{{ $title_en }}">

        <h2 class="top-title_sub"><span>{{ strtoupper(substr($title_en, 0, 1)) }}</span>{{ substr($title_en, 1) }}</h2>
        <p class="sec-message">{{ $title_ja }}</p>
        <div class="post-conts">
            <div class="items top-works">
                    @forelse($works as $work)
                    @if((string) trim($work->category) === (string) trim($title_en))
                    <div class="item work-item shadow-box hov hov-box swiper-slide">
                        <a href="/works/{{ e($work->id) }}">
                            <div class="item-img">
                                @if ($work->img)
                                <img loading="lazy" src="data:image/webp;base64, {{ e($work->img) }}" alt="">
                                @else
                                <img src="{{ e(url('images/common/noimage.webp')) }}" alt="">
                                @endif
                            </div>
                        </a>
                        <a href="/works/{{ e($work->id) }}">
                            <div class="item-txt">
                                <h3 class="item-ttl">{{ e($work['title']) }}</h3>
                                <p class="item-body">{{mb_strimwidth( e($work->content), 0, 100, "...", "UTF-8" ); }}</p>
                            </div>
                        </a>
                    </div>
                    @endif
                    @empty
                    <div class="item work-item shadow-box hov hov-box">
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
        </div>

    </section>
    @endforeach

    {{-- <section class="sec-content">

        <h2 class="top-title_sub shadow-txt"><span>C</span>ontact</h2>

    </section> --}}

</x-layout>
