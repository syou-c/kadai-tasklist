<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;    // 追加

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     * getでアクセスされた場合の「一覧表示処理」
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     // メッセージ一覧を取得
 
     $Task = Task::all();

        // メッセージ一覧ビューでそれを表示
        return view('Task.index', [
            'Task' => $Task,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * getにアクセスされた場合の「新規登録画面表示処理」
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $Task = new Task;

        // メッセージ作成ビューを表示
        return view('Task.create', [
            'Task' => $Task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * postにアクセスされた場合の「新規登録処理」

     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // バリデーション
        $request->validate([
            'status' => 'required|max:255',   // 追加
            'content' => 'required|max:255',
        ]);
         // メッセージを作成
        $Task = new Task;
        $Task->status = $request->status;    // 追加
        $Task->content = $request->content;
        $Task->save();

        // トップページへリダイレクトさせる
        return redirect('/');

    }

    /**
     * Display the specified resource.
     * get（任意のid）にアクセスされた場合の「取得表示処理」
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $Task = Task::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('Task.show', [
            'Task' => $Task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * get（任意のid）/editにアクセスされた場合の「更新画面表示処理」
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $Task = Task::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('Task.edit', [
            'Task' => $Task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *putまたはpatch（任意のid）にアクセスされた場合の「更新処理」
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // バリデーション
        $request->validate([
            'status' => 'required|max:255',   // 追加
            'content' => 'required|max:255',
        ]);
      // idの値でメッセージを検索して取得
        $Task = Task::findOrFail($id);
        // メッセージを更新
        $Task->status = $request->status;    // 追加
        $Task->content = $request->content;
        $Task->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *delete（任意のid）にアクセスされた場合の「削除処理」
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $Task = Task::findOrFail($id);
        // メッセージを削除
        $Task->delete();

        // トップページへリダイレクトさせる
        return redirect('/');

    }
}
