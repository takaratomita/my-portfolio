<x-layout>
    <x-slot name="title">
        管理画面 - たからのポートフォリオサイト
    </x-slot>
    <x-slot name="sub_title">
        blog
    </x-slot>
    <x-slot name="admin">
        true
    </x-slot>
<!--
①route作成（削除ボタン）
②Controllerづくり
③削除機能づくり
-->
        <section class="sec-content sec-posts sec-admin">
        <div class="posts-conts">
            <div class="col-md-10 col-md-offset-2">
                <h2>ブログ記事一覧</h2>
                @if (session('err_msg'))
                    <p class="text-danger">
                        {{ session('err_msg') }}
                    </p>
                @endif
                <table class="posts-table table-striped">
                    <tr>
                        <th>記事番号</th>
                        <th>タイトル</th>
                        <th>アイキャッチ</th>
                        <th>日付</th>
                        <th>操作</th>
                    </tr>
                    @foreach($blogs as $blog)
                    <tr class="posts-list">
                        <td>{{ $blog->id  }}</td>
                        <td><a href="/blog/{{ $blog->id }}">{{ $blog->title  }}</a></td>
                        <td>
                            @if  ( isset($blog->img) && $blog->img !== '' )
                            <img width="30" height="30" src="data:image/webp;base64, {{ $blog->img  }}" alt="">
                            @else
                            <img width="30" height="30" src="{{ url('images/common/noimage.webp') }}" alt="">
                            @endif
                        </td>
                        <td>{{ $blog->updated_at  }}</td>
                        <td><button type="button" class="btn btn-primary" onclick="location.href='/admin/blog/edit/{{ $blog->id }}'">編集</button></td>
                        <form method="POST" action="{{ route('blogDelete', $blog->id) }}" onSubmit="return checkDelete()">
                        @csrf
                        <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
                        </form>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
    <script>
    function checkDelete(){
        if(window.confirm('削除してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }
    </script>
</x-layout>
