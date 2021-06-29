<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use Response;

class StudentsController extends Controller
{
   
    public function index()
    {
        $students=Students::all();    
        // dd($students);
        return view('student',compact('students'));
    }


    public function store(Request $request)
    {
        $students=new Students;
        // $students->name=$request->name;
        // $students->phone=$request->phone;
        // $students->address=$request->address;


        $students->name=$request->input('name');
        $students->phone=$request->input('phone');
        $students->address=$request->input('address');

        $students->save();

        return $students;

    }

    public function update(Request $request, $id)
    {
     
        $students = Students::find($id);

        $students->name=$request->input('name');
        $students->phone=$request->input('phone');
        $students->address=$request->input('address');

        $students->save();
        return $students;


    }

    public function delete($id)
    {
        $students=Students::find($id)->delete();

        // \DB::table("students")->whereIn('id',explode(",",$id))->delete();
        return redirect()->back();
        // return $students; 
        return json_encode($students);
    }

   
}