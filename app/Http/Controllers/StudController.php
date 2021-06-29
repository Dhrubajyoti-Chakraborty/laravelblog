<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stud;

class StudController extends Controller
{
    public function index(){
        $studs = Stud::all();
        return view('stud',compact('studs'));
    }

    public function store(Request $request){
    
       $studs = new Stud;

       $studs->fname = $request->fname;
       $studs->lname = $request->lname;
       $studs->course = $request->course;
       $studs->section = $request->section;

       $studs->save();
    }
    public function update(Request $request, $id){
    
        $studs = Stud::find($id);
 
        $studs->fname = $request->fname;
        $studs->lname = $request->lname;
        $studs->course = $request->course;
        $studs->section = $request->section;
 
        $studs->save();
        return $studs;
     }

     public function delete($id){
        $studs = Stud::find($id);
        $studs->delete();
        return $studs;
    }

}
