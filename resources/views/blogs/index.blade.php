<x-layout>
    <x-slot name="title">
        Blog | たからのポートフォリオサイト
    </x-slot>
    <x-slot name="admin">
        false
    </x-slot>
    <x-slot name="body_class">
        blogs
    </x-slot>

    <section class="sec-content">

        @component('components.breadcrumb')
        @slot('body_class')
        blogs
        @endslot
        @endcomponent

        <h2 class="top-title_sub shadow-txt"><span>B</span>logs</h2>

        <div class="post-conts">

            <div class="items top-blogs scroll swiper-wrapper">
                    @forelse($blogs as $blog)
                    <div class="item blog-item shadow-box hov hov-box swiper-slide">
                        <a href="/blogs/{{ e($blog->id) }}">
                            <div class="item-img">
                                @if ($blog->img)
                                <img loading="lazy" src="data:image/webp;base64, {{ e($blog->img) }}" alt="">
                                @else
                                <img src="{{ e(url('images/common/noimage.png')) }}" alt="">
                                @endif
                            </div>
                        </a>
                        <a href="/blogs/{{ e($blog->id) }}">
                            <div class="item-txt">
                                <h3 class="item-ttl">{{ e($blog['title']) }}</h3>
                                <p class="item-body">{{mb_strimwidth( e($blog->content), 0, 60, "...", "UTF-8" ); }}</p>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="item blog-item shadow-box hov hov-box">
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
