<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Work;
use App\Http\Requests\BlogRequest;
use Mockery\Undefined;

class BlogController extends Controller
{
    /**
     * トップページを表示する
     *
     * @return view
     */
    public function showTop()
    {
        $blogs = Blog::all()->sortByDesc('id');
        $works = work::all()->sortBy('id');
        $work_tags = (object) [
            'personal' => '個人で作ったもの',
            'company' => '会社で作ったもの',
            'friends' => '友達と作ったもの'
        ];

        return view('index', ['blogs' => $blogs, 'works' => $works, 'work_tags' => $work_tags]);
    }
    /**
     * ログイン画面を表示する
     *
     * @return view
     */
    public function showLogin()
    {


        return view('admin.login');
    }
    /**
     * ブログ一覧を表示する
     *
     * @return view
     */
    public function showList()
    {
        $blogs = Blog::all()->sortByDesc('id');

        return view('blogs.index', ['blogs' => $blogs]);
    }
    /**
     * ブログ一覧を表示する(管理画面)
     *
     * @return view
     */
    public function showListAdmin()
    {
        $blogs = Blog::all()->sortByDesc('id');

        return view('admin.blog.list', ['blogs' => $blogs]);
    }
    /**
     * ブログ詳細を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $blog = Blog::find($id);
        $last_id = Blog::latest('id')->get()->pluck('id')->first();

        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }

        return view('blogs.detail', ['blog' => $blog, 'last_id' => $last_id]);
    }
    /**
     * ブログ登録画面を表示する
     *
     * @return view
     */
    public function showCreate()
    {
        return view('admin.blog.form');
    }

    /**
     * ブログを登録する
     *
     * @return view
     */
    public function exeStore(BlogRequest $request)
    {
        // ブログのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            if( isset($inputs["img"]) ) {
                // $inputs["img"] = basename($request->file('img')->store('images/posts/', 'public_uploads'));
                $inputs["img"] = base64_encode(file_get_contents($inputs["img"]));
            }

            // ブログを登録
            Blog::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            dd($e);
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'ブログを登録しました');
        return redirect(route('blogs'));
    }

    /**
     * ブログ編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $blog = Blog::find($id);

        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }

        return view('admin.blog.edit', ['blog' => $blog]);
    }

    /**
     * ブログを更新する
     *
     * @return view
     */
    public function exeUpdate(BlogRequest $request)
    {
        // ブログのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            // ブログを更新
            $blog = Blog::find($inputs['id']);

            if( isset($inputs["img"]) ) {
                $updateImg = base64_encode(file_get_contents($inputs["img"]));
            } else {
                $updateImg = $blog["img"];
            }

            // publicに生成
            // if ( isset($inputs["img"]) && isset($blog["img"]) ) {
            //     $updateImg = basename($request->file('img')->store('images/posts/', 'public_uploads'));
            //     if ( file_exists(public_path() . '/images/posts/' . $blog["img"]) ) {
            //         unlink(public_path() . '/images/posts/' . $blog["img"]);
            //     }
            // } elseif ( isset($inputs["img"]) && isset($blog["img"]) ) {
            //     $updateImg = basename($request->file('img')->store('images/posts/', 'public_uploads'));
            // } else {
            //     $updateImg = $blog["img"];
            // }

            $blog->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
                'img' => $updateImg,
            ]);
            $blog->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            dd($e);
            abort(500);
        }

        \Session::flash('err_msg', 'ブログを更新しました');
        return redirect(route('blogs'));
    }
    /**
     * ブログ削除
     * @param int $id
     * @return view
     */
    public function exeDelete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }

        try {
            // ブログのデータを受け取る
            $blog = Blog::find($id);
            // if ( isset($blog["img"]) && file_exists(public_path() . '/images/posts/' . $blog["img"]) ) {
            //     unlink(public_path() . '/images/posts/' . $blog["img"]);
            // }

            // ブログを削除
            Blog::destroy($id);
        } catch(\Throwable $e) {
            dd($e);
            abort(500);
        }

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('blogs'));
    }
}
