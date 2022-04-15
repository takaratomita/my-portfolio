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
                <h2>ブログ投稿フォーム</h2>
                <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('blogStore') }}" onSubmit="return checkSubmit()">
                @csrf
                    <div class="form-group">
                        <input
                            id="title"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            type="text"
                            placeholder="タイトルを入力"
                        >
                        @if ($errors->has('title'))
                            <div class="text-danger">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea
                            id="content"
                            name="content"
                            class="form-control"
                            rows="4"
                            placeholder="テキストを入力"
                        >{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <div class="text-danger">
                                {{ $errors->first('content') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content">
                            アイキャッチ画像:　
                        </label>
                        <input type="file" name="img" value=""/>
                    </div>
                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('home') }}">
                            キャンセル
                        </a>
                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
    // function checkSubmit(){
    // if ( window.confirm('送信してよろしいですか？') ) {
    //     document.querySelector('#form').submit();
    //     // return true;
    // } else {
    //     return;
    // }
    // }
    </script>
</x-layout>
