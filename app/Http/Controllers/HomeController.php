<?php

namespace App\Http\Controllers;

use App\Filters\TaskFilter;
use App\Filters\TaskFilters;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(TaskFilter $request){
        $tasks = Task::filter($request)->paginate(3);
        $categories = Category::all();

        return view('home',compact(['tasks', 'categories']));
    }


public function add()
    {
        return view('add');
    }


public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
        $task = new Task();
        $task->description = $request->description;
        $task->user_id = auth()->user()->id;
        $task->category_id = $request->category_id;
        $task->save();
        return redirect('home');
    }

 public function edit(Task $task)
    {

        if (auth()->user()->id == $task->user_id)
        {
                return view('edit', compact('task'));
        }
        else {
             return redirect('/home');
         }
    }

public function update(Request $request, Task $task)
    {
        if(isset($_POST['delete'])) {
            $task->delete();
            return redirect('/home');
        }
        else
        {
            $this->validate($request, [
                'description' => 'required'
            ]);
            $task->description = $request->description;
            $task->save();
            return redirect('/home');
        }
    }

}
