<?php

namespace App\Http\Controllers;
use App\Todosworklist;

use Illuminate\Http\Request;

class TodosworklistController extends Controller
{
//     public function index(){
//         $tasks = Todosworkslist::all();
//        return view('todosworklist.index',compact('tasks'));
//    }

public function index(){
    $tasks = Todosworklist::all(); 
    return view('todosworklist.index',compact('tasks'));
}
}
