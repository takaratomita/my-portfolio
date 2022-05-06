<x-layout>
    <x-slot name="title">
        {{ e($blog->title) }} - たからのポートフォリオサイト
    </x-slot>
    <x-slot name="sub_title">
        blog
    </x-slot>
    <x-slot name="admin">
        false
    </x-slot>
    <x-slot name="body_class">
        blogs-detail
    </x-slot>
    <x-slot name="breadcrumb">
        {{ e($blog->title) }}
    </x-slot>
    <section class="sec-content sec-posts">
        <div class="posts-conts shadow-box">
            <div class="posts-cont">
                @component('components.breadcrumb')
                @slot('body_class')
                blogs-detail
                @endslot
                @slot('breadcrumb')
                {{ e($blog->title) }}
                @endslot
                @endcomponent
                <h2>{{ e($blog->title) }}</h2>
                <div class="posts-img">
                    <img src="data:image/webp;base64, {{ e($blog->img) }}" alt="">
                </div>
                <p class="posts-txt">{!! nl2br(e($blog->content)) !!}</p>
                @component('components.navigation')
                @slot('id')
                {{ e($blog->id) }}
                @endslot
                @slot('last_id')
                {{ e($last_id) }}
                @endslot
                @endcomponent
                <div class="dates">
                    <span>作成日：{{ e($blog->created_at) }}</span><br>
                    <span>更新日：{{ e($blog->updated_at) }}</span>
                </div>
            </div>
        </div>
    </section>
</x-layout>
