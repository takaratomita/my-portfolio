<x-layout>
    <x-slot name="title">
        管理画面 | たからのポートフォリオサイト
    </x-slot>
    <x-slot name="sub_title">
        blog
    </x-slot>
    <x-slot name="admin">
        true
    </x-slot>
    <section class="sec-content sec-posts sec-admin">
        <div class="posts-conts">
            <div class="col-md-8 col-md-offset-2">
                <h2>ブログ編集フォーム</h2>
                <form method="POST" enctype="multipart/form-data" action="{{ route('blogUpdate') }}" onSubmit="return checkSubmit()">
                @csrf
                    <input type="hidden" name="id" value="{{ $blog->id }}">
                    <div class="form-group">
                        <label for="title">
                            タイトル
                        </label>
                        <input
                            id="title"
                            name="title"
                            class="form-control"
                            value="{{ $blog->title }}"
                            type="text"
                        >
                        @if ($errors->has('title'))
                            <div class="text-danger">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content">
                            本文
                        </label>
                        <textarea
                            id="content"
                            name="content"
                            class="form-control"
                            rows="4"
                        >{{ $blog->content }}</textarea>
                        @if ($errors->has('content'))
                            <div class="text-danger">
                                {{ $errors->first('content') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content">
                            アイキャッチ画像:
                            @if  ( isset($blog->img) && $blog->img !== '' )
                            <img width="30" height="30" src="data:image/webp;base64, {{ $blog->img  }}" alt="">
                            @endif
                        </label>
                        <input type="file" name="img" value="{{ $blog->img }}"/>
                    </div>
                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('blogs') }}">
                            キャンセル
                        </a>
                        <button type="submit" class="btn btn-primary">
                            更新する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
    // function checkSubmit(){
    // if(window.confirm('更新してよろしいですか？')){
    //     return true;
    // } else {
    //     return false;
    // }
    // }
    </script>
</x-layout>
