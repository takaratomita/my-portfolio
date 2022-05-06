<x-layout>
    <x-slot name="title">
        管理画面 - たからのポートフォリオサイト
    </x-slot>
    <x-slot name="sub_title">
        work
    </x-slot>
    <x-slot name="admin">
        true
    </x-slot>
    <section class="sec-content sec-posts sec-admin">
        <div class="posts-conts">
            <div class="col-md-8 col-md-offset-2">
                <h2>実績投稿フォーム</h2>
                <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('workStore') }}" onSubmit="return checkSubmit()">
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
                        <input
                            id="url"
                            name="url"
                            class="form-control"
                            value="{{ old('url') }}"
                            type="text"
                            placeholder="URLを入力">
                        @if ($errors->has('url'))
                            <div class="text-danger">
                                {{ $errors->first('url') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input
                            id="git_url"
                            name="git_url"
                            class="form-control"
                            value="{{ old('git_url') }}"
                            type="text"
                            placeholder="GithubのURLを入力">
                        @if ($errors->has('git_url'))
                            <div class="text-danger">
                                {{ $errors->first('git_url') }}
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
                        <label for="img">
                            アイキャッチ画像:
                        </label>
                        <input type="file" name="img" id="img" value=""/>
                        @if ($errors->has('img'))
                        <div class="text-danger">
                            {{ $errors->first('img') }}
                        </div>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="img_sp">
                            アイキャッチ画像(SP):
                        </label>
                        <input type="file" name="img_sp" id="img_sp" value=""/>
                        @if ($errors->has('img_sp'))
                        <div class="text-danger">
                            {{ $errors->first('img_sp') }}
                        </div>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="category">
                            カテゴリー:
                        </label>
                        <select name="category" id="category">
                            <option value="personal">個人</option>
                            <option value="company">会社</option>
                            <option value="friends">友達</option>
                        </select>
                        @if ($errors->has('category'))
                        <div class="text-danger">
                            {{ $errors->first('category') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="top_show">
                            トップに表示:
                        </label>
                        <input type="hidden" name="top_show" value="{{ old('top_show') ?? '0' }}"/>
                        <input type="checkbox" name="top_show" id="top_show" value="1"/>
                        @if ($errors->has('top_show'))
                        <div class="text-danger">
                            {{ $errors->first('top_show') }}
                        </div>
                    @endif
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
