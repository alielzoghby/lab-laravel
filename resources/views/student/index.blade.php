@extends('layouts.app')

@section('content')
<h3>Add Student</h3>
<a href="{{route('student.create')}}" type="button" class="btn btn-success">ADD</a>
@if (session('success'))
    <div class="alert pd-5 alert-success">{{ session('success') }}</div>
@endif
@if (session('update'))
    <div class="alert pd-5 alert-success">{{ session('update') }}</div>
@endif
@if (session('delete'))
    <div class="alert pd-5 alert-success">{{ session('delete') }}</div>
@endif
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">IDno</th>
        <th scope="col">DOB</th>
        <th scope="col">User_Name</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
        
        @foreach ($students as $student)
        <tr>
            <th scope="row">{{$student->id}}</th>
            <td>{{$student->name}}</td>
            <td>{{$student->IDno}}</td>
            <td>{{$student->DOB}}</td>
            <td>{{$student->user->name}}</td>
            <td><a type="button" href="{{route('student.edit',$student->id)}}" class="btn btn-dark">Update</a></td>
            <td>
                <form method="post" action="{{route('student.remove',$student->id)}}">
                    @method('delete')
                    @csrf
                    <button type="subnit" class="btn btn-danger">Delete</button></td>
                </form>
        </tr>
        @endforeach
        
    </tbody>
</table>
@endsection