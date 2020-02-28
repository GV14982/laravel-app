@extends('layouts.app')

@section('content')
    <h1>Edit Page: {{$page->title}}</h1>
    {!! Form::open(['action' => ['PageController@update', $page->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $page->title, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $page->body, ['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn-dark btn-lg'])}}
    {!! Form::close() !!}
@endsection