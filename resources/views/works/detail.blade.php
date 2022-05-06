<x-layout>
    <x-slot name="title">
        {{ $work->title }} - たからのポートフォリオサイト
    </x-slot>
    <x-slot name="sub_title">
        work
    </x-slot>
    <x-slot name="admin">
        false
    </x-slot>
    <x-slot name="body_class">
        works-detail
    </x-slot>
    <x-slot name="breadcrumb">
        {{ e($work->title) }}
    </x-slot>
    <section id="sec-posts" class="sec-content sec-posts">
        <div id="posts-conts" class="posts-conts">
            <div id="posts-conts--inner" class="posts-conts--inner shadow-box col-md-8 col-md-offset-2 glass">
                @component('components.breadcrumb')
                @slot('body_class')
                works-detail
                @endslot
                @slot('breadcrumb')
                {{ e($work->title) }}
                @endslot
                @endcomponent
                <div id="posts-cont" class="posts-cont">
                    <h2>{{ e($work->title) }}</h2>
                    <p class="posts-txt scroll">{!!
                    preg_replace('/(挑戦したこと：[\w|\s|\S]+?\n|業務内容：[\w|\s|\S]+?\n)/u','<strong>${1}</strong>', nl2br(e($work->content)))
                    !!}</p>

                </div>
            </div>
            @component('components.navigation')
            @slot('id')
            {{ e($work->id) }}
            @endslot
            @slot('last_id')
            {{ e($last_id) }}
            @endslot
            @endcomponent

            @if( isset($work->url) || isset($work->git_url) )
            <div class="links" id="links">
                @if ( isset($work->url) )
                <div class="posts-btn ta-c"><a class="shadow-txt hov hov-txt " target="_blank" href="{{ e($work->url) }}">Visit</a></div>
                @endif
                @if ( isset($work->git_url) )
                <div class="posts-btn ta-c"><a class="shadow-txt hov hov-txt " target="_blank" href="{{ e($work->git_url) }}"><i class="fa-brands fa-github"></i></a></div>
                @endif
            </div>
            @endif
        </div>
    </section>
    <?php
    if( $work->img ):
    echo "<script>
        const secPosts = document.getElementById('sec-posts');
        if ( document.body.clientWidth > 700 ){
            secPosts.style.backgroundImage = `url('data:image/webp;base64, {$work->img}')`;
        } else {
            secPosts.style.backgroundImage = `url('data:image/webp;base64, {$work->img_sp}')`;
        }
        </script>
    ";
    endif;
    ?>
</x-layout>
