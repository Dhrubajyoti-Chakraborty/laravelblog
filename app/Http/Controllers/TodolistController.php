<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todolist;

class TodolistController extends Controller
{
    public function index(){

        $tasks = Todolist::all();
        return view('todolist.index', compact('tasks'));
    }



    public function create(){
        return view('todolist.add');
    }

    public function save (Request $request ){
        $task= Todolist::create($request->all());
        $tasks = Todolist::all();
        return view('todolist.index', compact('tasks'));
    }

    public function edit($id){
        $task = Todolist::findOrFail($id);
        return view('todolist.edit', compact('task'));
    }

    public function update(Request $request){
        $task = Todolist::findOrFail($request->id);
        $task->name = $request->name;
        $task->save();

        $tasks = Todolist::all();
        return view('todolist.index', compact('tasks'));
    }

    public function destroy($id){
        $task = Todolist::findOrFail($id)->delete();
        $tasks = Todolist::all();
        return view('todolist.index', compact('tasks'));
    }
}
