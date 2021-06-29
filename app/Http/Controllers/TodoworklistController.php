<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todoworklist;

class TodoworklistController extends Controller
{
    public function index(){
        $tasks = Todoworklist::all(); 
        return view('todoworklist.index',compact('tasks'));
    }
    public function create(){
        return view('todoworklist.add');
    }
    public function save(Request $request){
        $task = Todoworklist::create($request->all());

        $tasks = Todoworklist::all(); 
        return view('todoworklist.index',compact('tasks'));
    }
    public function edit($id){
        $task = Todoworklist::findOrFail($id);
        return view('todoworklist.edit',compact('task'));
    }
    public function update(Request $request){
        $task = Todoworklist::findOrFail($request->id);
        $task->name = $request->name;
        $task->save();

        $tasks = Todoworklist::all(); 
        return view('todoworklist.index',compact('tasks'));
    }
    public function destroy($id){
    $task = Todoworklist::findOrFail($id)->delete();
    $tasks = Todoworklist::all(); 
    return view('todoworklist.index',compact('tasks'));
    }
}
