<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('task')->get();
        return view('tasks', compact('tasks'));
    }

    public function create()
    {
        $task_name = $_POST['name'];
        DB::table('task')->insert([
            'name' => $task_name,
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $task = DB::table('task')->where('id', $id)->first();
        $tasks = DB::table('task')->get();
        return view('tasks', compact('tasks', 'task'));
    }

    public function update()
    {
        $id = $_POST['id'];
        DB::table('task')->where('id', $id)->update([
            'name' => $_POST['name'],
        ]);
        return redirect('tasks');
    }

    public function destroy($id)
    {
        DB::table('task')->where('id', $id)->delete();
        return redirect()->back();
    }
}