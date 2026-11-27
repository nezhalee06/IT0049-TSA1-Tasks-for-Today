<?php
namespace App\Controllers;
use App\Models\TaskModel;
class Tasks extends BaseController
{
    protected $helpers = ['url'];

    public function today()
    {
        return view('tasks', [
            'title' => "Today's Tasks",
            'active' => 'today',
            'description' => 'A simple list to help you focus on today.',
            'tasks' => (new TaskModel())->forToday(),
        ]);
    }

    public function index()
    {
        return view('tasks', [
            'title' => 'Task List',
            'active' => 'tasks',
            'description' => 'All tasks, ordered from the earliest date to the latest.',
            'tasks' => (new TaskModel())->allByDate(),
        ]);
    }
}
