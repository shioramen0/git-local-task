<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TasksRequest;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 目標一覧
        $tasks = Task::all();

        return view(
            'tasks.index',
            ['tasks' => $tasks]
        );
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        // fillを使用する場合は、必ずモデルのfillableを指定する
        $task->fill($request->all())->save();

        // 一覧へ戻り完了メッセージを表示
        return redirect()->route('task.index')->with('message', '登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $task = Task::find($id);

        return view('task.edit' , [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->fill($request->all())->save();

        // 一覧へ戻り完了メッセージを表示
        return redirect()->route('task.index')->with('message' , '編集しました');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        Task::where('id' , $id)->delete();

        //完了メッセージを表示
        return redirect()->route('product.index')->with('message' , '削除しました');
    }
}
