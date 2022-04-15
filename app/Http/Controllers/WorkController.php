<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Http\Requests\WorkRequest;
use Mockery\Undefined;

class WorkController extends Controller
{
        /**
     * トップページを表示する
     *
     * @return view
     */
    // public function showTop()
    // {
    //     $works = Work::all();

    //     return view('index', ['works' => $works]);
    // }
    /**
     * 実績一覧を表示する
     *
     * @return view
     */
    public function showList()
    {
        $works = Work::all()->sortBy('id');

        return view('works.index', ['works' => $works]);
    }
    /**
     * 実績一覧を表示する（管理画面）
     *
     * @return view
     */
    public function showListAdmin()
    {
        $works = Work::all()->sortBy('id');

        return view('admin.work.list', ['works' => $works]);
    }
    /**
     * 実績詳細を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $work = Work::find($id);

        if (is_null($work)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('works'));
        }

        return view('works.detail', ['work' => $work]);
    }
    /**
     * 実績登録画面を表示する
     *
     * @return view
     */
    public function showCreate()
    {
        return view('admin.work.form');
    }

    /**
     * 実績を登録する
     *
     * @return view
     */
    public function exeStore(WorkRequest $request)
    {
        // 実績のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            if ( isset($inputs['img']) ) {
                // $inputs["img"] = basename($request->file('img')->store('images/posts/', 'public_uploads'));
                $inputs["img"] = base64_encode(file_get_contents($inputs["img"]));
            }
            if ( isset($inputs['img_sp']) ) {
                // $inputs["img_sp"] = basename($request->file('img_sp')->store('images/posts/', 'public_uploads'));
                $inputs["img_sp"] = base64_encode(file_get_contents($inputs["img_sp"]));
            }
            if ( $inputs["top_show"] === '1' ) {
                $inputs["top_show"] = 1;
            } else {
                $inputs["top_show"] = 0;
            }

            // 実績を登録
            Work::create($inputs);

            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            dd($e);
            abort(500);
        }

        \Session::flash('err_msg', '実績を登録しました');
        return redirect(route('works'));
    }

    /**
     * 実績編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $work = Work::find($id);

        if (is_null($work)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('works'));
        }

        return view('admin.work.edit', ['work' => $work]);
    }

    /**
     * 実績を更新する
     *
     * @return view
     */
    public function exeUpdate(WorkRequest $request)
    {
        // 実績のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            // 実績を更新
            $work = Work::find($inputs['id']);

            if( isset($inputs["img"]) ) {
                $updateImg = base64_encode(file_get_contents($inputs["img"]));
            } else {
                $updateImg = $work["img"];
            }

            if( isset($inputs["img_sp"]) ) {
                $updateImgSp = base64_encode(file_get_contents($inputs["img_sp"]));
            } else {
                $updateImgSp = $work["img_sp"];
            }

            // publicに生成
            // if ( isset($inputs["img"]) && isset($work["img"]) ) {
            //     $updateImg = basename($request->file('img')->store('images/posts/', 'public_uploads'));
            //     if( file_exists(public_path() . '/images/posts/' . $work["img"]) ) {
            //         unlink(public_path() . '/images/posts/' . $work["img"]);
            //     }
            // } elseif ( isset($inputs["img"]) && !isset($work["img"]) ) {
            //     $updateImg = basename($request->file('img')->store('images/posts/', 'public_uploads'));
            // } else {
            //     $updateImg = $work["img"];
            // }

            // if ( isset($inputs["img_sp"]) && isset($work["img_sp"]) ) {
            //     $updateImgSp = basename($request->file('img_sp')->store('images/posts/', 'public_uploads'));
            //     if( file_exists(public_path() . '/images/posts/' . $work["img_sp"]) ) {
            //         unlink(public_path() . '/images/posts/' . $work["img_sp"]);
            //     }
            // } elseif ( isset($inputs["img_sp"]) && !isset($work["img_sp"]) ) {
            //     $updateImgSp = basename($request->file('img_sp')->store('images/posts/', 'public_uploads'));
            // } else {
            //     $updateImgSp = $work["img_sp"];
            // }

            // トップ表示
            if ( $inputs["top_show"] === '1' ) {
                $inputs["top_show"] = 1;
            } else {
                $inputs["top_show"] = 0;
            }

            $work->fill([
                'title' => $inputs['title'],
                'url' => $inputs['url'],
                'git_url' => $inputs['git_url'],
                'content' => $inputs['content'],
                'img' => $updateImg,
                'img_sp' => $updateImgSp,
                'category' => $inputs['category'],
                'top_show' => $inputs['top_show'],
            ]);
            $work->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            dd($e);
            abort(500);
        }

        \Session::flash('err_msg', '実績を更新しました');
        return redirect(route('works'));
    }
    /**
     * 実績削除
     * @param int $id
     * @return view
     */
    public function exeDelete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('works'));
        }

        try {
            // 実績のデータを受け取る
            $work = Work::find($id);
            // if ( isset($work["img"]) && file_exists(public_path() . '/images/posts/' . $work["img"]) ) {
            //     unlink(public_path() . '/images/posts/' . $work["img"]);
            // }
            // if ( isset($work["img_sp"]) &&  file_exists(public_path() . '/images/posts/' . $work["img_sp"]) ) {
            //     unlink(public_path() . '/images/posts/' . $work["img_sp"]);
            // }

            // 実績を削除
            Work::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('works'));
    }
}
