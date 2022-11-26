<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\ListTask;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::get();
        return view("task.index",compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("task.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_nama'         => 'required',
            'task_deskripsi'    => 'required',
        ],
        [
            'task_nama.required'        => 'Nama task tidak boleh kosong',
            'task_deskripsi.required'   => 'Deskripsi task tidak boleh kosong',
        ]);
        
        $task = new Task;
        $task->task_nama      = $request->task_nama;
        $task->task_deskripsi = $request->task_deskripsi;
        $task->save();

        return redirect()->route("task.index")->with('success', 'Data task telah disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view("task.edit", compact("task"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'task_nama'         => 'required',
            'task_deskripsi'    => 'required',
        ],
        [
            'task_nama.required'        => 'Nama task tidak boleh kosong',
            'task_deskripsi.required'   => 'Deskripsi task tidak boleh kosong',
        ]);
        
        $task = Task::find($id);
        $task->task_nama      = $request->task_nama;
        $task->task_deskripsi = $request->task_deskripsi;
        $task->save();

        return redirect()->route("task.index")->with('success', 'Data task telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route("task.index")->with('success', 'Data task telah dihapus.');
    }

    public function add_task(Request $request)
    {
        $validated = $request->validate([
            'list_user_id'  => 'required',
            'list_task_id'  => 'required',
        ],
        [
            'list_user_id.required' => 'Nama tidak boleh kosong',
            'list_task_id.required' => 'Username tidak boleh kosong',
        ]);

        $list               = new ListTask;
        $list->list_user_id = $request->list_user_id;
        $list->list_task_id = $request->list_task_id;
        $list->save();
        
        return redirect()->route("user.index")->with('success', 'Data user telah diupdate.');
    }

    public function updateTask($id, Request $request)
    {
        $list                   = ListTask::find($id);
        $list->list_task_status = ($list->list_task_status == 0) ? 1 : 0;
        $list->save();
        
        return redirect()->route("user.show", $request->list_user_id)->with('success', 'Data task telah diupdate.');
    }
}
