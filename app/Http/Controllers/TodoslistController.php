<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todoslist;

class TodoslistController extends Controller
{
    public function index(){
        $tasks = Todoslist::all();
        return view('todoslist.index',compact('tasks'));
    }

    public function create(){
        return view('todoslist.add');
    }

    public function save(Request $request){
        $task=Todoslist::create($request->all());

        $tasks = Todoslist::all();
        return view('todoslist.index',compact('tasks'));
    }

    public function edit($id){
        $task = Todoslist::findOrFail($id);
        return view('todoslist.edit',compact('task'));
        

    }

    public function update(Request $request){
        $task = Todoslist::findOrFail($request->id);
        $task->name = $request->name;
        $task->save();
        $tasks = Todoslist::all();
        return view('todoslist.index',compact('tasks'));
    }

    public function destroy($id){
        $task = Todoslist::findOrFail($id)->delete();

        $tasks = Todoslist::all();
        return view('todoslist.index',compact('tasks'));
    }
}
