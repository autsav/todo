<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $user = Auth::user();
        return view('welcome',compact('user'));
    }
    public function add()
    {
        return view('add');
    }
    public function create(Request $request)
    {   
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = Auth::id();
        $task->save();
        return redirect('/');

    }
    public function edit(Task $task)
    {
        if(Auth::check() && Auth::user()->id == $task->user_id)
        {
            return view('edit', compact('task'));
        }
        else{
            return redirect('/');
        }
    }
    public function update(Request $request, Task $task)
    {   
        
        
        if(isset($_POST['delete'])){
           
            $task->delete();
            return redirect('/');
        }
        else
        {   
            $this->validate($request,[
            'description' =>'required'
        ]);
            $task->title = $request->title;
            $task->description = $request->description;
            $task->save();
            return redirect('/');
        }
    }
}
