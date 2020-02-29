@extends('layouts.app')

@section('content')
@can('view-any', $page)
<div class="mt-3 card text-white bg-dark">
    <div class="card-body">
        <h4 class="card-title">{{$page->title}}</h4>
        <p class="card-text">{{$page->body}}</p>
        <small class="text-white-50">Published: {{$page->created_at}}</small>
        <a href="/pages" class="ml-2 btn btn-light btn-lg">Back</a>
        @auth
            @if ($page->user->id === auth()->user()->id)
                <a href="/pages/{{$page->id}}/edit" class="ml-2 btn btn-light btn-lg">Edit</a>
                {{Form::open(['action' => ['PageController@destroy', $page->id], 'method' => 'POST'])}}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
                {{Form::close()}}
            @endif
        @endauth
    </div>
</div>
@endcan
@endsection