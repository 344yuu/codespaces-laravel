<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    // 一覧表示
    public function index()
    {
        $tasks = Task::all();
        return view('index', compact('tasks'));
    }


    // 登録処理
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Task::create([
            'title' => $request->title,
        ]);

        return redirect()->back();
    }

    // 完了・未完了切り替え
    public function toggle(Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();
        return redirect()->back();
    }

    // 削除
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }


}
