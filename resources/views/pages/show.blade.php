@extends('layouts.app')

@section('content')
<div class="mt-3 card text-white bg-dark">
    <div class="card-body">
        <h4 class="card-title">{{$page->title}}</h4>
        <p class="card-text">{{$page->body}}</p>
        <small class="text-white-50">Published: {{$page->created_at}}</small>
        <a href="/pages/{{$page->id}}/edit" class="ml-2 btn btn-light btn-lg">Edit</a>
        <a href="/pages" class="ml-2 btn btn-light btn-lg">Back</a>
        {{Form::open(['action' => ['PageController@destroy', $page->id], 'method' => 'POST'])}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
        {{Form::close()}}
    </div>
</div>
@endsection