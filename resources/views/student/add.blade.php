@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'student/add','method'=>'post']) !!}
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {!! Form::label('name', 'name')!!}
    {!! Form::text('name', null,['class'=>'form-control']) !!}
    @error('IDno')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {!! Form::label('IDno', 'IDno')!!}
    {!! Form::text('IDno', null,['class'=>'form-control']) !!}
    {!! Form::label('DOB', 'IDno')!!}
    <br>
    {!! Form::date('DOB', \Carbon\Carbon::now())!!}
    <br>
    <br>
    {!!Form::submit('ADD Student!',['class'=>'btn btn-success'])!!}
    {!! Form::close() !!}
@endsection