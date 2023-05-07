<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
class studentController extends Controller
{

    public function updateValidataion(Request $request,$student)
    {
        return Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('students')->ignore($student->id),
                'max:25'
            ],
            'IDno' => 'required',
        ]);
    }

    public function addValidataion(Request $request)
    {
        $user =$request->user();
        return Validator::make($request->all(), [
            'name' => [
                'required',
                'unique:students,name,NULL,id,deleted_at,NULL',
                'max:25'
            ],
            'IDno' => 'required',
        ]);
    }

    public function create()
    {
        return view('student.add');
    }

    public function add(Request $request)
    {
        $validator = $this->addValidataion($request);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        // Student::create(array_merge($request->all(),['user_id'=>$request->user()->id]));
        $request->user()->students()->create($request->all());
        return redirect()->route('student.index')->with('success','Student Ceated Successfully');
    }

    public function index()
    {
        // $students = Student::where('user_id',Auth::id())->get();
        return view('student.index',['students' => Auth::user()->students ]);
    }

    public function edit( Student $student)
    {
        // $student = Student::find($id);
        return view('student.edit',['student'=>$student]);
    }

    public function update(Student $student,Request $request)
    {
        $validator = $this->updateValidataion($request,$student);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $student->name=$request->name;
        $student->IDno=$request->IDno;
        $student->DOB=$request->DOB;
        $student->save();
        return redirect()->route('student.index')->with('update','Student Updated Successfully');
    }

    public function remove($id)
    {
        Student::find($id)->delete();
        return redirect()->route('student.index')->with('delete','Student Deleted Successfully');
    }
}
