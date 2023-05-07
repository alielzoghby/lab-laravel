@extends('layouts.app')

@section('content')
    {!! Form::open(['route'=>['student.update',$student->id],'method'=>'put']) !!}
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {!! Form::label('name', 'name')!!}
    {!! Form::text('name', $student->name,['class'=>'form-control']) !!} 
    @error('IDno')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {!! Form::label('IDno', 'IDno')!!}
    {!! Form::text('IDno', $student->IDno,['class'=>'form-control']) !!}
    {!! Form::label('DOB', 'IDno')!!}
    <br>
    {!! Form::date('DOB', $student->DOB)!!}
    <br>
    <br>
    {!!Form::submit('Update Student!',['class'=>'btn btn-dark'])!!}
    {!! Form::close() !!}
@endsection