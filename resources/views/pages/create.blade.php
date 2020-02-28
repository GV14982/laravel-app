@extends('layouts.app')

@section('content')
    <h1>Create a New Page</h1>
    {{Form::open(['action' => 'PageController@store', 'method' => 'POST'])}}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Page Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn-dark btn-lg'])}}
    {{Form::close() }}
@endsection