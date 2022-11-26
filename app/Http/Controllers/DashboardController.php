<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListTask;

class DashboardController extends Controller
{
    public function index()
    {
        $list_task = ListTask::with('task','user')->get();
        // dd($list_task);
        return view("dashboard", compact("list_task"));
    }

    public function penjelasan()
    {
        return view("penjelasan");
    }
}
