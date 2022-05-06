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
                <h2>実績編集フォーム</h2>
                <form method="POST" enctype="multipart/form-data" action="{{ route('workUpdate') }}" onSubmit="return checkSubmit()">
                @csrf
                    <input type="hidden" name="id" value="{{ e($work->id) }}">
                    <div class="form-group">
                        {{-- <label for="title">
                            タイトル
                        </label> --}}
                        <input
                            id="title"
                            name="title"
                            class="form-control"
                            value="{{ e($work->title) }}"
                            type="text"
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
                            value="{{ e($work->url) }}"
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
                            value="{{ e($work->git_url) }}"
                            type="text"
                            placeholder="GithubのURLを入力">
                        @if ($errors->has('git_url'))
                            <div class="text-danger">
                                {{ $errors->first('git_url') }}
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
                        >{{ e($work->content) }}</textarea>
                        @if ($errors->has('content'))
                            <div class="text-danger">
                                {{ $errors->first('content') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="img">
                            アイキャッチ画像:
                            @if ( isset($work->img) && $work->img !== '' )
                            <img width="30" height="30" src="data:image/webp;base64, {{ e($work->img)  }}" alt="">
                            @endif
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
                            @if ( isset($work->img_sp) && $work->img_sp !== '' )
                            <img width="30" height="30" src="data:image/webp;base64, {{ e($work->img_sp)  }}" alt="">
                            @endif
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
                            <option value="personal"{{ $work->category === 'personal' ? ' selected' : '' }}>個人</option>
                            <option value="company"{{ $work->category === 'company' ? ' selected' : '' }}>会社</option>
                            <option value="friends"{{ $work->category === 'friends' ? ' selected' : '' }}>>友達</option>
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
                        <input type="hidden" name="top_show" value="0"/>
                        <input type="checkbox" name="top_show" id="top_show" value="1" {{ $work->top_show ? e('checked') : '' }}/>
                        @if ($errors->has('top_show'))
                        <div class="text-danger">
                            {{ $errors->first('top_show') }}
                        </div>
                    @endif
                    </div>
                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('works') }}">
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
